<?php
include("admin_session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="path_to_bootstrap.css">
    <style>
        /* Include the CSS code here */
        :root{
            --body-color: rgb(250, 250, 250);
            --color-white: rgb(255, 255, 255);

            --text-color-secound: rgb(68, 68, 68);
            --text-color-third: rgb(72, 101, 103);

            --first-color: rgb(45, 122, 127);
            --first-color-hover: rgb(124, 163, 165);

            --secound-color: rgb(96, 146, 151);
            --third-color: rgb(192, 166, 49);
            --first-shadow-color: rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: rgb(45, 122, 127);
            font-family: 'Poppins', sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px var(--first-shadow-color);
            background-color: var(--color-white);
        }

        .text-center {
            text-align: center;
        }

        p {
            color: var(--text-color-secound);
            margin-bottom: 10px; /* Add margin to create a gap */
        }

        h3 {
            color: var(--text-color-secound);
            margin-bottom: 20px;
        }

        .link a {
            color: var(--first-color);
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="text-center">
                <h3>Hi, <?php echo $_SESSION['admin_username']; ?>!</h3>
                <p>Welcome back. Click <a href="../admin/admin.php">Start</a> to manage all details.</p>
                <p>Or click <a href="admin_logout.php">Logout</a> to log out of your admin account.</p>
            </div>
        </div>
    </div>
</body>
</html>