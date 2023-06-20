<?php

session_start();
include 'dbconfig2.php';
include 'functions.php';

$activePost = $_GET['id'];
$vacancy =  getPostDetails($con, $activePost);

$skillStr = $vacancy['skills'];
$skillArr = explode(',', $skillStr);

?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../css/header.css">
      <link rel="stylesheet" href="../css/viewpost.css">
      <title>Document</title>
</head>

<body>
      <header class="post_view_header">
            <?php include "header.php" ?>
      </header>

      <main>
            <div class="post_container">

                  <div class="full_vacancy_post">

                        <div>
                              <p class="published_date">Published <?php echo $vacancy['published_date'] ?></p>
                        </div>

                        <div class="main_data">

                              <div class="company">
                                    <img class="post-brand-img" src="<?php
                                                                        if ($vacancy['CompanyLogo']) {
                                                                              echo $vacancy['CompanyLogo'];
                                                                        } else {
                                                                              echo '../images/company/J4u.png';
                                                                        }

                                                                        ?>" />
                              </div>
                              <div class="text-content">
                                    <p class="title">
                                          <?php echo $vacancy['title'] ?>
                                    </p>

                                    <p class="company">
                                          <?php echo $vacancy['CompanyName'] . "     " . "   (Compay Reg No: " . $vacancy['Reg_No'] . " )" ?>
                                    </p>
                              </div>


                              <div class="apply">
                                    <form method="post" action="apply.php">
                                          <input hidden name="post_id" value=<?php echo $activePost ?>>
                                          <input hidden name="post_title" value="<?php echo $vacancy['title'] ?>">
                                          <button type="submit" class="apply_now">Apply Now</button>
                                    </form>
                              </div>
                        </div>



                        <div class="basic-data">
                              <div class="data-fields">
                                    <div class="field-name">
                                          Industry
                                    </div>
                                    <div class="field-value">
                                          <?php echo $vacancy['Industry'] ?>
                                    </div>
                              </div>
                              <div class="data-fields">
                                    <div class="field-name">
                                          Working Location
                                    </div>
                                    <div class="field-value">
                                          <?php echo $vacancy['location'] ?>
                                    </div>
                              </div>
                              <div class="data-fields">
                                    <div class="field-name">
                                          Working Type
                                    </div>
                                    <div class="field-value">
                                          <?php echo $vacancy['type'] ?>
                                    </div>
                              </div>
                              <div class="data-fields">
                                    <div class="field-name">
                                          Clossing Date
                                    </div>
                                    <div class="field-value">
                                          <?php echo $vacancy['closing_date'] ?>
                                    </div>
                              </div>
                              <div class="data-fields">
                                    <div class="field-name">
                                          Skills
                                    </div>
                                    <div class="skill-value">
                                          <ul>
                                                <?php foreach ($skillArr as $skill) : ?>
                                                      <ol class="skill_el"><?php echo $skill ?></ol>
                                                <?php endforeach; ?>
                                          </ul>
                                    </div>
                              </div>
                        </div>





                        <div class="description">
                              <p class="field-name">Description</p>
                              <p class="description_text"><?php echo $vacancy['description'] ?></p>
                        </div>

                        <div class="description">
                              <p class="field-name">Why Us</p>
                              <p class="description_text"><?php echo $vacancy['CompanyDescription'] ?></p>
                        </div>

                  </div>

            </div>
            </div>
      </main>
      <?php
      include_once 'footer.php';
      ?>
</body>


</html>