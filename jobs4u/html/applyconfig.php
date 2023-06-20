<?php

include 'dbconfig2.php';
session_start();

if ($_SESSION['userType'] == 'employee') {

      //get post data
      $postID = $_POST['post_id'];
      $employeeID = $_SESSION['userID'];
      $fullname = $_POST['fname'];
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];
      $coverletter = $_POST['CoverLetter'];
      $fileLoc = "";

      // echo '<pre>';
      // var_dump($_FILES);
      // echo '</pre>';

      //if file directory not availabe create dir for the first time
      if (!is_dir('cv')) {
            mkdir('cv');
      }


      if ($_FILES['cv']) {
            $file = $_FILES['cv'];

            //get unique folder
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


            $filePath = 'cv/' . generaterandomStr(10) . '/' . $file['name'];
            $fileLoc = $filePath;
            mkdir(dirname($fileLoc));
            echo $fileLoc;

            //upload file
            move_uploaded_file($file['tmp_name'], $fileLoc);
      }


      $sql = "SELECT Emp_ID FROM vacancies WHERE job_id = $postID;";

      $stmt = mysqli_stmt_init($con);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
            (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            // header("location: employee_signup2.php?error=fetchfailed");
      }

      mysqli_stmt_execute($stmt);
      $result =  mysqli_stmt_get_result($stmt);

      $Employer = mysqli_fetch_assoc(($result));
      mysqli_stmt_close($stmt);

      $EmpID = $Employer['Emp_ID'];



      include 'functions.php';

      applyvacany($con, $employeeID, $fullname, $email, $mobile, $coverletter, $fileLoc, $EmpID, $postID);
} else {
      header("location: index.php");
}
