<?php include "config.php";

function calculate_minutes_to_read($content, $average_speed = 35)
{
  $word_count = str_word_count(strip_tags($content));
  $minutes = ceil($word_count / $average_speed);
  return $minutes;
}
function loadBlogs($start, $limit, $where_clause = "", $order_by = "")
{
  global $conn;
  $sql = "SELECT *, DATE_FORMAT(published_on,'%d %b %Y') AS published_on FROM blogs b INNER JOIN admin a ON b.blog_user=a.user_id";
  $sql .= " WHERE b.blog_status='active' ";
  if ($where_clause != "") {
    $sql .= " AND " . $where_clause;
  }

  if (!empty($order_by)) {
    $sql .= " ORDER BY " . $order_by;
  }

  $sql .= " LIMIT " . $start . "," . $limit;

  try {
    $result =  mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
      return 0;
    }
  } catch (\Throwable $th) {
    return false;
  }
}

$blogs = loadBlogs(0, 6, '', 'blog_id DESC');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy | Dietirian</title>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5R5FKH3P');</script>
<!-- End Google Tag Manager -->
     <link rel="stylesheet" href="asset/css/style.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Poppins Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap">
    <link rel="stylesheet" href="asset/css/pages.css">
</head>
<body>
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5R5FKH3P"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
  <?php include "inc/nav.php"; ?>
  <div class="container_">
        <header>
            <h1>Privacy Policy</h1>
        </header>
        <main>
            <section>
                <h2>Collection of Personal and Health Information</h2>
                <p>Dietirian collects personal and health information from users solely for the purpose of providing personalized nutrition coaching and support. This may include details about your medical history, dietary preferences, lifestyle habits, and any health conditions you disclose.</p>
            </section>
            <section>
                <h2>Use of Personal and Health Information</h2>
                <p>Your personal and health information is used to develop customized nutrition plans and provide tailored recommendations to support your health goals. We do not share or disclose your personal or health data to any third party unless required by law.</p>
            </section>
            <section>
                <h2>Data Security</h2>
                <p>We prioritize the security of your personal and health information. All data collected is stored in encrypted form to prevent unauthorized access or disclosure.</p>
            </section>
            <section>
                <h2>Data Retention</h2>
                <p>We retain your personal and health information only for as long as necessary to provide our services to you. Once your data is no longer needed for the purposes outlined in this Privacy Policy, it will be securely deleted or anonymized to protect your privacy.</p>
            </section>
            <section>
                <h2>User Rights</h2>
                <p>You have the right to access, update, or request the deletion of your personal and health information at any time.</p>
            </section>
            <section>
                <h2>Consent</h2>
                <p>By using our services and providing your personal and health information, you consent to the collection, use, and storage of your data as described in this Privacy Policy.</p>
            </section>
            <section>
                <h2>Changes to Privacy Policy</h2>
                <p>We reserve the right to update or modify this Privacy Policy at any time without prior notice.</p>
            </section>
        </main>
    </div>
      <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
