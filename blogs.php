<?php
// print pagination
include "config.php";
function printPagination($page_url, $current_page, $total_pages, $num_pages_displayed = 5, $num_pages_skip = 2)
{
  $resulted_output = "<div class='pagination__container'><ul class='pagination__'>";

  // Previous link
  if ($current_page > 1) {
    $resulted_output .= "<li><a href='{$page_url}?page=" . ($current_page - 1) . "'>Prev</a></li>";
  }

  // Render page links
  $start_page = max(1, $current_page - $num_pages_skip);
  $end_page = min($total_pages, $start_page + $num_pages_displayed - 1);

  if ($start_page > 1) {
    $resulted_output .= "<li><a href='#'>...</a></li>";
  }

  for ($page = $start_page; $page <= $end_page; $page++) {
    if ($current_page == $page) {
      $resulted_output .= "<li class='active'><a href='{$page_url}?page={$page}'>{$page}</a></li>";
    } else {
      $resulted_output .= "<li><a href='{$page_url}?page={$page}'>{$page}</a></li>";
    }
  }

  if ($end_page < $total_pages) {
    $resulted_output .= "<li><a>...</a></li>";
  }

  // Next link
  if ($current_page < $total_pages) {
    $resulted_output .= "<li><a href='{$page_url}?page=" . ($current_page + 1) . "'>Next</a></li>";
  }

  $resulted_output .= "</ul></div>";
  return $resulted_output;
}


function loadBlogs($start = 0, $limit = 7, $where_clause = "", $order_by = "")
{
  global $conn;
  $sql = "SELECT *,DATE_FORMAT(published_on,'%d %b %Y') as published_on FROM `blogs` b INNER JOIN `admin` a ON b.blog_user=a.user_id  WHERE b.blog_status='active'";
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


function CountAllBlogs()
{
  global $conn;
  if ($result = mysqli_query($conn, "SELECT *,DATE_FORMAT(last_updated,'%d %b %Y') as last_updated FROM `blogs` b INNER JOIN `admin` a ON b.blog_user=a.user_id WHERE b.blog_status='active';")) {
    return mysqli_num_rows($result);
  }
}

$limit = 5;
$current_page = 1;
$start = 0;
$search = "";
if (isset($_GET["page"]) && !empty($_GET['page'])) {
  $current_page = $_GET["page"];
  $start = ($current_page - 1) * $limit;
}
$blogs = loadBlogs($start, $limit);
$total_blogs = CountAllBlogs();
$total_pages = ceil($total_blogs / $limit);

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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blogs | Dietirian</title>
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5R5FKH3P');</script>
<!-- End Google Tag Manager -->
  <link rel="stylesheet" href="asset/css/style.css">
  <link rel="stylesheet" href="asset/css/pagination.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Poppins Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap">

</head>

<body>
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5R5FKH3P"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <div class="div">


    <?php include "inc/nav.php"; ?>


  </div>
  <div class="max_width">
    <div class="div-69">
      <div class="div-70">
        <div class="div-71">Our Blogs</div>
        <div class="div-72">
          Our blog is a treasure trove of informative and engaging articles
          written by our team of nutritionists, dietitians, and wellness experts.
          Here's what you can expect from our blog.
        </div>
      </div>
    </div>

    <div class="div-73">
      <?php if (!$blogs) { ?>
        <p style="text-align:center;padding:10px 20px;color:#990000;">No blog is posted yet, We are creating best content for you. Stay connected with us to improve your health</p>
      <?php } else { ?>
        <div class="div-74">
          <div class="" style="display:flex;flex-wrap:wrap;gap:20px;width:100%;">
            <?php foreach ($blogs as $key => $blog) { ?>
              <a href="blog.php/<?= $blog['blog_slug'] ?>" class="div-76 blogs-card">
                <img loading="lazy" src="uploads/blog_feature_imgs/<?= $blog['blog_image'] ?>" class="img-13" />
                <div class="div-78"><?= $blog['blog_title'] ?></div>
                <div class="div-79">
                  <?= $blog['blog_excript'] ?>
                </div>
                <div class="div-80">
                  <div class="div-81">
                    <div class="column-6">
                      <div class="div-82">
                        <div class="profile_circle">
                          <img loading="lazy" src="asset/images/<?= $blog['profile_img'] ?>" class="img-14" />
                        </div>
                        <div class="div-83">
                          <div class="div-84"><?= $blog['user_fullname'] ?></div>
                          <div class="div-85"><?= $blog['published_on'] ?> - <?= calculate_minutes_to_read($blog['blog_content']); ?> min read</div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </a>
            <?php } ?>
          </div>
        </div>
      <?php } ?>

    </div>

    <!-- pagination -->
    <?php
    if (!isset($_GET['search'])) {
      echo printPagination("blogs.php", $current_page, $total_pages);
    }
    ?>

  </div>
  <div class="div">
    <div class="div-194">
      <div class="div-195">
        <div class="div-196">
        <a class="navbar-brand" href="https://dietirian.com/">
            <img src="https://dietirian.com/asset/logo-files/dietirian3.png" alt="" class="logo"> Dietirian
        </a>

          <div class="div-197">
            <a href="#" class="div-198">Home</a>
            <a href="about.php" class="div-199">About</a>
            <a href="process.php" class="div-201">Process</a>
            <a href="blogs.php"  class="div-203">Blogs</a>
            <a href="privacy-policy.php"  class="div-203">Privacy Policy</a>
            <a href="Terms-&-Conditions.php"  class="div-203">Terms & Conditions</a>
            <a href="contactUs.php"  class="div-204">Contact</a>
          </div>
          <a href="#top" class="div-205">
            <div class="div-206">Got To Top</div>
            <div class="div-207">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/fbfff4234dd4d279aca22e18674a0312548d1366e754645c5eef7f55a25cb7c8?" class="img-38" />
            </div>
            </a>
        </div>
        <div class="div-208">
          <div class="div-209">
            <div class="div-210">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/dd80754d59ecafe47605e08b7cf2da709be8ce89743ecd37635b28590ea062bc?" class="img-39" />
              <div class="div-211">mansab@dietirian.com</div>
            </div>
            <div class="div-212">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/79a791a59734258aa73037e3b9a8c71dff93229d2044b7fec60c07a3bb19a744?" class="img-40" />
              <div class="div-213">+923411707664</div>
            </div>
            <div class="div-214">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/b5a77779ad27c1b4d987d98e83e11d4145d03e5916065d159fb786ece12d9005?" class="img-41" />
              <div class="div-215">Somewhere in the World</div>
            </div>
          </div>
          <div class="div-216">© 2023 to 2024 Dietirian. All rights reserved.</div>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>