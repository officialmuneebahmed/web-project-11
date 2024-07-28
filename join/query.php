<?php
//Variables initializing
$url = "./index.html";
$text = "Back to Home";

//Connecting
$con = mysqli_connect("localhost", "root", "", "monodb");

//Checking Connection
if(!$con){
    die("Connection Failed ! ". mysqli_connect_error());
}
else{
    echo "Sccessfully Connected to Server !";
}
// getting all values from the HTML form    {
    $company = $_POST['company'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    

$sql = "INSERT INTO `monodatabase` (`company` , `name`, `email`, `password`, `password2`) VALUES ('$company', '$name', '$email', '$password', '$password2') ";



// Prepare and bind parameter (prevent SQL INJECTIONS)
$stmt = $con->prepare($sql);


// ................................................................


// Execute the statement
if ($stmt->execute()) {
    echo "<br>";
    echo "New record inserted successfully";
    echo "<br> <a href='$url'>$text</a>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

//Close Connection
mysqli_close($con);
$stmt->close();
?>