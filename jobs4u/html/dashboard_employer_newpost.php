<?php

include 'dbconfig2.php';

$userID = $_SESSION['userID'];
// $userType = $_SERVER['userType'];

$sql = "SELECT RegNo FROM employer WHERE  EmployerID = $userID";
$stmt = mysqli_stmt_init($con);

if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: employee_signup2.php?error=fetchfailed");
}

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$companyRegistration = mysqli_fetch_assoc(($result));
$RegNo = $companyRegistration['RegNo'];


?>

<p class="vacancy-form-heading">Vacancy Publish Form</p>

<form class="vacany-publish-form" action="vacancy_manage_config.php" method="post">

      <input hidden name="company_reg" value=<?php echo $RegNo ?> />

      <div>
            <label for="title">Vacancy Title</label>
            <input name="title" class="vacancy-title-input" id="title" type="text" required>
      </div>

      <div class="basic-vacancy-details">

            <div>
                  <label for="type">Working Type</label>
                  <select name="type" id="type" required>
                        <option disabled selected>Select</option>
                        <option value="Fulltime">Full Time</option>
                        <option value="Parttime">Part Time</option>
                        <option value="Work From Home">Work From Home</option>
                        <option value="Contract">Contract</option>
                        <option value="Internship">Internship</option>
                  </select>
            </div>


            <div>
                  <label for="location">Location</label>
                  <select name="location" id="type" required>
                        <option disabled selected>Select</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Batticola">Batticola</option>
                        <option value="Galle">Galle</option>
                        <option value="Gampha">Gampha</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kaluthara">Kaluthara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Kurunagala">Kurunagala</option>
                        <option value="Matara">Matara</option>
                        <option value="Other">Other</option>
                  </select>
            </div>


            <div>
                  <label for="category">Industry Category</label>
                  <select name="industry" id="category" required>
                        <option disabled selected>Select</option>
                        <option value="Accounting">Accounting & Finance</option>
                        <option value="Banking">Banking</option>
                        <option value="Customer Service">Customer Service</option>
                        <option value="Education">Educational</option>
                        <option value="Hospitality">Hospitality</option>
                        <option value="IT & Software">IT</option>
                        <option value="Transportation">Transportation</option>
                        <option value="Tourism">Tourism</option>
                        <option value="Medical">Medical Service</option>
                        <option value="Other">Other</option>
                  </select>
            </div>

            <div>
                  <label for="closing-date">Application Closing Date</label>
                  <input name="closing_date" type="date" />
            </div>

      </div>
      <div>
            <label for="skills">Skills (Place Commas between skills)</label>
            <input name="skills" class="vacancy-title-input" id="title" type="text" required>
      </div>
      <div>
            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>
      </div>

      <div class="confirmation">
            <input class="btn submit" name="publish" type="submit">
            <div class="i-confirm">
                  <input id="confirm" type="checkbox" required>
                  <span>I agree to Jobs4U terms and conditions.</span>
            </div>
      </div>

</form>