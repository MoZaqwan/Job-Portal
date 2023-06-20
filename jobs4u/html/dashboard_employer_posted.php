<?php

// session_start();

include_once 'dbconfig2.php';
require_once 'functions.php';


// $vacancies = $statement->fetchAll(PDO::FETCH_ASSOC); #return all the vacancy data as a association array

if ($_SESSION['userType'] !== 'employer') {
      header("location: index.php");
      exit();
}

$userID = $_SESSION['userID'];

$sql = "SELECT * FROM vacancies WHERE Emp_ID = $userID ORDER BY published_date  DESC;";
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
              <td>' . $i . '</td>
              <td>' . $row['title'] . '</td>
              <td>' . $row['published_date'] . '</td>
              <td>' . $row['closing_date'] . '</td>
              <td>
                <a href="vacancy_update.php?id=' . $row['job_id'] . '&do=edit" target=”_blank” class="btn btn-db-edit">Edit</a>
              </td>
              <td>
                <a href="vacancy_manage_config.php?id=' . $row['job_id'] . '&do=delete" class="btn btn-db-delete">Delete</a>
              </td>
            </tr>';

      $i++;
} 


      
      /*
      foreach ($vacancies as $vacancy) {

        <tr>
           <td>1</td>
           <td>.$vacancy['title'].</td>
           <td>.$vacancy['published_date'].</td>
           <td>.$vacancy['closing_date'].</td>
           <td>
                 <a href="vacancy_update.php?id=<?php echo $vacancy['job_id'] ?>" target=”_blank” class="btn btn-db-edit">Edit</a>
           </td>
           <td>
                <a href="vacany_delete.php?id=<?php echo $vacancy['job_id'] ?>" class="btn btn-db-delete">Delete</a>
           </td>
         </tr>

      }
                     
      </tbody>
</table>'*/