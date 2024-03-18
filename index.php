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
  <title>Your Nutrition & Dietitian Services | Improve Health, Weight Loss & More</title>

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

</head>

<body>
  <div class="div">


    
  <?php include "inc/nav.php"; ?>


    <div class="div-18">
      <div class="div-19">
        <div class="column">
          <img loading="lazy" src="asset/images/dr.jpg" class="img-5" />
        </div>
        <div id="top" class="column-2">
          <div class="div-20">
            <div class="div-21">Enhance Your 🖤 Health with</div>
            <h1 class="div-22">Personalized Nutrition Coaching</h1>
            <div class="div-23">
            Wellcom to Nutritionists, our certified nutritionists are dedicated to helping you achieve wellness through treatment planning and ongoing support. Start your weight loss journey today and discover the benefits of personal nutrition coaching.
            </div>
            <div class="div-24">
              <a href="" class="div-25">Get Appointment</a>
            </div>
            <div class="div-27">
              <div class="div_27_1">
                <div class="div_27_1_1"></div>
              </div>
              <div class="happ_circle">
                <div class="happy_profile happy_profile1">
                  <img loading="lazy" srcset="asset/images/boy_image1.jpg" class="img-6" />
                </div>
                <div class="happy_profile">
                  <img loading="lazy" srcset="asset/images/boy_image1.jpg" class="img-6" />
                </div>
                <div class="happy_profile happy_profile2">
                  <img loading="lazy" srcset="asset/images/boy_image1.jpg" class="img-6" />
                </div>
              </div>
              <div class="div-28">
                <span style="font-weight: 700;">
                  430+
                </span>
                <span class="text_main" >Happy Customers</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="max_width">
    <div class="div-29 ">
      <div class="div-30">
        <div class="div-31">Features</div>
        <div class="div-32">
          Welcome to the Feature Section of Nutritionist, your ultimate
          destination for all things nutrition and wellness.
        </div>
      </div>
    </div>
    <div class="div-33 max_width">
      <div class="div-34">
        <div class="column">
          <div class="div-35">
            <div class="div-36">
              <div class="div_37">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/53c11a5ab58c763f9c6c39f03f76262c619985fecc088cb8b6534b2c4540b853?" class="img-7" />
              </div>
              <div class="div-38">Personalized Nutrition Plans</div>
            </div>
            <div class="div-39">
            Get a meal plan that suits you and your goals. Our team of certified nutritionists will take into account your personal needs, dietary preferences, and any other health needs to create a plan that is right for you.
            </div>
          </div>
        </div>
        <div class="column-3">
          <div class="div-40">
            <div class="div-41">
              <div class="div_37">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/f1c3e108b82115ee10e07e5a2e7f999315ce1b647a5a43fdedad20c268fd3088?" class="img-8" />
              </div>
              <div class="div-43">Guidance from Certified Nutritionists</div>
            </div>
            <div class="div-44">
            As you begin your journey to better health, you'll receive expert advice and support from our team of nutrition experts. Get answers to your questions, address your concerns, and stay informed every step of the way.
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="div-45">
      <div class="div-46">
        <div class="column">
          <div class="div-47">
            <div class="div-48">
              <div class="div_37">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/bee7c088b7e0a4e175747000f40f11a9ae886244fddb86c6771afac06901466c?" class="img-9" />
              </div>
              <div class="div-50">Food Tracking and Analysis</div>
            </div>
            <div class="div-51">
            Easily track your food with our intuitive app. Our team of nutrition experts will examine your data to understand your eating habits, identify areas for improvement, and provide personalized recommendations.
            </div>
          </div>
        </div>
        <div class="column-4">
          <div class="div-52">
            <div class="div-53">
              <div class="div_37">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/a8b4872bc44cf6a92076483bd2127c84eef6fe370cc99f43609ec3f70f2f9bba?" class="img-10" />
              </div>
              <div class="div-55">Meal Planning and Recipes</div>
            </div>
            <div class="div-56">
            I believe having access to a variety of delicious and healthy foods tailored to your nutritional needs can improve your meal planning. With a personalized meal plan created by a nutritionist, following a healthy diet will be easy and you'll enjoy it.
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="div-57">
      <div class="div-58">
        <div class="column">
          <div class="div-59">
            <div class="div-60">
              <div class="div_37">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/f35b36742f7df1a38dfc1ba10a5a09087b1bf4924fa89cb437141859198c0571?" class="img-11" />
              </div>
              <div class="div-62">Lifestyle and Behavior Coaching</div>
            </div>
            <div class="div-63">
            In the opinion of a nutritionist, sustainable results go beyond mere dietary plans. Our focus lies in cultivating healthy habits, tackling emotional eating patterns, and equipping individuals with effective strategies to navigate challenges on their wellness journey.
            </div>
          </div>
        </div>
        <div class="column-5">
          <div class="div-64">
            <div class="div-65">
              <div class="div_37">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/e2d4b2c23600d5ed6473ba32a51e20ce1f17fc69fdb94b86c2352362d3c0341c?" class="img-12" />
              </div>
              <div class="div-67">Nutritional Education and Workshops</div>
            </div>
            <div class="div-68">
            Enhance your understanding of nutrition with insightful articles and engaging workshops. Our team of nutritionists will provide you with the necessary knowledge and resources to make informed decisions for sustained well-being.
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="div-69">
      <div class="div-70">
        <div class="div-71">Our Blogs</div>
        <div class="div-72">
        Explore our blog, newsletters and engaging articles created by our team of nutritionists, nutritionists and health experts. Get access to a wealth of valuable insights and engaging content waiting for you.
        </div>
      </div>
    </div>
    <!-- blogs -->
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
    <!-- blogs -->
    
    <!-- Rating and Reviews section start..  -->
    <div class="suisine_section_main">
      <p class="heading_p">Our Rating and Reviews</p>
      <!-- <p class="para_gray">Trained, Verified and Background Checked</p> -->
      <div class="al_rev_count center space_top">
        <iconify-icon icon="lets-icons:star-duotone"></iconify-icon>
        <p class="space_top">4.5 Rating <p class="para_p space_top"> &nbsp;(Based on 15K+ Reviews)</p></p>
      </div>
      <div class="reviews_cards_main">

        <!-- review card  -->
        <div class="review_card rating_card">
          <div class="review_top">
             <div class="review_r_top">
               <div class="re_r_t_img">
                <iconify-icon icon="iconamoon:profile-fill"></iconify-icon>
                <!-- <img src="asset/images/face1.jpg" alt="" loading="lazy"> -->
               </div>
               <div class="re_r_t_details">
                 <p class="solid_smal">Mark Harry</p>
                 <p class="thin_smal space_top">UK, london</p>
                 <p class="yelo_i space_top" > <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon></p>
               </div>
             </div>
         
          </div>
          <div class="review_bottom">
          <p class="para_p">My experience with nutritionist Ali was completely transformative. Weighing 90kg, I feel the weight of bad habits and lack of direction. But Ali's Personalized Diet Plan showed me the path to success. With the efforts and guidance of Ali's experts, I lost 25 kilos and reached 65 kilos.</p>

          </div>
          <div class="review_r_top">
            <p class="thin_smal">four days ago</p>
          </div>
        </div>
        <!-- review card  -->
        <!-- review card  -->
        <div class="review_card rating_card">
          <div class="review_top">
             <div class="review_r_top">
               <div class="re_r_t_img">
                <iconify-icon icon="iconamoon:profile-fill"></iconify-icon>
                <!-- <img src="asset/images/dr.jpg" alt="" loading="lazy"> -->
               </div>
               <div class="re_r_t_details">
                 <p class="solid_smal">David </p>
                 <p class="thin_smal space_top">United state, NY</p>
                 <p class="yelo_i space_top" > <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon></p>
               </div>
             </div>
         
          </div>
          <div class="review_bottom">
            <p class="para_p">Hello. Your guidance and meal plan helped me lose weight successfully. Thank you for your help and giving us a new life. I would recommend your services to anyone looking for weight loss solutions.</p>
          </div>
          <div class="review_r_top">
            <p class="thin_smal">15 days ago</p>
          </div>
        </div>
        <!-- review card  -->
        <!-- review card  -->
        <div class="review_card rating_card">
          <div class="review_top">
             <div class="review_r_top">
               <div class="re_r_t_img">
                <iconify-icon icon="iconamoon:profile-fill"></iconify-icon>
                <!-- <img src="asset/images/boy_image1.jpg" alt="" loading="lazy"> -->
               </div>
               <div class="re_r_t_details">
                 <p class="solid_smal">Shurti Dhurv</p>
                 <p class="thin_smal space_top">Banglore</p>
                 <p class="yelo_i space_top" > <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon></p>
               </div>
             </div>
         
          </div>
          <div class="review_bottom">
            <p class="para_p">After struggling with PCOS and undergoing unsuccessful treatment, I sought help from a nutritionist. Their unique diet plan resulted in immediate and immediate success. I am healthy and happy."

