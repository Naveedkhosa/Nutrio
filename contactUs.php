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
    <title>About Us | Dietirian</title>
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

      <!-- support help with contact start.  -->
      <div class="support_help_section">
      <div class="support_help_in_section">

        <div class="support_help_contact_cards">
          <a href="tel:+919403891560" class="card_contact">
            <div class="card_contact_icn">
                <iconify-icon icon="ph:phone-call-light"></iconify-icon>
            </div>
            <div class="card-conatct_con">
                <p class="_head_solid_smal">Call</p>
                <p class="para_p space_top">(+92)3411707664</p>
            </div>
        </a>
          <a href="https://wa.link/tf6bsc" class="card_contact">
            <div class="card_contact_icn">
                <iconify-icon icon="logos:whatsapp-icon"></iconify-icon>
            </div>
            <div class="card-conatct_con">
                <p class="_head_solid_smal">Whatsapp</p>
                <p class="para_p space_top">(+92) 3411707664</p>
            </div>
        </a>
          <a href="mailto:support@dietirian.com" class="card_contact">
            <div class="card_contact_icn">
                <iconify-icon icon="fluent:mail-16-regular"></iconify-icon>
            </div>
            <div class="card-conatct_con">
                <p class="_head_solid_smal">E-Mail</p>
                <p class="para_p space_top">support@dietirian.com</p>
            </div>
        </a>
        
          <a href="" class="card_contact">
            <div class="card_contact_icn">
            <iconify-icon icon="eos-icons:hourglass"></iconify-icon>
            </div>
            <div class="card-conatct_con">
                <p class="_head_solid_smal">Working Time</p>
                <div class="working_time">
                  <p class="para_p space_top" style="  font-style:italic ;">All Days Open</p>
                   <p class="para_p">
                     <span class="_head_solid_smal">From:</span>
                     <span><span>10:00 AM</span>
                  
                   -
                     <span class="_head_solid_smal">To:</span>
                     <span><span>10:00 PM</span>
                   </p>
                </div>
            </div>
        </a>
        </div>

      </div>
    </div>
    <!-- support help with contact end.  -->
  
      
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
       <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
