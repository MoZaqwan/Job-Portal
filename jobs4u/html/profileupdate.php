<?php
session_start();
$user = $_SESSION["userID"];
include "dbconfig2.php";
include "functions.php";


if (isset($_POST['update'])) {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];



      if (uidExistsEmployer($con, $username, $email,/* , 'employer' */) !== false) {
            echo "Try Different Username And Email";
      }

      $sql = "UPDATE employer SET EmpUsername = ?, email = ?, passCode =? WHERE EmployerID = $user;";

      $stmt = mysqli_stmt_init($con);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            header("location: employee_signup2.php?error=fetchfailed");
      }

      mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);

      header("location: dashboard_employer.php");
      exit();
}
?>