<?php
//include('../includes/header.html');  // Adjust the path based on your folder structure
require('db.php');
session_start();

// When form submitted, check and create user session.
if (isset($_POST['admin_username'])) {
    $admin_username = stripslashes($_REQUEST['admin_username']);    // removes backslashes
    $admin_username = mysqli_real_escape_string($con, $admin_username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    // Check admin is exist in the database
    $query    = "SELECT * FROM `admin` WHERE admin_username='$admin_username'
                 AND password='" . md5($password) . "'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $_SESSION['admin_username'] = $admin_username;
        // Redirect to admin dashboard page
        header("Location: admin_dashboard.php");
    } else {
        echo "<div class='form'>
              <h3>Incorrect Username/password.</h3><br/>
              <p class='link'>Click here to <a href='admin_login.php'>Login</a> again.</p>
              </div>";
    }
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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

        .container-fluid {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: rgb(45, 122, 127); /* Set the background color for the container */
        }

        #header {
            background-color: transparent; /* Set the header background color to transparent */
            font-size: 1rem; /* Adjust the font size of the header */
            color: var(--color-white); /* Set the font color of the header */
            text-align: center;
            padding: 20px 0; /* Add padding to the header */
        }

        .container-fluid {
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

        h3 {
            color: var(--text-color-secound);
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: var(--text-color-third);
            text-align: left;
            font-size: 1.25rem; /* Increase the font size */
        }

        .login-input, .login-inputs {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .login-button {
            width: 100%;
            padding: 10px;
            background-color: var(--first-color);
            border: none;
            border-radius: 5px;
            color: var(--color-white);
            font-weight: bold;
            font-size: 1.25rem; /* Increase the font size */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: var(--first-color-hover);
        }

        .link a {
            color: var(--first-color);
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }

        .card_footer {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Empty Header -->
    <nav id="header"></nav>
    
    <div class="container-fluid my-3">
        <div class="card">
            <div class="text-center">
                <h3>Login to your Account as Admin</h3>
                <div class="card_body">
                    <form class="form" method="post" name="login">
                        <div class="input-group mb-3">
                            <label for="admin-username" class="form-label">Username</label>&nbsp;
                            <input type="text" class="login-inputs" name="admin_username" placeholder="Username" autofocus="true" />
                        </div>
                        <div class="input-group mb-3">
                            <label for="admin-password" class="form-label">Password</label>&nbsp;
                            <input type="password" class="login-inputs" name="password" placeholder="Password" required autocomplete="off"/>
                        </div>
                        <div class="input-group mb-3">
                            <input type="submit" value="Login" name="submit" class="login-button"/>
                        </div>
                    </form>
                </div>
                <div class="card_footer text-center">
                    <p class="link">Do not have an account? <a href="admin_register.php">New Registration</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
}
?>
