<?php

function isAllowed($ext, $allowed_array)
{
    if (in_array($ext, $allowed_array)) {
        return true;
    } else {
        return false;
    }
}

if (isset($_FILES['image'])) {
    $name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];

    $extension = explode(".", $name);
    $extension = strtolower(end($extension));
    $new_name = uniqid().".".$extension;

    $allowed_ectensions = ["png", "webp", "jpg", "jpeg"];

    if (isAllowed($extension, $allowed_ectensions)) {
        if(move_uploaded_file($tmp_name,"../../uploads/blog_posts/".$new_name)){
            $result['success'] = 1;
            $result['msg'] = "File uploaded successfully";
            $result['file']['url'] = "http://localhost/projects/nutrio/uploads/blog_posts/".$new_name;
        }else{
            $result['success'] = 0; 
        }
        die(json_encode($result));
    }else{
        $result['success']=0;
        die(json_encode($result));
    }
}

die(json_encode($_FILES));
