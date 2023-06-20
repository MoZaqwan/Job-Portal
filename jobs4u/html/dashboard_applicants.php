<?php

// session_start();

include_once 'dbconfig2.php';
require_once 'functions.php';

//check user type is the employer
if ($_SESSION['userType'] !== 'employer') {
      header("location: index.php");
      exit();
}

$userID = $_SESSION['userID'];


$sql = "SELECT * 
FROM applications A, vacancies V 
WHERE $userID = A.EmployerID
AND A.JobID = V.job_id";

$stmt = mysqli_stmt_init($con);


if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      // header("location: employee_signup2.php?error=fetchfailed");
}


mysqli_stmt_execute($stmt);

$results = mysqli_stmt_get_result($stmt);

$i = 1;
while ($row = mysqli_fetch_assoc($results)) {
      echo '<tr>
              <td>' . $row['AppID'] . '</td>
              <td>' . $row['Fullname'] . '</td>
              <td>' . $row['title'] . '</td>
              <td>' . $row['Email'] . '</td>
              <td>
                <a href="' . $row['CV'] . '"  class="btn btn-db-edit">Check</a>
              </td>
            </tr>';

      $i++;
}
