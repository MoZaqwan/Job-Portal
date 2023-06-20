<?php

session_start();

include 'dbconfig2.php';
require_once 'functions.php';

if (isset($_SESSION['userID'])) {
      header("location: index.php");
}

if (isset($_POST['employee_sign_up'])) {

      $username = $_POST['user_name'];
      $firstname = $_POST['first_name'];
      $lastname = $_POST['last_name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $re_password = $_POST['re_password'];
      //$table = $_POST['employee'];


      if (pwdMatch($password, $re_password) !== false) {
            header("location: ./employee_signup2.php?error=passworddidntmatch");
            exit();
      };

      if (uidExistsjobseeker($con, $username, $email)!== false) {
            header("location: ./employee_signup2.php?error=usernamealreadytaken");
            exit();
      };


      createEmployeeUser($con, $username, $firstname, $lastname, $email, $password);

      // header("location: ./index.php");
} else if (isset($_POST['employer_sign_up'])) {

      // var_dump($_POST);
      $username = $_POST['username'];
      $company = $_POST['company_name'];
      $reg_number = $_POST['company_register_num'];
      $email = $_POST['email'];
      $company_description = $_POST['company_description'];
      $password = $_POST['password'];
      $re_password = $_POST['re_password'];
      $location = $_POST['location'];
      // $company_logo = $_POST['company_logo'];
      //$table = $_POST['employer'];



      if (pwdMatch($password, $re_password) !== false) {
            header("location: ./employer_signup2.php?error=passworddidntmatch");
            exit();
      };

      if (uidExistsEmployer($con, $username, $email) !== false) {
            header("location: ./employer_signup2.php?error=usernamealreadytaken");
            exit();
      };

      // $file = $_FILES['company_logo'];
      // echo '<pre>';
      // var_dump($_FILES);
      // echo '</pre>';
      // exit();

      // $fileName = $_FILES['com_logo']['name'];
      // $fileTmpName = $_FILES['com_logo']['tmp_name'];
      // $fileSize = $_FILES['com_logo']['size'];
      // $fileError = $_FILES['com_logo']['error'];
      // $fileType = $_FILES['com_logo']['type'];




      // $fileExt = explode('.', $fileName);
      // $fileActualExt = strtolower(end($fileExt));

      // $allowed = array('jpg', 'jpeg', 'png');

      // if (in_array($fileActualExt, $allowed)) {
      //       if ($fileError === 0) {
      //             if ($fieSize < 50000) {
      //                   $fileNewName = uniqid('', true) . "." . $fileActualExt;
      //                   $fileDestination = '../uploads/images/users/' . $fileNewName;
      //                   move_uploaded_file($fileTmpName, $fileDestination);
      //             }
      //       } else {
      //             exit();
      //       }
      // } else {
      // }

      createEmployerUser($con, $username, $company, $reg_number, $email, $company_description, $password, $location);
      // header("location: ./dashboard.php");
} else {

      header("location: selectaccount.html");
      exit();
}
?>