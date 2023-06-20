<?php

session_start();
/* require_once 'dbconfig.php'; */


include 'functions.php';
include 'dbconfig2.php';
// echo $_SESSION['userID'];

/* var_dump($_SESSION);
 */
?>


<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />

      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet" />
      <link rel="stylesheet" href="../css/header.css" />
      <link rel="stylesheet" href="../css/style.css" />
      <script defer src="../js/home.js"></script>
      <title>Jobs4U</title>
      <link rel="icon" type="image/x-icon" href="../images/android-chrome-192x192.png">
</head>

<body>
      <header>
            <div class="container header-content">
                  <a class="header-brand" href="#">
                        <span class="header-brand-txt">Jobs4U</span>
                  </a>
                  <nav class="main-nav">
                        <ul class="main-nav-links">
                              <!-- <li><a class="main-nav-link" href="">Local Jobs</a></li>
					  <li><a class="main-nav-link" href="">Foreign Jobs</a></li> -->
                              <li><a class="main-nav-link" href="dashboard_config.php">Post A Job</a></li>
                              <li><a class="main-nav-link" href="contactus.php">Contact Us</a></li>



                              <?php if (isset($_SESSION['userID'])) : ?>
                                    <li>
                                          <div class="profile-box" id="profile">
                                                <img class="profile-img" height="35px" src="https://i.imgur.com/2QKIaJ5.png" alt="profile_img" />

                                                <div class="profile-menu ">
                                                      <p class="username"><?php echo $_SESSION['userName']; ?></p>
                                                      <a href="dashboard_config.php">Dashboard</a>
                                                      <a href="helpcenter.html">Help Center</a>
                                                      <a href="signout.php">Sign Out</a>
                                                </div>
                                          </div>
                                    </li>
                              <?php endif; ?>


                              <?php if (!isset($_SESSION['userID'])) : ?>
                                    <li>
                                          <a class="main-nav-link" href="./selectsignin.html">Sign In</a>
                                    </li>
                                    <li>
                                          <a href="./selectaccount.html"><button class="btn-join">Register</button></a>
                                    </li>
                              <?php endif; ?>

                        </ul>
                  </nav>
            </div>
      </header>

      <section class="hero">
            <div>
                  <div class="container">
                        <div class="hero-content">
                              <div class="hero-text-area">
                                    <h1 class="hero-header">You deserve a job<br> that loves you back</h1>
                                    <form class="hero-search-section" action="search_results.php" method="get">
                                          <div class="search-bar">
                                                <!-- <form> -->
                                                <input class="search-box" type="text" placeholder="(-: search your dream job" name="search"></input>
                                                <button class="search-btn" name="submit">Search</button>
                                                <!-- </form> -->
                                          </div>

                                    </form>

                                    <div class="live-post">
                                          <p><span class="live-count"></span>120+ Active <br> Vaccancies</p>
                                    </div>

                              </div>
                              <div class="hero-image-area">

                              </div>
                        </div>
                  </div>

                  <div class="testimonial">

                  </div>
            </div>
      </section>


      <section class="top-clients">
            <p class="top-em">Our Top Employees</p>
            <div class="employees">
                  <p class="brand-1">Cheng</p>
                  <p class="brand-2">Kaita</p>
                  <p class="brand-3">HBL</p>
                  <p class="brand-4">Cinnamon</p>
            </div>
      </section>

      <section>

            <main>
                  <div class="container main-home">

                        <div class="content">

                              <p class="new-job-offers">Newly Published Job Offers</p>

                              <?php

                              include 'dbconfig2.php';

                              $sql = "SELECT * FROM company c, vacancies v  WHERE V.Reg_No = C.RegNo ORDER BY published_date DESC LIMIT 10;";
                              $stmt = mysqli_stmt_init($con);


                              if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                                    // header("location: employee_signup2.php?error=fetchfailed");
                              }

                              mysqli_stmt_execute($stmt);
                              $result =  mysqli_stmt_get_result($stmt);



                              // echo '<pre>';
                              // var_dump(mysqli_fetch_assoc($result));
                              // echo '</pre>';


                              while ($row = mysqli_fetch_assoc($result)) {


                                    $company_img = '../images/company/J4u.png';
                                    if ($row['CompanyLogo']) {
                                          $company_img = $row['CompanyLogo'];
                                    }

                                    echo '
                                    <div class="job-card">

                                    <div class="card-up">

                                          <div>
                                                <img class="card-img" src="' . $company_img . '" alt="" />
                                          </div>

                                          <div class="card-header">
                                                <div class="card-job-title">
                                                      <p>' . $row['title'] . '</p>
                                                </div>
                                                <span class="card-job-company">' . $row['CompanyName'] . '</span>
                                          </div>

                                          <div class="extra-details">
                                                <p class="job-expire-date">Closing Date ' . $row['closing_date'] . '</p>
                                          </div>

                                    </div>

                                    <div class="card-down">
                                          <div class="card-tags">
                                                <div class="card-category">
                                                      <span class="category-txt">' . $row['location'] . '</span>
                                                </div>
                                                <div class="card-category">
                                                      <span class="category-txt">' . $row['type'] . '</span>
                                                </div>
                                                <div class="card-category">
                                                      <span class="category-txt">' . $row['Industry'] . '</span>
                                                </div>
                                                <div class="card-category">
                                                      <span class="category-txt">' . $row['published_date'] . '</span>
                                                </div>
                                          </div>
                                          <a class="view" href="display_post.php?id=' . $row['job_id'] . '" name="view_post" >Apply Now</a>
                                    </div>
                              </div>

                                    
                                    ';
                              }


                              ?>



                              <div class="page-selctor">
                                    <form type="submit" action="search_results.php">
                                          <button class="show-btn" type="submit">Show More</button>
                                    </form>
                              </div>
                        </div>

                  </div>
            </main>

            <div class="promo">
                  <div>
                        <img class="promo-img" src="../images/promo1.jpg" />
                  </div>
                  <div class="promo-text">
                        <p class="promo-header">It' s not only for the big brands</p>
                        <p class="promo-msg">Whatever your business size, we can help you to find the best employees suited for
                              your business goals.
                        </p>
                        <div class="promo-features">
                              <div class="promo-feature">
                                    <img class="feature-icons" src="../images/icons/2.png" />
                                    <p>No Hidden<br> Fees</p>
                              </div>
                              <div class="promo-feature">
                                    <img class="feature-icons" src="../images/icons/1.png" />
                                    <p>Unlimited <br>Posts</p>
                              </div>
                              <div class="promo-feature">
                                    <img class="feature-icons" src="../images/icons/1.png" />
                                    <p>24/7 Customer<br> Support</p>
                              </div>

                        </div>
                        <div class="promo-action">
                              <p class="promo-free">It's Totally Free</p>
                              <button class="try-btn">Try It Now</button>
                        </div>
                        <small class="condition">conditions may applied</small>
                  </div>
            </div>
      </section>

      <!-- footer -->
      <?php require_once 'footer.php'; ?>
</body>

</html>