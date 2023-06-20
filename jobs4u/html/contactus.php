<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <title>Contact Us</title>
      <link rel="stylesheet" type="text/css" href="../css/ContactUs.css">
      <!-- <link rel="stylesheet" type="text/css" href="../css/header.css"> -->
      <link href="https://fonts.googleapis.com/css2?
  family=Poppins&display=swap" rel="stylesheet">
</head>
</head>

<body>

      <div class="container">
            <h1>Contact Us</h1>
            <p>We would love to respond to your queries and help you succeed.Feel
                  free to get in touch with us.</p>
            <div class="contact-box">
                  <div class="contact-left">
                        <h3>Sent your request</h3>
                        <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                              <div class="input-row">
                                    <div class="input-group">
                                          <label>Name</label>
                                          <input type="text" name="name" placeholder="John Amendo">
                                    </div>
                                    <div class="input-group">
                                          <label>Phone</label>
                                          <input type="text" name="mobile" placeholder="+1 412 520 321">
                                    </div>
                              </div>
                              <div class="input-row">
                                    <div class="input-group">
                                          <label>Email</label>
                                          <input type="email" name="email" placeholder="johnamendo@gmail.com">
                                    </div>
                                    <div class="input-group">
                                          <label>Subject</label>
                                          <input type="text" name="demo" placeholder="Product demo">
                                    </div>
                              </div>
                              <label>Message</label>
                              <textarea rows="5" name="message" placeholder="Your Message"></textarea>

                              <button type="submit" name="send">SEND</button>

                        </form>
                  </div>
                  <div class="contact-right">
                        <h3>Reach Us</h3>
                        <table>
                              <tr>
                                    <td>Email</td>
                                    <td>contactus@example.com</td>
                              </tr>
                              <tr>
                                    <td>Phone</td>
                                    <td>+1 012 345 6789</td>
                              </tr>
                              <tr>
                                    <td>Address</td>
                                    <td>212 Ground floor 7th cross<br>
                                          Metropolitan, Colombo
                                    </td>
                              </tr>
                  </div>
            </div>
      </div>
</body>

</html>

<?php

if (isset($_GET['send'])) {
      include 'dbconfig2.php';

      $sql = "INSERT INTO contactus (Full_Name, Phone, Email, Sub, Message_User) VALUES (?, ?, ?, ?, ?);";
      $stmt = mysqli_stmt_init($con);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: employee_signup2.php?error=fetchfailed");
      }


      mysqli_stmt_bind_param($stmt, "sssss", $_GET['name'], $_GET['mobile'], $_GET['email'],  $_GET['demo'], $_GET['message']);
      mysqli_stmt_execute($stmt);


      mysqli_stmt_close($stmt);


      header("location: contactus.php");
      exit();
}

?>