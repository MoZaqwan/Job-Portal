<?php
//session_start();
include "dbconfig2.php";


$user = $_SESSION["userID"];

$sql = "SELECT * FROM employer WHERE EmployerID =  $user";
$stmt = mysqli_stmt_init($con);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "Something wrong";
}

mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);
$account = mysqli_fetch_assoc($result);


// $user = $_SESSION['userID'];
// $sql = "SELECT * FROM jobseeker;";


// $stmt = mysqli_stmt_init($con);

// if (!mysqli_stmt_prepare($stmt, $sql)) {
//     header("location: employee_signup2.php?error=fetchfailed");
//     exit();
// }



?>

<form class="profile_img_data" type="file" method="POST" name="set_profile_img.php" action="setprofile_img.php" enctype="multipart/form-data">
    <label for="pic">Change Company Logo</label>
    <input type="file" name="profile_pic" />
    <br>
    <button type="submit" class="update_my_data" name="upload_prof">Upload Profile Picture</button>
</form>

<form action="profileupdate.php" method="post">
    <label for="username">Username</label>
    <input id="username" name="username" value=<?php echo $account['EmpUsername'] ?>></input>
    <label for="email">Email</label>
    <input id="email" name="email" value=<?php echo  $account["email"] ?> type="email"> </input>
    <label for="password"> Password</label>
    <input id="password" name="password" type="password" value ="<?php echo  $account["passCode"] ?>"></input>
    <br>
    <button type="submit" class="update_my_data" name="update">Update</button>
</form>