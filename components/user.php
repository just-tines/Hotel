<?php
// Include your database connection code here
require('../functions/conn.php');

// Fetch user data from the database
$userID = $_SESSION['id']; // Assuming you store user ID in the session
$query = "SELECT firstName, lastName, email FROM users WHERE id = ?";
$stmt = $con->prepare($query);

if (!$stmt) {
    die("Database error: " . $con->error);
}

$stmt->bind_param("i", $userID);

if (!$stmt->execute()) {
    die("Execution failed: " . $stmt->error);
}

$result = $stmt->get_result();

if (!$result) {
    die("Result error: " . $stmt->error);
}

$row = $result->fetch_assoc();

// Display user data in the HTML
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">User Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../functions/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- User Dashboard Content -->
    <div class="container mt-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome, <?php echo $row['firstName'] . ' ' . $row['lastName']; ?>!</h1>
            <p class="lead">This is your user dashboard.</p>
        </div>

        <div class="card">
            <div class="card-header">
                User Information
            </div>
            <div class="card-body">
                <h5 class="card-title">Name: <?php echo $row['firstName'] . ' ' . $row['lastName']; ?></h5>
                <p class="card-text">Email: <?php echo $row['email']; ?></p>
            </div>
        </div>
    </div>

    <?php
    require('footer.php')
    ?>

    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>