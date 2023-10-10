<?php
require('../functions/conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS link (you need to include Bootstrap CSS file) -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#users">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../functions/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2 id="users">User List</h2>
                <tr>
                    <td colspan="5"></td> <!-- Span the columns -->
                    <td>
                        <a class="btn btn-success my-2 btn-sm" href="../functions/create.php">Add Client</a>
                    </td>
                </tr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Action</th> <!-- Add a new column for action buttons -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT id, firstName, lastName, email, password FROM users";
                        $stmt = $con->prepare($sql);

                        if (!$stmt) {
                            die("Database error: " . $con->error);
                        }

                        if (!$stmt->execute()) {
                            die("Execution failed: " . $stmt->error);
                        }

                        $result = $stmt->get_result();

                        if (!$result) {
                            die("Result error: " . $stmt->error);
                        }

                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['firstName'] . "</td>
                                <td>" . $row['lastName'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['password'] . "</td>
                                <td>
                                    <a class='btn btn-primary btn-sm' href='../functions/update.php?id=" . $row['id'] . "'>Update</a>
                                    <a class='btn btn-danger btn-sm' href='../functions/delete.php?id=" . $row['id'] . "'>Delete</a>
                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Bootstrap JS scripts (you need to include Bootstrap JS files) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>