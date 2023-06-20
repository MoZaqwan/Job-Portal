<?php


function pwdMatch($pwd, $re_pwd)
{
      $result = true;

      if ($pwd !==  $re_pwd) {
            $result = true;
      } else {
            $result = false;
      }
      return $result;
}


function uidExistsjobseeker($con, $username, $email)
{
	 $sql = "SELECT * FROM jobseeker WHERE JSuserName = ? OR email = ?;";


      $stmt = mysqli_stmt_init($con);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: employee_signup2.php?error=fetchfailed");
            exit();
      } else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);

            $results = mysqli_stmt_get_result($stmt);

            // echo $results;
            // exit();


            if ($row = mysqli_fetch_assoc($results)) {
                  return $row;
                  // echo '<pre>';
                  // var_dump($row);
                  // echo '</pre>';
                  // exit();
            } else {
                  return false;
            }

            /*else if ($results) {
                  $result = false;
                  return $result;
            }*/


            mysqli_stmt_close($stmt);
      }
	  
}

function uidExistsEmployer($con, $username, $email)
{
	 
      $sql = "SELECT * FROM employer WHERE EmpUsername = ? OR email = ?;";
      
      $stmt = mysqli_stmt_init($con);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: employer_signup2.php?error=fetchfailed");
            exit();
      } else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);

            $results = mysqli_stmt_get_result($stmt);

            // echo $results;
            // exit();


            if ($row = mysqli_fetch_assoc($results)) {
                  return $row;
                  // echo '<pre>';
                  // var_dump($row);
                  // echo '</pre>';
                  // exit();
            } else {
                  return false;
            }

            /*else if ($results) {
                  $result = false;
                  return $result;
            }*/


            mysqli_stmt_close($stmt);
      }
	  
}

function uidExists($con, $username, $email, $table)
{
      if ($table == 'employer') {
		  $sql = "SELECT * FROM employer WHERE EmpUsername = ? OR email = ?;";
		  
		  $stmt = mysqli_stmt_init($con);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: employer_signup2.php?error=fetchfailed");
            exit();
      } else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);

            $results = mysqli_stmt_get_result($stmt);

            // echo $results;
            // exit();


            if ($row = mysqli_fetch_assoc($results)) {
                  return $row;
                  // echo '<pre>';
                  // var_dump($row);
                  // echo '</pre>';
                  // exit();
            } else {
                  return false;
            }

            /*else if ($results) {
                  $result = false;
                  return $result;
            }*/


            mysqli_stmt_close($stmt);
      }
      }else if($table == 'employee'){
		  $sql = "SELECT * FROM jobseeker WHERE JSuserName = ? OR email = ?;";
		  
		  $stmt = mysqli_stmt_init($con);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: employee_signup2.php?error=fetchfailed");
            exit();
      } else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);

            $results = mysqli_stmt_get_result($stmt);

            // echo $results;
            // exit();


            if ($row = mysqli_fetch_assoc($results)) {
                  return $row;
                  // echo '<pre>';
                  // var_dump($row);
                  // echo '</pre>';
                  // exit();
            } else {
                  return false;
            }

            /*else if ($results) {
                  $result = false;
                  return $result;
            }*/


            mysqli_stmt_close($stmt); 
	  }
	  }
}
	  
function loginuser($con, $email, $password, $usertype)
{

      $uidExist = uidExists($con, $email, $email, $usertype);

      if ($uidExist === false) {
            if ($usertype === 'employee'){
                  header("location: employee_login.php?username=credentialinvalid");
			}
            else if ($usertype === 'employer') {
                  header("location: employer_login.php?username=credentialinvalid");
            }
            exit();
			
      }


      // $hashedPwd = $uidExist['passCode'];
      // echo $uidExist['passCode'];
      // $checkPwd = password_verify($password, $hashedPwd);
      // echo $checkPwd;

      if ($password === $uidExist['passCode']) {
            session_start();

            if ($usertype == 'employee') {
                  $_SESSION['userID'] = $uidExist['seekerID'];
                  $_SESSION['userName'] = $uidExist['JSuserName'];
                  $_SESSION['userType'] = 'employee';

                  header("location: index.php");
            } else if ($usertype == 'employer') {
                  $_SESSION['userID'] = $uidExist['EmployerID'];
                  $_SESSION['userName'] = $uidExist['EmpUsername'];
                  $_SESSION['userType'] = 'employer';

                  header("location: dashboard_employer.php");
            }
      } else {

            if ($usertype === 'employer') {
                  header("location: employer_login.php?pwd=incorrect");
                  exit();
            } else if ($usertype === 'employee'){
                  header("location: employee_login.php?pwd=incorrect");
                  exit();
            }
      }


      //tempory because whatever reason verify_passwordnot wrol



      echo $_SESSION['userID'];
      echo $_SESSION['userType'];

      header("location: dashboard_employer.php");


      exit();
}

