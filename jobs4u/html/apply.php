<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../css/header.css">
      <link rel="stylesheet" href="../css/applicationstyle.css">
      <title>Document</title>
</head>

<body>
      <header>
            <?php include 'header.php' ?>
      </header>

      <body>
            <div class="formspace">
                  <div class="top">
                        <div class="jobTitle">
                              <h3 class="topTitle"><?php echo $_POST['post_title'] ?></h3>
                        </div>
                        <!-- <div class="cmpnyLogo">
                              <img src="../images/bcl.png" alt="company logo" />
                        </div> -->
                  </div>
                  <form action="applyconfig.php" method="post" class="formAtts" enctype="multipart/form-data">
                        <div>
                              <input hidden name="post_id" value=<?php echo $_POST['post_id'] ?> />
                              <label for="fname">Full name*:</label><br />
                              <input class="inputArea" type="text" id="fname" name="fname" placeholder="John Doe / Jane Doe" required /><br /><br />
                              <!-- <label for="lname">Last name*:</label><br />
                              <input class="inputArea" type="text" id="lname" name="lname" placeholder="Jameson" required /><br /><br /> -->
                              <label for="emailAddress">Email*:</label><br />
                              <input class="inputArea" type="email" id="emailAddress" name="email" pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9]+.\(?=.*[a-z].{2,3})" placeholder="mrxyz@domain.com" required /><br /><br />
                              <label for="phoneNum">Phone Number*:</label><br />
                              <input class="inputArea" type="phone" id="phoneNum" name="mobile" pattern="07+[0-9]{8}" placeholder="07XXXXXXXX" required /><br /><br />
                              <label for="CoverLetter">Cover letter(optional):</label><br />
                              <textarea id="CoverLetter" name="CoverLetter" rows="6" cols="50"></textarea>
                              <br />
                              <br />
                              <div class="upload">
                                    <input type="file" id="myCV" name="cv" />
                                    <label id="UploadButton" for="myCV">Upload CV</label>
                              </div>
                              <br />
                              <div class="bottom">
                                    <button type="submit" name="submit" id="submitBtn">SUBMIT APPLICATION</button>
                                    <button href="index.php" id="closeBtn">CLOSE</button>
                              </div>
                        </div>
                  </form>
            </div>
      </body>
</body>

</html>