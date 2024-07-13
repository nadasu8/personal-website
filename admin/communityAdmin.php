<?php
session_start();

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "personal_website";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $title = $_POST['mediaTitle'];
    $description = $_POST['mediaDescription'];
    $file = $_FILES['mediaFile'];
    $uploadDir = '';
    $mediaType = '';

    // Determine the upload directory and media type based on the file type
    $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)); // Ensure case insensitivity
    if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        $uploadDir = 'images/';
        $mediaType = 'photo';
    } elseif (in_array($fileType, ['mp4', 'mov', 'avi'])) {
        $uploadDir = 'videos/';
        $mediaType = 'video';
    } else {
        $_SESSION['error_message'] = "Unsupported file type: $fileType";
        header("Location: communityAdmin.php");
        exit();
    }

    // Set the file path
    $filePath = $uploadDir . basename($file['name']);

    // Move the uploaded file to the appropriate directory
    if (move_uploaded_file($file['tmp_name'], '../' . $filePath)) {
        // Database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to insert data into the database
        $sql = "INSERT INTO community_media (title, description, media_type, media_path) 
                VALUES ('$title', '$description', '$mediaType', '$filePath')";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            $_SESSION['success_message'] = "Media item added successfully!";
        } else {
            $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        $_SESSION['error_message'] = "File upload failed. Error code: " . $file['error'];
    }

    // Redirect to the same page to show the message
    header("Location: communityAdmin.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    
    <!--CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* Content container styling */
        .content-container {
            margin-top: 20px;
            background-color: #f8f9fa; /* Light background color for contrast */
            padding: 20px;
            border-radius: 10px;
        }

        /* Form section styling */
        .form-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .form-section h2 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            color: #333;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .btn {
            display: inline-block;
            background-color: #074b40;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2f4445;
        }

        /* Display section styling */
        .display-section {
            text-align: center;
            margin-top: 40px;
        }

        .display-section h2 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #333;
        }

        /* Media gallery styling */
        #mediaGallery {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        /* Media item styling */
        .media-item {
            width: 300px;
            height: 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            overflow: hidden;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .media-item img,
        .media-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .media-item h3 {
            margin: 10px 0 5px;
            font-size: 1.2em;
            color: #333;
            padding: 0 10px;
        }

        .media-item p {
            font-size: 1em;
            color: #666;
            margin: 0 10px 10px;
        }
    </style>
    
    <!--Favicon-->
    <!--<link rel="shortcut icon" href="images/personal.png" type="image/x-icon">-->
    
    <title>Research & Developments</title>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <nav id="header">
            <div class="nav-logo">
                <img src="../images/personal.png" alt="Profile Image" class="profile-img">
                <p class="nav-name">Dr.Basheer Alhaimi</p>
                <span></span>
            </div>
            <div class="nav-menu" id="myNavMenu">
                <ul class="nav_menu_list">
                    <li class="nav_list">
                        <a href="admin.php#home" class="nav-link">About</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="admin.php#about" class="nav-link">Recent</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="admin.php#projects" class="nav-link">Expertise</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="admin.php#contact" class="nav-link">Contact</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="teachingAdmin.php" class="nav-link">Teaching & Learning</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="communityAdmin.php" class="nav-link">Research & Developments</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="projectsAdmin.php" class="nav-link">Community Service</a>
                        <div class="circle"></div>
                    </li>
                </ul>
            </div>
            <div class="nav-menu-btn">
                <i class="uil uil-bars" onclick="myMenuFunction()"></i>
            </div>
        </nav>

        <main class="wrapper">
            <section class="section">
                <div class="top-header">
                    <h1>Research & Developments</h1>
                </div>
                <div class="content-container">
                    <?php if (isset($_SESSION['success_message'])): ?>
                        <script>
                            alert("<?php echo $_SESSION['success_message']; ?>");
                            window.location.href = "communityAdmin.php";
                        </script>
                        <?php unset($_SESSION['success_message']); ?>
                    <?php endif; ?>
        
                    <?php if (isset($_SESSION['error_message'])): ?>
                        <script>
                            alert("<?php echo $_SESSION['error_message']; ?>");
                            window.location.href = "communityAdmin.php";
                        </script>
                        <?php unset($_SESSION['error_message']); ?>
                    <?php endif; ?>
        
                    <div class="form-section">
                        <h2>Add New Photo/Video</h2>
                        <form id="mediaForm" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="mediaTitle">Title:</label>
                                <input type="text" id="mediaTitle" name="mediaTitle" required>
                            </div>
                            <div class="form-group">
                                <label for="mediaFile">Upload Photo/Video:</label>
                                <input type="file" id="media
                                <input type="file" id="mediaFile" name="mediaFile" required>
                    </div>
                    <div class="form-group">
                        <label for="mediaDescription">Description:</label>
                        <textarea id="mediaDescription" name="mediaDescription" required></textarea>
                    </div>
                    <button type="submit" class="btn">Add</button>
                </form>
            </div>
            <div class="display-section">
                <h2></h2>
                
                <div id="mediaGallery">
                    <!-- Media items will be displayed here -->
                    
                </div>
            </div>
        </div>
    </section>
</main>

        <!-- Footer -->
        <footer>
            <div class="top-footer">
                <p></p>
            </div>
            <!--
            <div class="middle-footer">
                <ul class="footer-menu">
                    <li class="footer_menu_list">
                        <a href="index.html#home">About</a>
                    </li>
                    <li class="footer_menu_list">
                        <a href="index.html#about">Recent</a>
                    </li>
                    <li class="footer_menu_list">
                        <a href="index.html#projects">Expertise</a>
                    </li>
                    <li class="footer_menu_list">
                        <a href="index.html#contact">Contact</a>
                    </li>
                    <li class="footer_menu_list">
                        <a href="teaching.html">Teaching & Learning</a>
                    </li>
                    <li class="footer_menu_list">
                        <a href="community.html">Research & Developments</a>
                    </li>
                    <li class="footer_menu_list">
                        <a href="projects.html">Community Service</a>
                    </li>
                </ul>
            </div> -->
            <div class="social_icons">
                <div class="icon"><a href="https://www.instagram.com/your_username"><i class="uil uil-instagram"></i></a></div>
                <div class="icon"><a href="https://www.linkedin.com/in/your_profile"><i class="uil uil-linkedin-alt"></i></a></div>
                <div class="icon"><a href="https://twitter.com/your_handle"><i class="uil uil-twitter"></i></a></div>
                <div class="icon"><a href="https://www.facebook.com/your_page"><i class="uil uil-facebook"></i></a></div>
            </div>
            <div class="bottom-footer">
                <p>Copyright &copy; <a href="../index.php" style="text-decoration: none;">Basheer</a></p>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js/main.js"></script>
</body>
</html>
