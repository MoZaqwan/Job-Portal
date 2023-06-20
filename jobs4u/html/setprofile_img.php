<?php
include 'dbconfig2.php';

session_start();

echo '<pre>';
var_dump($_FILES);
echo '</pre>';

$user = $_SESSION['userID'];


$sql = "SELECT RegNo FROM employer WHERE EmployerID  = $user";

$stmt = mysqli_stmt_init($con);
if (!mysqli_stmt_prepare($stmt, $sql)) {
      (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      // header("location: employee_signup2.php?error=fetchfailed");
}

mysqli_stmt_execute($stmt);
$result =  mysqli_stmt_get_result($stmt);
$company = mysqli_fetch_assoc(($result));

$Reg_No = $company['RegNo'];

echo '<pre>';
var_dump($Reg_No);
echo '</pre>';


if (!is_dir('users')) {
      mkdir('users');
}


$filePath = "";


if ($_FILES['profile_pic']) {
      $file = $_FILES['profile_pic'];



      function generaterandomStr($n)
      {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFHIJKLMNOPQRSTUVWXYZ';
            $str = '';

            for ($i = 0; $i < $n; $i++) {
                  $index = rand(0, strlen($characters) - 1);
                  $str .= $characters[$index];
            }

            return $str;
      }


      $filePath = 'users/employers/' . generaterandomStr(10) . '/' . $file['name'];
      mkdir(dirname($filePath));
      echo $filePath;

      move_uploaded_file($file['tmp_name'], $filePath);

      echo $filePath;
}


$sql = "UPDATE company SET CompanyLogo = '$filePath' WHERE RegNo = '$Reg_No';";
$stmt = mysqli_stmt_init($con);

if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: employee_signup2.php?error=fetchfailed");
      exit();
}


mysqli_stmt_execute($stmt);

header("location: dashboard_employer.php");