"I recommend this to all women with PCOS: Get in touch with this diet "Go ahead. Expert."</p>
          </div>
          <div class="review_r_top">
            <p class="thin_smal">1 month ago</p>
          </div>
        </div>
        <!-- review card  -->
        <!-- review card  -->
        <div class="review_card rating_card">
          <div class="review_top">
             <div class="review_r_top">
               <div class="re_r_t_img">
                <iconify-icon icon="iconamoon:profile-fill"></iconify-icon>
                <!-- <img src="asset/images/boy_image3.avif" alt="" loading="lazy"> -->
               </div>
               <div class="re_r_t_details">
                 <p class="solid_smal">Vansh Banga</p>
                 <p class="thin_smal space_top">India Delhi, Sector 57</p>
                 <p class="yelo_i space_top" > <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon></p>
               </div>
             </div>
         
          </div>
          <div class="review_bottom">
          <p class="para_p">I've been having stomach issues for a while now and seeking help from a nutritionist was the best decision I've ever made. Nutritionist Mansab Ali gave me a good nutrition plan that made me healthy. I am now healthy and grateful for the expert advice I received. Highly recommended!</p>

          </div>
          <div class="review_r_top">
            <p class="thin_smal">2 month ago</p>
          </div>
        </div>
        <!-- review card  -->
        <!-- review card  -->
        <div class="review_card rating_card">
          <div class="review_top">
             <div class="review_r_top">
               <div class="re_r_t_img">
                <iconify-icon icon="iconamoon:profile-fill"></iconify-icon>
                <!-- <img src="asset/images/girl1.avif" alt="" loading="lazy"> -->
               </div>
               <div class="re_r_t_details">
                 <p class="solid_smal">Hanif Sajid</p>
                 <p class="thin_smal space_top">Pakistan</p>
                 <p class="yelo_i space_top" > <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon> <iconify-icon icon="lets-icons:star-duotone"></iconify-icon></p>
               </div>
             </div>
         
          </div>
          <div class="review_bottom">
            <p class="para_p">Lately I have been facing serious health problems due to liver disease which causes pain and bloating. But with the guidance of a nutritionist, I experienced a visible change. Thank God, my health has improved and I am happy to be better than before. My own journey is not only inspiring, but also motivates me to share this transformation with others. I recommend that anyone experiencing health problems immediately seek the support of a nutritionist. Their expertise can make a real difference to your health.</p>
          </div>
          <div class="review_r_top">
            <p class="thin_smal">2 month ago</p>
          </div>
        </div>
        <!-- review card  -->
      </div>
    </div>
    <!-- Rating and Reviews section end..  -->

    <div class="div-160">
      <div class="div-161">
        <div class="div-162">Our Pricing</div>
        <div class="div-163">
          We outline our flexible and affordable options to support you on your
          journey to optimal health and nutrition. We believe that everyone
          deserves access to personalized nutrition guidance and resources
        </div>
      </div>
    </div>

    <div class="div-167">Save 50% on Yearly</div>
    <div class="div-168">
      <div class="div-169">
        <div class="column-18">
          <div class="div-170">
            <div class="div-171">Basic Plan</div>
            <div class="div-172">Up to 50% off on Yearly Plan</div>
            <div class="div-173">
              Get started on your health journey with our Basic Plan. It includes
              personalized nutrition coaching, access to our app, meal planning
              assistance, and email support.
            </div>
            <div class="div_174">
              <p class="Bold_font">$49</p>
              <p >/month</p>
            </div>
            <div class="div_193">Choose Plan</div>
          </div>
        </div>
        <div class="column-19">
          <div class="div-178">
            <div class="div-179">Premium Plan</div>
            <div class="div-180">Up to 50% off on Yearly Plan</div>
            <div class="div-181">
              Upgrade to our Premium Plan for enhanced features. In addition to
              the Basic Plan, you'll receive video consultations, priority
              support, and personalized recipe recommendations.
            </div>
            <div class="div_174">
              <p class="Bold_font">$79</p>
              <p >/month</p>
            </div>
            <div class="div_193">Choose Plan</div>
          </div>
        </div>
        <div class="column-20">
          <div class="div-186">
            <div class="div-187">Ultimate Plan</div>
            <div class="div-188">Up to 50% off on Yearly Plan</div>
            <div class="div-189">
              Experience the full benefits of personalized nutrition coaching with
              our Ultimate Plan. Enjoy all the features of the Premium Plan, along
              with 24/7 chat support and exclusive workshops.
            </div>
            <div class="div_174">
              <p class="Bold_font">$99</p>
              <p >/month</p>
            </div>
            <div class="div_193">Choose Plan</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="div">
    <div class="div-194">
      <div class="div-195">
        <div class="div-196">
        <a class="navbar-brand" href="https://dietirian.com/">
            Dietirian
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

  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "LocalBusiness",
    "name": "Your Nutrition & Dietitian Services",
    "url": "https://dietirian.com/",
    "description": "Transform your health with personalized nutrition and dietitian services.",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "street no.2 Dera Ghazi Khan City",
      "addressLocality": "Dera Ghazi Khna",
      "addressRegion": "Pakistan",
      "postalCode": "32381",
      "addressCountry": "Pakistan"
    },
    "telephone": "+923106378129"
  }
  </script>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>