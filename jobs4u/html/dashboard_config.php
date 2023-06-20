<?php

session_start();
include 'dbconfig2.php';
// echo $_SERVER['userType'];

if (isset($_SESSION['userType'])) {
      echo $_SESSION['userType'];

      if ($_SESSION['userType'] === 'employer') {

            header("location: dashboard_employer.php");
            echo "JEL";
            exit();
      } else if ($_SESSION['userType'] === 'employee') {
            header("location: index.php");
            exit();
      } else {
            echo "Something Wrong OR You don't have access";
      }
}
