<?php
    $connection = new mysqli("localhost", "root", "", "mytest");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Corrected PASSWORD DEFAULT to PASSWORD_DEFAULT
        $sql = "INSERT INTO user (email, password) VALUES ('$email', '$password')"; // Fixed typo in $sql variable name

        if ($connection->query($sql) === TRUE) { // Fixed variable name and comparison operator
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
        
        $connection->close(); // Added semicolon to end the statement
    }
?>
