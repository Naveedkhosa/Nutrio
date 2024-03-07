<?php
include "../config.php";
function categoriesOption()
{
    global $conn;
    $options = "<option value='null' selected>Un Categorized</option>";
    $sql = "SELECT cat_id,cat_name FROM categories";
    try {
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $options .= "<option value='" . $row['cat_id'] . "'>" . $row['cat_name'] . "</option>";
            }
        }
        return $options;
    } catch (\Throwable $th) {
        return $options;
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dahsboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/editor.css">
</head>

<body>
    <div class="dash_board">
        <div class="left">
            <?php include "inc/nav.php" ?>
        </div>

        <div class="right">
            <?php include "inc/right_top.php"; ?>
            <div class="content">
                <div class="page-title">
                    New Blog
                </div>
                <div class="dynamic-content">
                    <!-- dynamic content -->
                    <form class="main_container" id="blog_post_form" method="post" enctype="multipart/form-data">

                        <div class="post_field">
                            <label for="post_title">Blog Title</label>
                            <input type="text" id="post_title" name="post_title" required placeholder="max 60 to 70 characters">
                        </div>
                        <div class="post_field">
                            <label for="post_title">Slug / Url</label>
                            <input type="text" id="post_slug" name="post_slug" required placeholder="slug of blog">
                        </div>
                        <div class="post_field">
                            <label for="post_title">Excript</label>
                            <input type="text" id="post_ecript" name="post_excript" required placeholder="Excript of blog only 2 lines maximum">
                        </div>

                        <div class="post_field">
                            <label for="post_title">Category</label>
                            <select name="post_category" id="post_category">
                                <?= categoriesOption(); ?>
                            </select>
                        </div>
                        <div class="post_field">
                            <label for="post_feature_img">Feature Image</label>
                            <input type="file" name="feature_img" accept="image/png,image/webp,image/jpg,image/jpeg" id="post_feature_img">
                        </div>
                        <div id="editorjs"></div>
                        <div class="post_field">
                            <label for="meta_tags">Meta Tags</label>
                            <input type="text" name="meta_tags" id="meta_tags" placeholder="Comma Seperated tags i.e tag 1, tag 2">
                        </div>
                        <div class="post_footer">
                            <input type="submit" class="publish_btn" value="Publish">
                        </div>
                    </form>
                    <!-- dynamic content -->
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="blog-editor/editor.js"></script>
    <script src="blog-editor/tools/embed/index.js"></script>
    <script src="blog-editor/tools/link/index.js"></script>
    <script src="blog-editor/tools/header/index.js"></script>
    <script src="blog-editor/tools/editor-js-code/index.js"></script>
    <script src="blog-editor/tools/image/index.js"></script>
    <script src="blog-editor/tools/list/index.js"></script>
    <script src="blog-editor/tools/quote/index.js"></script>
    <script src="blog-editor/tools/raw/index.js"></script>
    <script src="blog-editor/tools/checklist/index.js"></script>
    <script src="blog-editor/parse-as-html/index.js"></script>
    <script src="blog-editor/main.js"></script>
</body>

</html>