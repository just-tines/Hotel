<?php
require('../functions/conn.php');

if (isset($_POST['submit'])) {
    $userMail = $_POST['userMail'];
    $password = $_POST['password'];
    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '$userMail' OR firstName = '$userMail'");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['password']) {
            $userType = $row['userType']; // Get the user's role

            if ($userType == 'admin') {
                // Admin login, redirect to admin panel
                $_SESSION['login'] = true;
                $_SESSION['id'] = $row['id'];
                header('Location: admin.php');
                exit(); // Terminate the script to prevent further execution
            } else {
                // Regular user login, redirect to user dashboard
                $_SESSION['login'] = true;
                $_SESSION['id'] = $row['id'];
                header('Location: user.php');
                exit(); // Terminate the script to prevent further execution
            }
        } else {
            echo "<script>alert('Wrong password')</script>";
        }
    } else {
        echo "<script>alert('User not registered')</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../index.css" />
    <title>Login</title>
</head>

<body class="login">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="mb-4">Login</h2>
                <form method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Email</label>
                        <input type="text" class="form-control" id="userMail" name="userMail" placeholder="Enter your username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto text-center">
                        <button type="submit" name="submit" class="btn btn-outline-primary btn-lg">Login</button>
                    </div>
                </form>
                <p class="mt-2 text-center">
                    <a class="reg text-black" href="#">Forgot Password?</a> | <a class="reg text-black" href="register.php">Didn't have an account?</a>
                </p>
            </div>
        </div>
    </div>



</body>

</html>