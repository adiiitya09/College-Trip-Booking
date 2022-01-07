<?php
$insert= false;
if (isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);
    if (!$con) {
        die("Connection to the database failed due to" . mysqli_connect_error());
    }
    // echo " Successfully connected to the database";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phoneno = $_POST['phoneno'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip2` (`name`, `age`, `gender`, `phoneno`, `email`, `desc`, `datetime`) VALUES ('$name', '$age', '$gender', '$phoneno', '$email', '$desc', current_timestamp());";
    // echo $sql;
    if ($con->query($sql) == true) {
        $insert=true;
        // echo "Successfully inserted";
    } else {
        echo "ERROR : $sql <br> $con->error";
        //   $not_insert=true;
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MESCOE Trip</title>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <img class="bg" src="mescoe.jpg" alt="mescoe">
        <h1>MESCOE BE COMPUTER SECOND SHIFT GOA TRIP</h1>
        <p>Enter your details and submit the form to participate in the trip</p>
        <?php
        if ($insert==true){
        echo "<p class='submitmsg'>Thanks for submitting your response, we are happy to see you joining for the GOA trip </p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="phoneno" id="phoneno" placeholder="Enter your phone number">
            <input type="text" name="email" id="email" placeholder="Enter your email id">
            <textarea name="desc" id="desc" cols="25" rows="10" placeholder="Any other information"></textarea>
            <br>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->

        </form>
    </div>


    <script src="index.js"></script>


</body>

</html>