<?php
include "config.php";
$page_uri = $_SERVER["REQUEST_URI"];
$uri_elems = explode("/", $page_uri);
$slug = end($uri_elems);

$query = "SELECT *,DATE_FORMAT(b.published_on,'%d %b, %Y') as published_on FROM blogs b INNER JOIN admin a ON a.user_id = b.blog_user INNER JOIN categories c ON b.blog_category = c.cat_id WHERE b.blog_slug = '{$slug}';";

$blog = null;
try {
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    $blog = mysqli_fetch_assoc($result);
  } else {
    $blog = 'no_blog';
  }
} catch (\Throwable $th) {
  $blog = null;
}




function loadBlogs($start = 0, $limit = 7, $where_clause = "", $order_by = "")
{
  global $conn;
  $sql = "SELECT *,DATE_FORMAT(published_on,'%d %b %Y') as published_on FROM `blogs` b INNER JOIN `admin` a ON b.blog_user=a.user_id INNER JOIN categories c ON b.blog_category=c.cat_id WHERE b.blog_status='active'";
  if ($where_clause != "") {
    $sql .= " AND (" . $where_clause . ")";
  }

  if ($order_by != "") {
    $sql .= " ORDER BY " . $order_by;
  }

  if ($limit != "no_limit") {
    $sql .= " LIMIT $start,$limit";
  }

  if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
      return 0;
    }
  } else {
    return false;
  }
}




$limit = 7;
$start = 0;
$blogs = loadBlogs($start, $limit);


function calculate_minutes_to_read($content, $average_speed = 35)
{
  $word_count = str_word_count(strip_tags($content));
  $minutes = ceil($word_count / $average_speed);
  return $minutes;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $blog['blog_title'] ?? "" ?> | Progley</title>
  <meta name="description" content="<?= $blog['blog_title'] ?? "" ?>">
  <meta name="keywords" content="<?= $blog['blog_tags'] ?? "" ?>">
  <meta name="author" content="<?= $blog['user_fullname'] ?? "" ?>">
  <link rel="stylesheet" href="http://localhost/projects/nutrio/asset/css/blogs.css" />
  <link rel="stylesheet" href="http://localhost/projects/nutrio/asset/css/style.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Poppins Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap">
</head>

<body>



  <?php include "inc/nav.php"; ?>

  <div class="blog_open_container">

    <?php
    if ($blog == null) { ?>
      <p style="width:100%;text-align:center;">
        Something went wrong , Please try again
      </p>
    <?php } else if ($blog == "no_blog") { ?>
      <p style="width:100%;text-align:center;">
        No blog was found with this url
      </p>
    <?php } else { ?>
      <div class="blogs_top_section">
        <h1><?= $blog['blog_title'] ?? ""; ?></h1>
        <div class="author_det_box">
          <div class="author_profile">
            <img src="http://localhost/projects/nutrio/asset/images/<?= $blog['profile_img'] ?? ""; ?>" alt="<?= $blog['user_fullname'] ?? ""; ?> profile" />
          </div>
          <div class="author_detail">
            <div class="author_det_top reg_bold_para">
              <a><?= $blog['user_fullname'] ?? ""; ?></a>
            </div>
            <div class="author_det_top reg_thin_para">
              <a><?= calculate_minutes_to_read($blog['blog_content']); ?> min read</a>
              .
              <a><?= $blog['published_on'] ?? ""; ?></a>
            </div>
          </div>
        </div>

      </div>
      <div class="blogs_cpntent_section">
        <?= $blog['blog_content'] ?? ""; ?>
      </div>
    <?php } ?>

    <br>
    <hr>
    <br>
    <div class="blogs_card_container_main">
      <h2>Recommended Blogs</h2>
      <div class="blogs_card_container">

        <?php if (!$blogs) { ?>
          <p style="text-align:center;padding:10px 20px;color:#990000;">No Recommended Blog</p>
        <?php } else { ?>
          <div class="div-74">
            <div class="" style="display:flex;flex-wrap:wrap;gap:20px;width:100%;">
              <?php foreach ($blogs as $key => $blog_item) {

                if ($blog_item['blog_slug'] == $blog['blog_slug']) {
                  
                } else { ?>
                  <div class="blog_card">
                    <div class="blog_card_top">
                      <img src="http://localhost/projects/nutrio/uploads/blog_feature_imgs/<?= $blog_item['blog_image'] ?>" alt="">
                    </div>
                    <div class="blog_card_bottom">
                      <div class="blog_card_profile">
                        <div class="profile_card_img">
                          <img src="http://localhost/projects/nutrio/asset/images/<?= $blog_item['profile_img'] ?>" alt="">
                        </div>
                        <p><?= $blog_item['user_fullname'] ?></p>
                      </div>
                      <a href="blog.php/<?= $blog_item['blog_slug'] ?>" class="title" id="cardTitle"><?= $blog_item['blog_title'] ?></a>
                    </div>
                  </div>

              <?php }
              } ?>
            </div>
          </div>
        <?php } ?>


      </div>
    </div>
  </div>


  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/js.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var titleElements = document.querySelectorAll(".title");

      titleElements.forEach(function(titleElement) {
        var maxWords = parseInt(titleElement.getAttribute("data-max-words")) || 10;
        var titleText = titleElement.textContent;
        var words = titleText.split(" ");

        if (words.length > maxWords) {
          var shortenedTitle = words.slice(0, maxWords).join(" ") + " ...";
          titleElement.textContent = shortenedTitle;
        }
      });
    });
  </script>


</body>

</html>