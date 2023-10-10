<?php
require('../functions/conn.php');

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $duplicate = mysqli_query($con, "SELECT * FROM users WHERE firstName = '$firstName' OR email = '$email'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Email has already been used'); </script>";
    } else {
        if ($password == $confirmPassword) {
            $query = "INSERT INTO users (firstName, lastName, email, password, confirmPassword) VALUES (?, ?, ?, ?, ?)";
            $result = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($result, "sssss", $firstName, $lastName, $email, $password, $confirmPassword);

            if (mysqli_stmt_execute($result)) {
                echo "<script>
                        alert('Registration Success!');
                        window.location.href = '../index.php'; // Redirect to index.php
                      </script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($con) . "')</script>";
            }
        } else {
            echo "<script>alert('Password does not match!')</script>";
        }
    }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="index.css">
    <title>Document</title>

</head>

<body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="mb-4">Registration</h2>
                    <form action="register.php" method="post">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter your first name" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter your last name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Enter your password" required>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto text-center">
                            <button type="submit" name="submit" class="btn btn-outline-primary btn-lg">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>