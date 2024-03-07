<?php
session_start();
include "../../../config.php";

function isAllowed($id)
{
    global $conn;
    $sql = "SELECT * FROM admin WHERE user_id={$id} AND user_status=1";
    try {
        $result_query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result_query) > 0) {
            return true;
        } else {
            throw new Exception("no user was found");
        }
    } catch (Exception $e) {
        return false;
    }
}
function isUnique($slug)
{
    global $conn;
    $sql = "SELECT * FROM blogs WHERE blog_slug='{$slug}'";
    try {
        $result_query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result_query) < 1) {
            return true;
        }
        return false;
    } catch (Exception $e) {
        return false;
    }
}

$result['success'] = false;
$result['msg'] = "Access Denied..!";
$allowed_extensions = ['png', 'webp', 'jpeg', 'jpg'];
$upload_path = "../../../uploads/blog_feature_imgs/";
if (isset($_POST['post_content'])) {
    if (isset($_SESSION['logged_in_user'])) {
        $user_id = $_SESSION['logged_in_user'];

        $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
        $post_slug = mysqli_real_escape_string($conn, $_POST['post_slug']);
        $post_excript = mysqli_real_escape_string($conn, $_POST['post_excript']);
        $post_category = mysqli_real_escape_string($conn, $_POST['post_category']);
        $post_content = mysqli_real_escape_string($conn, $_POST['post_content']);
        $meta_tags = mysqli_real_escape_string($conn, $_POST['meta_tags']);
        $feature_img = $_FILES['feature_img'];

        if (!empty($post_title)) {
            if (!empty($post_slug) && isUnique($post_slug)) {
                if (!empty($feature_img['name'])) {
                    $img_name = $feature_img['name'];
                    $img_ext = explode(".", $img_name);
                    $img_ext = strtolower(end($img_ext));
                    $img_tmp_name = $feature_img['tmp_name'];

                    if (!in_array($img_ext, $allowed_extensions)) {
                        $result['msg'] = "Please upload only allowed extensions : " . implode(",", $allowed_extensions);
                    } else {

                        if (isAllowed($user_id)) {
                           

                            mysqli_autocommit($conn, false);
                            $blog_image = "";
                            $insert_query = "INSERT INTO `blogs`(`blog_user`, `blog_title`, `blog_slug`, `blog_image`, `blog_content`, `blog_tags`, `blog_status`,`blog_category`,`blog_excript`) VALUES ({$user_id},'{$post_title}','{$post_slug}','{$blog_image}','{$post_content}','{$meta_tags}','active',{$post_category},'{$post_excript}')";

                            if (mysqli_query($conn, $insert_query)) {
                                $blog_id = mysqli_insert_id($conn);

                                if ($blog_id) {
                                    $blog_image = "blog_" . $blog_id . "." . $img_ext;
                                    $update_blog = "UPDATE blogs SET blog_image='{$blog_image}' WHERE blog_id={$blog_id};";

                                    if (move_uploaded_file($img_tmp_name, $upload_path . $blog_image)) {
                                        if ($update_result = mysqli_query($conn, $update_blog)) {
                                            if (mysqli_affected_rows($conn) === 1) {
                                                mysqli_commit($conn);
                                                mysqli_autocommit($conn, true);
                                                $result['success'] = true;
                                                $result['msg'] = "New blog post added successfully.";
                                                die(json_encode($result));
                                            } else {
                                                unlink($upload_path . $blog_image);
                                            }
                                        }
                                    }

                                }
                            }

                            mysqli_rollback($conn);
                            mysqli_autocommit($conn, true);
                            $result['success'] = false;
                            $result['msg'] = "An unexpected error has been occured.";

                        } else {
                            $result['msg'] = "You don't have permission to do blog post";
                        }
                    }
                } else {
                    $result['msg'] = "Please upload feature image of blog post";
                }
            } else {
                $result['msg'] = "A unique blog slug is required";
            }
        } else {
            $result['msg'] = "Please write title of blog post";
        }
    } else {
        $result['msg'] = "Your session has been expired. Please login to perform this action";
        $result['login_redirect'] = true;
    }
}

die(json_encode($result));