function  createEmployeeUser($con, $username, $firstname, $lastname, $email, $password)
{
      $sql = "INSERT INTO jobseeker(firstname, lastname, JSuserName, email, passCode ) VALUES  (?, ?, ?, ?, ?);";
      $stmt = mysqli_stmt_init($con);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: employee_signup2.php?error=fetchfailed");
      }

      // $hashPassword = password_hash($password);
      // $hashPassword = password_hash($password, PASSWORD_DEFAULT);


      mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $username,  $email, $password);
      mysqli_stmt_execute($stmt);

      mysqli_stmt_close($stmt);

      header("location: employee_login.php");
      exit();
}


function createEmployerUser($con, $username, $company, $reg_number, $email, $company_description, $password, $address)
{


      /*Insert to company table*/
      $sql2 = "INSERT INTO company(RegNo, CompanyName, CompanyDescription, CompanyAddress) VALUES (?, ?, ?, ? );";
      $stmt = mysqli_stmt_init($con);

      if (!mysqli_stmt_prepare($stmt, $sql2)) {
            header("location: employee_signup2.php?error=fetchfailed");
      }

      mysqli_stmt_bind_param($stmt, "ssss", $reg_number, $company, $company_description, $address);
      mysqli_stmt_execute($stmt);
      // mysqli_stmt_close($stmt);

      /*insert to employer table*/
      $sql1 = "INSERT INTO employer(EmpUsername, email, passCode,RegNo) VALUES  (?, ?, ?,?);";
      $stmt = mysqli_stmt_init($con);

      if (!mysqli_stmt_prepare($stmt, $sql1)) {
            header("location: employee_signup2.php?error=fetchfailed");
      }

      // $hashPassword = password_hash($password, PASSWORD_DEFAULT);

      mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $password, $reg_number);
      mysqli_stmt_execute($stmt);
      // mysqli_stmt_close($stmt);


      header("location: employer_login.php");

      exit();
}






/* */
function createNewVacancy($con, $title, $location, $type, $industry, $description, $published_date, $closing_date, $skillset, $userID, $regNo)
{

      $sql = "INSERT INTO vacancies (title, location, type, industry, description, published_date, closing_date, skills, Emp_ID, Reg_No) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
      $stmt = mysqli_stmt_init($con);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            // header("location: employee_signup2.php?error=fetchfailed");
      }

      mysqli_stmt_bind_param($stmt, "ssssssssis", $title, $location, $type, $industry, $description, $published_date, $closing_date, $skillset, $userID, $regNo);
      mysqli_stmt_execute($stmt);



      mysqli_stmt_close($stmt);

      header("location: dashboard_employer.php");
      exit();
}

function updateVacancy($con, $id, $title, $location, $type, $industry, $description, $skillset, $closing_date)
{
      $sql = "UPDATE vacancies SET title = ?, location = ? , type = ?, Industry = ?, description = ?, closing_date = ?, skills = ? WHERE job_id = $id;";
      $stmt = mysqli_stmt_init($con);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            // header("location: employee_signup2.php?error=fetchfailed");
      }

      mysqli_stmt_bind_param($stmt, "sssssss", $title, $location, $type, $industry, $description, $closing_date, $skillset);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);

      header("location: dashboard_employer.php");
      exit();
}


function deleteVacancy($con, $id)
{


      $sql = "DELETE FROM vacancies WHERE job_id = '$id';";
      $stmt = mysqli_stmt_init($con);


      if (!mysqli_stmt_prepare($stmt, $sql)) {
            (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            // header("location: employee_signup2.php?error=fetchfailed");
      }

      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);

      header("location: dashboard_employer.php");
      exit();
}


function getPostDetails($con, $id)
{
      $sql = "SELECT * FROM company c, vacancies v WHERE job_id = $id AND c.RegNo = v.Reg_No;";

      $stmt = mysqli_stmt_init($con);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
            (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            // header("location: employee_signup2.php?error=fetchfailed");
      }

      mysqli_stmt_execute($stmt);
      $result =  mysqli_stmt_get_result($stmt);

      $postData = mysqli_fetch_assoc(($result));
      mysqli_stmt_close($stmt);
      return $postData;
}


function applyvacany($con, $user, $name, $email, $mobile, $coverletter, $fileLoc, $Emp_ID, $post_id)
{
      $sql = "INSERT INTO applications (JSUserID, JobID, EmployerID, Coverletter, FullName, ContactNo, email, CV) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
      $stmt = mysqli_stmt_init($con);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: employee_signup2.php?error=fetchfailed");
      }

      mysqli_stmt_bind_param($stmt, "iiisssss", $user, $post_id, $Emp_ID, $coverletter, $name, $mobile, $email, $fileLoc);
      mysqli_stmt_execute($stmt);
      header("location: display_post.php?id=$post_id");
}
?>