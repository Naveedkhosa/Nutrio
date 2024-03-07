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
  $sql = "SELECT *, DATE_FORMAT(published_on,'%d %b %Y') AS published_on FROM blogs b INNER JOIN admin a ON b.blog_user=a.user_id  INNER JOIN categories c ON b.blog_category=c.cat_id";
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
  <title>Home | Edietirian</title>
  <link rel="stylesheet" href="asset/css/style.css">

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
        <div class="column-2">
          <div class="div-20">
            <div class="div-21">Transform Your ❤ Health with</div>
            <div class="div-22">Personalized Nutrition Coaching</div>
            <div class="div-23">
              Welcome to Nutritionist, your partner in achieving optimal health
              through personalized nutrition coaching. Our certified nutritionists
              are here to guide you on your weight loss journey, providing
              customized plans and ongoing support. Start your transformation
              today and experience the power of personalized nutrition coaching.
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
                <span style="font-weight: 700; color: rgba(70, 134, 113, 1)">
                  430+
                </span>
                <span style="color: rgba(35, 67, 56, 1)">Happy Customers</span>
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
              <div class="div-37">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/53c11a5ab58c763f9c6c39f03f76262c619985fecc088cb8b6534b2c4540b853?" class="img-7" />
              </div>
              <div class="div-38">Personalized Nutrition Plans</div>
            </div>
            <div class="div-39">
              Receive a tailored nutrition plan designed specifically for your
              body and goals. Our certified nutritionists will consider your
              unique needs, dietary preferences, and health conditions to create a
              plan that suits you best.
            </div>
          </div>
        </div>
        <div class="column-3">
          <div class="div-40">
            <div class="div-41">
              <div class="div-42">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/f1c3e108b82115ee10e07e5a2e7f999315ce1b647a5a43fdedad20c268fd3088?" class="img-8" />
              </div>
              <div class="div-43">Guidance from Certified Nutritionists</div>
            </div>
            <div class="div-44">
              Our team of experienced and certified nutritionists will provide
              professional guidance and support throughout your journey. They will
              answer your questions, address your concerns, and keep you motivated
              as you work towards your goals.
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
              <div class="div-49">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/bee7c088b7e0a4e175747000f40f11a9ae886244fddb86c6771afac06901466c?" class="img-9" />
              </div>
              <div class="div-50">Food Tracking and Analysis</div>
            </div>
            <div class="div-51">
              Effortlessly track your food intake using our user-friendly app. Our
              nutritionists will analyze your data to provide insights into your
              eating habits, help you identify areas for improvement, and make
              personalized recommendations.
            </div>
          </div>
        </div>
        <div class="column-4">
          <div class="div-52">
            <div class="div-53">
              <div class="div-54">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/a8b4872bc44cf6a92076483bd2127c84eef6fe370cc99f43609ec3f70f2f9bba?" class="img-10" />
              </div>
              <div class="div-55">Meal Planning and Recipes</div>
            </div>
            <div class="div-56">
              Access a vast collection of delicious and healthy recipes tailored
              to your dietary needs. Our nutritionists will also create
              personalized meal plans, making it easier for you to stay on track
              and enjoy nutritious meals.
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
              <div class="div-61">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/f35b36742f7df1a38dfc1ba10a5a09087b1bf4924fa89cb437141859198c0571?" class="img-11" />
              </div>
              <div class="div-62">Lifestyle and Behavior Coaching</div>
            </div>
            <div class="div-63">
              Achieving sustainable results requires more than just a diet plan.
              Our nutritionists will work with you to develop healthy habits,
              address emotional eating, and provide strategies to overcome
              obstacles along the way.
            </div>
          </div>
        </div>
        <div class="column-5">
          <div class="div-64">
            <div class="div-65">
              <div class="div-66">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/e2d4b2c23600d5ed6473ba32a51e20ce1f17fc69fdb94b86c2352362d3c0341c?" class="img-12" />
              </div>
              <div class="div-67">Nutritional Education and Workshops</div>
            </div>
            <div class="div-68">
              Expand your knowledge of nutrition through informative articles and
              educational workshops. Our nutritionists will equip you with the
              knowledge and tools to make informed choices for long-term success.
            </div>
          </div>
        </div>
      </div>
    </div>
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
                <div class="div-77"><?= $blog['cat_name'] ?></div>
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
    <div class="div-129">
      <div class="div-130">
        <div class="div-131">Our Testimonials</div>
        <div class="div-132">
          Our satisfied clients share their success stories and experiences on
          their journey to better health and well-being.
        </div>
      </div>
    </div>
    <div class="div-133">
      <div class="div-134">
        <div class="column-15">
          <div class="div-135">
            <div class="div-136">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/78402e6aedfa3a62a6ae9c70c5b3394935f4086bcc7d680f19c06540eabcd12c?" class="img-29" />
              <div class="div-137">
                I can't thank Nutritionist enough for their personalized nutrition
                coaching. It has completely transformed my approach to food and
                helped me shed those extra pounds. Highly recommended!
              </div>
            </div>
            <div class="div-138">

              <div class="profile_circle">
                <img loading="lazy" src="asset/images/girl2.avif" class="img-30" />
              </div>
              <div class="div-139">Jennifer Anderson</div>
            </div>
          </div>
        </div>
        <div class="column-16">
          <div class="div-140">
            <div class="div-141">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/80ec84e9ad7ceb7e6e1e0a3e462cd02728a60451d1da310a117336ab73dc0895?" class="img-31" />
              <div class="div-142">
                Nutritionist has been a game-changer for me. The expert guidance
                and support I received from their team made my weight loss journey
                so much easier. Thank you!
              </div>
            </div>
            <div class="div-143">

              <div class="profile_circle">
                <img loading="lazy" src="asset/images/boy_image3.avif" class="img-32" />
              </div>
              <div class="div-144">Robert Johnson</div>
            </div>
          </div>
        </div>
        <div class="column-17">
          <div class="div-145">
            <div class="div-146">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/622e8c929b4aa27b4847ea16003084206318c2085a56c54e55d815051e2b5276?" class="img-33" />
              <div class="div-147">
                I had struggled with my weight for years until I found
                Nutritionist. Their personalized approach and tailored nutrition
                plan made all the difference. I've never felt better!
              </div>
            </div>
            <div class="div-148">

              <div class="profile_circle">
                <img loading="lazy" src="asset/images/boy_image3.avif" class="img-34" />
              </div>
              <div class="div-149">Emily Davis</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="div-150">
      <div class="div-151">
        <div class="div-152">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/b3664d9f021538ecff558b007edc3ee66d446fc65606fd7d5d252d9640c33335?" class="img-35" />
        </div>
        <div class="div-153">
          <div class="div-154"></div>
          <div class="div-155"></div>
          <div class="div-156"></div>
          <div class="div-157"></div>
          <div class="div-158"></div>
        </div>
        <div class="div-159">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/f5b2501245b621e326a517dad2d470fd4179b07b1a996b6425435d856ce677bf?" class="img-36" />
        </div>
      </div>
    </div>
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
    <div class="div-164">
      <div class="div-165">Monthly</div>
      <div class="div-166">Yearly</div>
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
            <div class="div-174">
              <div class="div-175">$49</div>
              <div class="div-176">/month</div>
            </div>
            <div class="div-177">Choose Plan</div>
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
            <div class="div-182">
              <div class="div-183">$79</div>
              <div class="div-184">/month</div>
            </div>
            <div class="div-185">Choose Plan</div>
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
            <div class="div-190">
              <div class="div-191">$99</div>
              <div class="div-192">/month</div>
            </div>
            <div class="div-193">Choose Plan</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="div">
    <div class="div-194">
      <div class="div-195">
        <div class="div-196">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/908ef6eab208da116ff75e260cc91c1cc11e124d7cf350debae2a78d9eb6f1fe?" class="img-37" />
          <div class="div-197">
            <div class="div-198">Home</div>
            <div class="div-199">About</div>
            <div class="div-200">Team</div>
            <div class="div-201">Process</div>
            <div class="div-202">Pricing</div>
            <div class="div-203">Blog</div>
            <div class="div-204">Contact</div>
          </div>
          <div class="div-205">
            <div class="div-206">Got To Top</div>
            <div class="div-207">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/fbfff4234dd4d279aca22e18674a0312548d1366e754645c5eef7f55a25cb7c8?" class="img-38" />
            </div>
          </div>
        </div>
        <div class="div-208">
          <div class="div-209">
            <div class="div-210">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/dd80754d59ecafe47605e08b7cf2da709be8ce89743ecd37635b28590ea062bc?" class="img-39" />
              <div class="div-211">munna@gmail.com</div>
            </div>
            <div class="div-212">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/79a791a59734258aa73037e3b9a8c71dff93229d2044b7fec60c07a3bb19a744?" class="img-40" />
              <div class="div-213">+91 9560615174</div>
            </div>
            <div class="div-214">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/b5a77779ad27c1b4d987d98e83e11d4145d03e5916065d159fb786ece12d9005?" class="img-41" />
              <div class="div-215">Somewhere in the World</div>
            </div>
          </div>
          <div class="div-216">© 2023 Nutritionist. All rights reserved.</div>
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