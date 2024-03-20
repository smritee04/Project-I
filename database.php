<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "trek";

$con = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'name' is set in $_POST
    print_r($_POST);
    if (isset($_POST["name"])) {
        // Collect form data
        $name = $_POST["name"];
        $age = $_POST["age"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        $sql = "INSERT INTO userdata (name, age, email, phone ) VALUES ('$name', '$age', '$email', '$phone')";

        if (mysqli_query($con, $sql)) {
            echo "Data inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    } else {
        echo "Error: 'name' not set in the form";
    }
}

// Close the database connection
mysqli_close($con);
?>