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
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Nutrition & Dietitian Services | Improve Health, Weight Loss & More</title>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5R5FKH3P');</script>
<!-- End Google Tag Manager -->
  <link rel="stylesheet" href="asset/css/style.css">
  <!-- description -->
  <meta name="description" content="World best nutritionist and dietirian">
  <!-- tags or keywords -->
  <meta name="keywords" content="nutrition, dietitian, weight loss, weight gain, meal plans, women's health, pregnancy nutrition, health improvement, personalized nutrition, diet counseling,community health, home care agencies, ProHealth Care MyChart, UnitedHealthCare Choice Plus, OptumCare Health Systems, AHCCCS, Tricare for Life, physicians, primary health, Universal Health Care, Advance Care, Medicare for All, private health care, home health care, MedStar Urgent Care, Carp United Healthcare, TriCare Prime, Providence Health Care, Mercy Cove, Humana Tricare Health Care Solutions, healthcare partners, family home health care services, value-based care, health clinics, medical services, nutritionist, weight loss, low carb diet, Mediterranean diet, Atkins diet, vegan diet, weight loss pills, whey protein, alkaline diet, Starbucks nutrition, 310 Shake, glucerna, chicken breast nutrition, balanced diet, fitness, vitamins, carbohydrates, food pyramid, nutrition facts, calorie deficit, paleo diet, diabetic diet, high protein diet, high calorie foods, 7 day diet plan, quinoa nutrition, breakfast nutrition, burger king nutrition, strawberries calories, Dunkin' Donuts nutrition, maple syrup calories, sweet potato calories, cucumber calories, chicken nutrition, egg nutrition, almond calories, salt calories, hydro whey, ultimate nutrition whey protein, nutrition-facts, nutrients, optimum nutrition, food pyramid, food labels, low calorie snacks, supplement store, nutritionist near me, dietary guidelines, healthy diet, high protein diet, nutritionist, dietitian, weight management, nutritional therapy, balanced nutrition, whole foods, essential nutrients, micronutrients, macronutrients, superfoods, plant-based diet, organic food, sports nutrition, immune system support, heart health, digestive health, brain health, bone health, antioxidant-rich foods, anti-inflammatory diet, gluten-free diet, lactose-free diet, low glycemic index foods, omega-3 fatty acids, probiotics, prebiotics, fiber-rich foods, hydration, water intake, hydration tips, healthy cooking, meal planning, mindful eating, portion control, healthy snacks, nutritional counseling, holistic nutrition, sustainable nutrition, world's best nutrition">


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
<div class="div">
  <?php include "inc/nav.php"; ?>
  
       <div class="container_">
        <header>
            <h1>About Us</h1>
        </header>
        <main>
            <p>Welcome to Dietirian! I'm Dr. Mansab Ali Khosa, a dedicated nutritionist and dietitian passionate about guiding you on your journey to optimal health and wellness.</p>
            <section>
                <h2>My Mission</h2>
                <p>My mission is to empower individuals like you to make sustainable lifestyle changes through personalized nutrition coaching and support.</p>
            </section>
            <section>
                <h2>Expertise</h2>
                <p>With years of experience in the field of nutrition and dietetics, I specialize in creating customized meal plans, offering evidence-based guidance, and providing ongoing support to help you achieve your health goals.</p>
            </section>
            <section>
                <h2>Why Choose Dietirian?</h2>
                <p>At Dietirian, you'll receive personalized attention and tailored recommendations designed to fit your unique needs and preferences. I believe in a holistic approach to health that encompasses not only nutrition but also lifestyle factors to help you thrive.</p>
            </section>
            <section>
                <h2>Get Started</h2>
                <p>Ready to take control of your health? Schedule a consultation today and let's embark on this journey together.</p>
            </section>
            <p>Thank you for considering Dietirian as your partner in health. I look forward to helping you achieve your wellness goals!</p>
        </main>
    </div>
    </div>
    
      <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
