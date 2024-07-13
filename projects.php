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
        header("Location: projectsAdmin.php");
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
        $sql = "INSERT INTO project_media (title, description, media_type, media_path) 
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
    header("Location: projectsAdmin.php");
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
    <link rel="stylesheet" href="css/style.css">
    
    <!--Favicon-->
    <!--<link rel="shortcut icon" href="images/personal.png" type="image/x-icon">-->
    
    <title>Community Service</title>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <nav id="header">
            <div class="nav-logo">
                <img src="images/personal.png" alt="Profile Image" class="profile-img">
                <p class="nav-name">Dr.Basheer Alhaimi</p>
                <span></span>
            </div>
            <div class="nav-menu" id="myNavMenu">
                <ul class="nav_menu_list">
                    <li class="nav_list">
                        <a href="index.php#home" class="nav-link">About</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="index.php#about" class="nav-link">Recent</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="index.php#projects" class="nav-link">Expertise</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="index.php#contact" class="nav-link">Contact</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="teaching.php" class="nav-link">Teaching & Learning</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="community.php" class="nav-link">Research & Developments</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="projects.php" class="nav-link">Community Service</a>
                        <div class="circle"></div>
                    </li>
                </ul>
            </div>
            <div class="nav-menu-btn">
                <i class="uil uil-bars" onclick="myMenuFunction()"></i>
            </div>
        </nav>

        <!-- Main -->
        <main class="wrapper">
            <section class="section">
                <div class="top-header">
                    <h1>Community Service</h1>
                </div>
                <div class="content-container">
                    <?php if (isset($_SESSION['success_message'])): ?>
                        <script>
                            alert("<?php echo $_SESSION['success_message']; ?>");
                            window.location.href = "projectsAdmin.php";
                        </script>
                        <?php unset($_SESSION['success_message']); ?>
                    <?php endif; ?>
        
                    <?php if (isset($_SESSION['error_message'])): ?>
                        <script>
                            alert("<?php echo $_SESSION['error_message']; ?>");
                            window.location.href = "projectsAdmin.php";
                        </script>
                        <?php unset($_SESSION['error_message']); ?>
                    <?php endif; ?>
        
                    <div class="display-section">
                        <h2></h2>
                        <div id="mediaGallery">
                            <?php
                            $conn = new mysqli($servername, $username, $password, $dbname);
        
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
        
                            $sql = "SELECT * FROM project_media";
                            $result = $conn->query($sql);
        
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="media-item">';
                                    if ($row['media_type'] === 'photo') {
                                        $imagePath = $row['media_path'];
                                        echo '<img src="' . htmlspecialchars($imagePath) . '" alt="' . htmlspecialchars($row['title']) . '">';
                                    } elseif ($row['media_type'] === 'video') {
                                        $videoPath = $row['media_path'];
                                        echo '<video controls><source src="' . htmlspecialchars($videoPath) . '" type="video/mp4">Your browser does not support the video tag.</video>';
                                    }
                                    echo '<div><h3>' . htmlspecialchars($row['title']) . '</h3><p>' . htmlspecialchars($row['description']) . '</p></div></div>';
                                }
                            } else {
                                echo '<p>No media items available.</p>';
                            }
        
                            $conn->close();
                            ?>
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
            </div>-->
            <div class="social_icons">
                <div class="icon"><a href="https://www.instagram.com/your_username"><i class="uil uil-instagram"></i></a></div>
                <div class="icon"><a href="https://www.linkedin.com/in/your_profile"><i class="uil uil-linkedin-alt"></i></a></div>
                <div class="icon"><a href="https://twitter.com/your_handle"><i class="uil uil-twitter"></i></a></div>
                <div class="icon"><a href="https://www.facebook.com/your_page"><i class="uil uil-facebook"></i></a></div>
            </div>
            <div class="bottom-footer">
                <p>Copyright &copy; <a href="index.php" style="text-decoration: none;"></a></p>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js/main.js"></script>
</body>
</html>