<?php

echo '<pre>';
echo var_dump($_POST);
echo '<pre>';

include 'dbconfig2.php';
include 'functions.php';


if (isset($_POST['login'])) {

      $email = $_POST['email'];
      $password = $_POST['password'];

      if (isset($_POST['employee'])) {
            $usertype = $_POST['employee'];
      };

      if (isset($_POST['employer'])) {
            $usertype = $_POST['employer'];
      };

      loginuser($con, $email, $password, $usertype);
} else {
      header("location: selectsignin.html");
      exit();
}
?>