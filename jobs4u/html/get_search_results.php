<?php

echo '<pre>';
var_dump($_GET);
echo '</pre>';

include 'dbconfig2.php';


if (isset($_GET['submit'])) {

      $query = "SELECT * FROM vacancies";

      if (isset($_GET['search']))
            $search = $_GET['search'];
      if (isset($_GET['location']))
            $location  = $_GET['location'];
      if (isset($_GET['industry']))
            $industry = $_GET['industry'];
      if (isset($_GET['fulltime']))
            $fulltime = $_GET['fulltime'];
      if (isset($_GET['parttime']))
            $parttime = $_GET['parttime'];
      if (isset($_GET['contract']))
            $contract = $_GET['contract'];
      if (isset($_GET['intern']))
            $intern = $_GET['intern'];

      $today = date('Y-m-d');
      $date = date_create($today);

      if (isset($_GET['24'])) {
            $day = $_GET['24'];
            $day = date_add($date, date_interval_create_from_date_string('1 days'));
            $day =  date_format($day, 'Y-m-d');
      }
      if (isset($_GET['3'])) {
            $daybynext = $_GET['3'];
            $daybynext = date_add($date, date_interval_create_from_date_string('3 days'));
            $daybynext =  date_format($daybynext, 'Y-m-d');
      }
      if (isset($_GET['7'])) {
            $week = $_GET['7'];
            $week = date_add($date, date_interval_create_from_date_string('7 days'));
            $week =  date_format($week, 'Y-m-d');
      }
      if (isset($_GET['30'])) {
            $month = $_GET['30'];
            $month = date_add($date, date_interval_create_from_date_string('30 days'));
            $month =  date_format($month, 'Y-m-d');
      }
      $today = date('Y-m-d');

      // $date = date_create($today);
      // $newDate = date_add($date, date_interval_create_from_date_string('1 days'));
      // $newDate =  date_format($newDate, 'Y-m-d');
      // echo $newDate;
      // echo $day;
      // exit();


      $conditions = array();
      if (!empty($search)) {
            $conditions[] = "title LIKE '%$search%' ";
      }
      if (!empty($location)) {
            $conditions[] = "location='$location'";
      }
      if (!empty($industry)) {
            $conditions[] = "Industry='$industry'";
      }
      if (!empty($fulltime)) {
            $conditions[] = "type='$fulltime'";
      }
      if (!empty($parttime)) {
            $conditions[] = "type='$parttime'";
      }
      if (!empty($contract)) {
            $conditions[] = "type='$contract'";
      }
      if (!empty($intern)) {
            $conditions[] = "type='$intern'";
      }
      if (!empty($day)) {
            $conditions[] = "closing_date='$day'";
      }
      if (!empty($daybynext)) {
            $conditions[] = "closing_date='$daybynext'";
      }
      if (!empty($week)) {
            $conditions[] = "closing_date='$week'";
      }
      if (!empty($month)) {
            $conditions[] = "closing_date='$month'";
      }



      $sql = $query;
      if (count($conditions) > 0) {
            $sql .= " WHERE " . implode(' OR ', $conditions);
      }

      $stmt = mysqli_stmt_init($con);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
            (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            // header("location: employee_signup2.php?error=fetchfailed");
      }

      mysqli_stmt_execute($stmt);
      $result =  mysqli_stmt_get_result($stmt);

      $postData = mysqli_fetch_assoc(($result));
      mysqli_stmt_close($stmt);
      echo '<pre>';
      var_dump($postData);
      echo '<pre/>';
}
