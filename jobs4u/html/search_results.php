<?php


session_start();

include 'dbconfig2.php';

// $sql = "SELECT * FROM vacancies WHERE title LIKE ? OR  industry LIKE ?;";
?>


<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="../css/style.css" />
      <script defer src="../js/script.js"></script>
      <!-- <link rel="stylesheet" href="../css/styles.css" /> -->
      <link rel="stylesheet" href="../css/header.css" />
      <title>Document</title>
</head>

<body>
      <header>
            <?php include 'header.php' ?>
      </header>
</body>

<main>
      <div class="container main">

            <div class="sidebar side-bar-new">

                  <div class="advance-search-box">
                        <form class="search_select_fields" action="search_results.php">
                              <div class="search-bar">
                                    <input class="search-box advanced-search" type="text" placeholder="(:- search your dream job" name="search"></input>
                                    <button class="search-btn advanced-btn" name="submit">Search</button>
                              </div>


                              <!--<div class="selection">-->
                              <div class="select_options">
                                    <div>
                                          <label class="search_label" for="location">Location</label>
                                          <select name="location" id="location" required>
                                                <option disabled selected>Select</option>
                                                <option value="Colombo">Colombo</option>
                                                <option value="Anuradhapura">Anuradhapura</option>
                                                <option value="Batticola">Batticola</option>
                                                <option value="Galle">Galle</option>
                                                <option value="Gampha">Gampha</option>
                                                <option value="Jaffna">Jaffna</option>
                                                <option value="Kaluthara">Kaluthara</option>
                                                <option value="Kandy">Kandy</option>
                                                <option value="Kurunagala">Kurunagala</option>
                                                <option value="Matara">Matara</option>
                                                <option value="Other">Other</option>
                                          </select>
                                    </div>

                                    <div>
                                          <label class="search_label" for="industry">Industry</label>
                                          <select name="industry" id="category" required>
                                                <option disabled selected>Select</option>
                                                <option value="Accounting">Accounting & Finance</option>
                                                <option value="Banking">Banking</option>
                                                <option value="Customer Service">Customer Service</option>
                                                <option value="Education">Educational</option>
                                                <option value="Hospitality">Hospitality</option>
                                                <option value="IT & Software">IT</option>
                                                <option value="Transportation">Transportation</option>
                                                <option value="Tourism">Tourism</option>
                                                <option value="Medical">Medical Service</option>
                                                <option value="Other">Other</option>
                                          </select>
                                    </div>
                                    <!-- </div> -->



                                    <!-- <div class="selection"> -->
                                    <div>
                                          <label class="search_label" for="working">Working Type</label>
                                          <select name="working" id="type" required>
                                                <option disabled selected>Select</option>
                                                <option value="Fulltime">Fulltime</option>
                                                <option value="Parttime">Parttime</option>
                                                <option value="Contract">Contract Base</option>
                                                <option value="Work From Home">Work From Home</option>
                                                <option value="Internship">Internship</option>
                                          </select>
                                    </div>

                                    <div>
                                          <label class="search_label" for="application_closed">Application Closed In</label>
                                          <select name="application_closed" id="category" required>
                                                <option disabled selected>Select</option>
                                                <option value="1">Next Day</option>
                                                <option value="3">Next 3 Days</option>
                                                <option value="7">Next Week</option>
                                                <option value="30">Month</option>
                                          </select>
                                    </div>
                              </div>
                              <!-- </div> -->
                              <!-- <form action="get_search_results.php"> -->

                              <!--<p class="advanced-header">Job Type</p>
                              <div name="working_type" class="checkboxes">
                                    <div class="check-tag">
                                          <input name="fulltime" type="checkbox" id="fulltime" value="Fulltime" />
                                          <label for="fulltime">Full Time</label>
                                    </div>
                                    <div class="check-tag">
                                          <input name="parttime" type="checkbox" id="parttime" value="Parttime" />
                                          <label for="parttime">Part Time</label>
                                    </div>
                                    <div class="check-tag">
                                          <input name="contract" type="checkbox" id="contract" value="Contract" />
                                          <label for="contract">Contract Base</label>
                                    </div>
                                    <div class="check-tag">
                                          <input name="home" type="checkbox" id="home" value="Work From Home" />
                                          <label for="home">Work From Home</label>
                                    </div>
                                    <div class="check-tag">
                                          <input name="intern" type="checkbox" id="intern" value="Internship" />
                                          <label for="intern">Internship</label>
                                    </div>

                              </div>

                              <p class="advanced-header">Application Closing In(Next)</p>
                              <div name="application_closed" class="checkboxes">
                                    <div class="check-tag">
                                          <input name="24" type="checkbox" id="24" value="24" />
                                          <label for="24">24 Hours</label>
                                    </div>
                                    <div class="check-tag">
                                          <input name="3" type="checkbox" id="parttime" value="3" />
                                          <label for="3days">3 Days</label>
                                    </div>
                                    <div class="check-tag">
                                          <input name="7" type="checkbox" id="contract" value="7" />
                                          <label for="contract">7 Days</label>
                                    </div>
                                    <div class="check-tag">
                                          <input name="30" type="checkbox" id="intern" value="30" />
                                          <label for="intern">Month</label>
                                    </div>
                              </div>-->


                              <!-- <button type="submit" name="add_filters">Add Filters</button> -->
                              <!-- </form> -->
                        </form>
                  </div>




            </div>

            <div class="content">
                  <?php

                  // echo '<pre>';
                  // var_dump($_GET);
                  // echo '</pre>';


                  if (isset($_GET["submit"])) {

                        // echo '<pre>';
                        // var_dump($_GET["search"]);
                        // echo '</pre>';


                        $query = "SELECT * FROM vacancies";
                        $query = "SELECT * FROM company c, vacancies v WHERE v.Reg_NO = C.RegNo";


                        if (isset($_GET['search']))
                              $search = $_GET['search'];
                        if (isset($_GET['location']))
                              $location  = $_GET['location'];
                        if (isset($_GET['industry']))
                              $industry = $_GET['industry'];
                        if (isset($_GET['working']))
                              $working_type = $_GET['working'];


                        $today = date('Y-m-d');
                        $date = date_create($today);
                        $end_date = '';

                        if (isset($_GET['application_closed'])) {
                              $day = $_GET['application_closed'];
                              echo $day;

                              if ($day == 1) {
                                    $end_date = date_add($date, date_interval_create_from_date_string('1 days'));
                                    $end_date =  date_format($end_date, 'Y-m-d');
                              }

                              if ($day == 3) {
                                    $end_date = date_add($date, date_interval_create_from_date_string('3 days'));
                                    $end_date =  date_format($end_date, 'Y-m-d');
                              }

                              if ($day == 7) {
                                    $end_date = date_add($date, date_interval_create_from_date_string('7 days'));
                                    $end_date =  date_format($end_date, 'Y-m-d');
                              }

                              if ($day == 30) {
                                    $end_date = date_add($date, date_interval_create_from_date_string('30 days'));
                                    $end_date =  date_format($end_date, 'Y-m-d');
                              }
                        }


                        // $date = date_create($today);
                        // $newDate = date_add($date, date_interval_create_from_date_string('1 days'));
                        // $newDate =  date_format($newDate, 'Y-m-d');
                        // echo $newDate;
                        // echo $day;
                        // exit();


                        $conditions = array();
                        if (!empty($search)) {
                              $conditions[] = "title LIKE '%$search%' ";
                        }
                        if (!empty($location)) {
                              $conditions[] = "location='$location'";
                        }
                        if (!empty($industry)) {
                              $conditions[] = "Industry='$industry'";
                        }
                        if (!empty($working)) {
                              $conditions[] = "type='$working'";
                        }
                        if (!empty($day)) {
                              $conditions[] = "closing_date <= '$end_date'";
                        }

                        $and = " AND ";


                        $sql = $query;
                        if (count($conditions) > 0) {
                              $sql .= " AND "  . implode(' AND ', $conditions) . " ORDER BY closing_date DESC;";
                        }
                        //$query = "SELECT * FROM company c, vacancies v  WHERE V.Reg_No = C.RegNo;";



                        $result = mysqli_query($con, $sql);
                        $availableResult = mysqli_num_rows($result);


                        if ($availableResult > 0) {
                              for ($x = 0; $x < $availableResult; $x++) {
                                    while ($row = mysqli_fetch_assoc($result)) {

                                          // var_dump($row);
                  ?>
                                          <div class="job-card">


                                                <div class="card-up">


                                                      <div>
                                                            <img class="card-img" src="<?php
                                                                                          if ($row['CompanyLogo']) {
                                                                                                echo $row['CompanyLogo'];
                                                                                          } else {
                                                                                                echo '../images/company/J4u.png';
                                                                                          }

                                                                                          ?>" alt="" />
                                                      </div>

                                                      <div class="card-header">
                                                            <div class="card-job-title">
                                                                  <p><?php echo $row['title'] ?></p>
                                                            </div>
                                                            <span class="card-job-company"><?php echo $row['CompanyName'] ?></span>
                                                      </div>

                                                      <div class="extra-details">
                                                            <p class="job-expire-date">Closing Date <?php echo $row['closing_date'] ?></p>
                                                      </div>

                                                </div>

                                                <div class="card-down">
                                                      <div class="card-tags">
                                                            <div class="card-category">
                                                                  <span class="category-txt"><?php echo $row['location'] ?></span>
                                                            </div>
                                                            <div class="card-category">
                                                                  <span class="category-txt"><?php echo $row['type'] ?></span>
                                                            </div>
                                                            <div class="card-category">
                                                                  <span class="category-txt"><?php echo $row['Industry'] ?></span>
                                                            </div>
                                                            <div class="card-category">
                                                                  <span class="category-txt"><?php echo $row['published_date']; ?></span>
                                                            </div>
                                                      </div>
                                                      <a class="view" href="display_post.php?id=<?php echo $row['job_id'] ?>" name="view_post">Apply Now</a>

                                                </div>
                                          </div>
                  <?php
                                    }
                              }
                        } else {

                              echo "<div class='job-card'> Looks like are no results matching your search try different keyword </div>";
                        }
                  }
                  ?>




            </div>

</main>

<?php
include_once 'footer.php';
?>