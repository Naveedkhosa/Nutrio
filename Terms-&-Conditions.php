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
    <title>Terms & Conditions | Dietirian</title>
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
    
  <?php include "inc/nav.php"; ?>
    <div class="container_">
        <header>
            <h1>Terms & Conditions</h1>
        </header>
        <main>
            <section>
                <h2>Introduction</h2>
                <p>By accessing and using the services provided by Dietirian, you agree to be bound by the following Terms and Conditions. If you do not agree with any part of these terms, you may not access the website or use any services.</p>
            </section>
            <section>
                <h2>Use License</h2>
                <p>Permission is granted to use the services provided by Dietirian for personal, non-commercial purposes only. This license does not include any resale or commercial use of the services or their contents.</p>
            </section>
            <section>
                <h2>Disclaimer</h2>
                <p>The information provided by Dietirian is for educational and informational purposes only. It is not intended as a substitute for professional medical advice, diagnosis, or treatment. Always seek the advice of your physician or other qualified health provider with any questions you may have regarding a medical condition.</p>
            </section>
            <section>
                <h2>Limitation of Liability</h2>
                <p>In no event shall Dietirian or its suppliers be liable for any damages arising out of the use or inability to use the services, even if Dietirian has been notified orally or in writing of the possibility of such damage.</p>
            </section>
            <section>
                <h2>Governing Law</h2>
                <p>These Terms and Conditions shall be governed by and construed in accordance with the laws of [Your State], without regard to its conflict of law provisions.</p>
            </section>
            <section>
                <h2>Changes to Terms and Conditions</h2>
                <p>Dietirian reserves the right to update or modify these Terms and Conditions at any time without prior notice. By continuing to use the services after any changes are made, you agree to be bound by the revised terms.</p>
            </section>
        </main>
    </div>
    
      <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
