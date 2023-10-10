<?php
require('conn.php');

$firstName = '';
$lastName = '';
$email = '';
$password = '';

$errorMessage = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    do {
        if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
            $errorMessage = 'All the fields are required';
            break;
        }
        //** add neew client to database table */

        $sql = "INSERT INTO users (firstName,lastName,email,password)" . "VALUES ('$firstName', '$lastName', '$email', '$password')";
        $result = $con->query($sql);

        if (!$result) {
            $errorMessage = 'Invalid query ' . $con->error;
            break;
        }



        $firstName = '';
        $lastName = '';
        $email = '';
        $password = '';

        $successMessage = 'client add Successfully';

        $successMessage = 'Success';
        header("Location: admin.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container my-5">
        <h2 class="mb-5 text-center"> New User </h2>
        <?php
        if (!empty($errorMessage)) {
            echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>' . $errorMessage . '</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            ';
        }
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="firstName" value="<?php echo $firstName; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lastName" value="<?php echo $lastName; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="password" value="<?php echo $password; ?>">
                </div>
            </div>


            <?php
            if (!empty($successMessage)) {
                echo '
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>' . $successMessage . '</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            ';
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" onclick="location.href='../components/admin.php'" class="btn btn-primary">ADD</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-danger" href="../components/admin.php" role="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>



</body>

</html>