<?php
require('db.php');
if (isset($_REQUEST['admin_username'])) {
    $admin_username = stripslashes($_REQUEST['admin_username']);
    $admin_username = mysqli_real_escape_string($con, $admin_username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $full_name = stripslashes($_REQUEST['full_name']);
    $full_name = mysqli_real_escape_string($con, $full_name);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);

    $query = "INSERT INTO admin (admin_username, password, email, full_name) VALUES ('$admin_username', '" . md5($password) . "', '$email', '$full_name')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
              <h3>You are registered successfully.</h3><br/>
              <p class='link'>Click here to <a href='admin_login.php'>Login</a></p>
              </div>";
    } else {
        echo "<div class='form'>
              <h3>Required fields are missing.</h3><br/>
              <p class='link'>Click here to <a href='admin_register.php'>registration</a> again.</p>
              </div>";
    }
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
    <div class="container-fluid my-3">
        <div class="card">
            <div class="text-center">
                <h3>New Admin Registration</h3>
                <div class="card_body">
                    <form class="form" action="" method="post">
                        <div class="input-group mb-3">
                            <label for="admin-username" class="form-label">Username</label>&nbsp;&nbsp;
                            <input type="text" class="login-input" name="admin_username" placeholder="Enter your username" required autocomplete="off"/>
                        </div>
                        <div class="input-group mb-3">
                            <label for="admin-email" class="form-label">Email</label>&nbsp;&nbsp;
                            <input type="email" class="login-input" name="email" placeholder="Email Address" required autocomplete="off"/>
                        </div>
                        <div class="input-group mb-3">
                            <label for="admin-fullname" class="form-label">Full Name</label>&nbsp;&nbsp;
                            <input type="text" class="login-input" name="full_name" placeholder="Full Name" required autocomplete="off"/>
                        </div>
                        <div class="input-group mb-3">
                            <label for="admin-password" class="form-label">Password</label>&nbsp;&nbsp;
                            <input type="password" class="login-input" name="password" placeholder="Password" required autocomplete="off"/>
                        </div>
                        <div class="input-group mb-3">
                            <input type="submit" name="submit" value="Register" class="login-button"/>
                        </div>
                    </form>
                </div>
                <div class="card_footer text-center">
                    <p class="link">Already have an account? <a href="admin_login.php">Click to Login</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
?>