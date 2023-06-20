<div>
      <div class="container header-content">
            <a class="header-brand" href="index.php">
                  <span class="header-brand-txt">Jobs4U</span>
            </a>
            <nav class="main-nav default navigations">
                  <ul class="main-nav-links default static_links">
                        <li><a class="main-nav-link" href="">Post A Job</a></li>
                        <li class="last_link"><a class="main-nav-link" href="contactus.php">Contact Us</a></li>

                  </ul>
                  <ul class="main-nav-links default">


                        <?php /* echo $_SESSION['userID']; */ ?>

                        <?php if (isset($_SESSION['userID'])) : ?>


                              <li>
                                    <div class="profile-box" id="profile">

                                          <div class="profile" id="profile_img">
                                                <img class="profile-img" height="35px" src="https://i.imgur.com/2QKIaJ5.png" alt="profile_img" />
                                          </div>

                                          <div id="menu-profile" class="menu-profile">
                                                <div id="profile-menu" class="profile-menu">
                                                      <p class="username"><?php echo $_SESSION['userName']; ?></p>
                                                      <a href="dashboard_employer.php">Dashboard</a>
                                                      <a href="helpcenter.html">Help Center</a>
                                                      <a href="signout.php">Sign Out</a>
                                                </div>
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
</div>