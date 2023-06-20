<?php
/* include 'dbconfig2.php'; */
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="../css/employer_login.css" />
      <title>Employee Login</title>
</head>

<body>
      <div class="login-page">
            <div class="login-welcome">
                  <p>Welcome Back</p>
                  <p class="login-welcome-txt">Start your future with big brands.</p>
                  <p class="login-brand">Jobs4U</p>
            </div>

            <div class="login-form">
                  <form class="login-fields" method="post" action="loginconfig.php">
                        <p>Log In</p>
                        <input type="hidden" name="employee" value="employee" />
                        <div>
                              <label class="login-label" for="em_email">Email</label>
                              <input name="email" class="login-input" id="em_email" placeholder="email/username" type="text" required />
                        </div>
                        <div>
                              <label class="login-label" for="em_password">Password</label>
                              <input name="password" class="login-input" id="em_password" type="password" required />
                        </div>
                        <div>
                              <button type="submit" name="login" class="login-form-submit">LOG IN</button>
                        </div>

                        <?php

                        if (!empty($_GET)) {

                              if (isset($_GET['pwd'])) {
                                    if ($_GET['pwd'] === 'incorrect') {
                                          echo '<p
                                     class="warning" 
                                     style="color:red;
                                     text-align:center;
                                     font-size: 14px;
                                     ">Password Incorrect</p>';
                                    }
                              } else if (isset($_GET['username'])) {
                                    if ($_GET['username'] === 'credentialinvalid') {
                                          echo '<p
                                     class="warning" 
                                     style="color:red;
                                     text-align:center;
                                     font-size: 14px;
                                     ">User Credential Invalid</p>';
                                    }
                              }

                              exit();
                        }
                        ?>
                  </form>
            </div>
      </div>
</body>

</html>