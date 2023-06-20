<?php
session_start();

include_once 'dbconfig2.php';
require_once 'functions.php';


// echo '<pre>';
// echo  var_dump($_GET);
// echo '</pre>';
/*access denied if user didn't logged*/

if (!isset($_SESSION['userID'])) {
      header("location: index:php");
}

$userID = $_SESSION['userID'];

if (isset($_POST)) {

      $title = $_POST['title'];
      $location = $_POST['location'];
      $working_type = $_POST['type'];
      $industry = $_POST['industry'];
      $description = $_POST['description'];
      $skills = $_POST['skills'];
      $application_closing_date = $_POST['closing_date'];
      $application_published_date = date('Y-m-d');


      if (isset($_POST['publish'])) {
            $company_RegNo = $_POST['company_reg'];

            createNewVacancy($con, $title, $location, $working_type, $industry, $description, $application_published_date, $application_closing_date, $skills, $userID, $company_RegNo);
      } elseif (isset($_POST['update'])) {

            $job_id = $_POST['job_id'];
            updateVacancy($con, $job_id, $title, $location, $working_type, $industry, $description, $skills, $application_closing_date);
      }
}

if ($_GET['do'] === 'delete') {
      $vacancy_id = $_GET['id'];
      deleteVacancy($con, $vacancy_id);
} else {
      header("location: dashboard.php");
      exit();
}

/*
if(isset()){
      
}*/