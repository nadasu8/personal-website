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
      <!---- <link rel="shortcut icon" href="images/personal.png" type="image/x-icon">-->
    
    <title>Personal Website</title>
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
                        <a href="#home" class="nav-link">About</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="#about" class="nav-link">Recent</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="#projects" class="nav-link">Expertise</a>
                        <div class="circle"></div>
                    </li>
                    <li class="nav_list">
                        <a href="#contact" class="nav-link">Contact</a>
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
            <div class="nav-button">
    <a href="./account/admin_dashboard.php" class="btn" style="text-decoration: none; color: black;">Login Admin <i class="uil uil-lock"></i></a>
</div>


            <div class="nav-button">
               <!--- <button class="btn" onclick="downloadCV()">Download CV <i class="uil uil-file-alt"></i></button> -->
            </div>
            <div class="nav-menu-btn">
                <i class="uil uil-bars" onclick="myMenuFunction()"></i>
            </div>
        </nav>

        <!-- Banner -->
        <div class="main-banner" id="main-banner">

            <div class="imgbanbtn imgbanbtn-prev" id="imgbanbtn-prev" style="left: 5px; background-image: url('images/arrowLeft.jpg');" ></div>

            <div class="imgban" id="imgban3" style="background-image: url(images/m3.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">
                
                <div class="imgban-box">
                    <h2>Image 1 </h2>
                    <p>Write something here</p>
                </div>
                
            </div>
            <div class="imgban" id="imgban2" style="background-image: url(images/m2.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">
                
                <div class="imgban-box">
                    <h2>Image 2 </h2>
                    <p>Write something here</p>
                </div>

            </div>
            <div class="imgban" id="imgban1" style="background-image: url(images/m1.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">
                
                <div class="imgban-box">
                    <h2>Image 3 </h2>
                    <p>Write something here</p>
                </div>

            </div>
            <div class="imgbanbtn imgbanbtn-next" id="imgbanbtn-next" style="right: 5px; background-image: url('images/arrowRight.jpg'); "></div>
        </div>
        <script>
            var bannerStatus = 1;
            var bannerTimer = 4000;
        
            window.onload = function(){
                bannerLoop();
            }
        
            var startBannerLoop = setInterval(function(){
                bannerLoop();
            }, bannerTimer );

            document.getElementById("main-banner").onmouseenter = function(){
                clearInterval(startBannerLoop);
            }

            document.getElementById("main-banner").onmouseleave = function(){
                startBannerLoop = setInterval(function(){
                    bannerLoop();
                }, bannerTimer );
            }

            document.getElementById("imgbanbtn-prev").onclick = function() {
                if(bannerStatus === 1 ){
                    bannerStatus = 2;
                } 
                else if(bannerStatus === 2 ){
                    bannerStatus = 3;
                }
                else if (bannerStatus === 3 ){
                    bannerStatus = 1;
                }
                bannerLoop();

            }
            document.getElementById("imgbanbtn-next").onclick = function() {
                bannerLoop();
            }


        
            function bannerLoop(){
                if(bannerStatus === 1 ){
                    document.getElementById("imgban2").style.opacity = "0";
                    setTimeout(function(){
                        document.getElementById("imgban1").style.left = "0px"; // Change 'right' to 'left'
                        document.getElementById("imgban1").style.zIndex = "1000";
                        document.getElementById("imgban2").style.left = "1200px"; // Change 'right' to 'left'
                        document.getElementById("imgban2").style.zIndex = "1500";
                        document.getElementById("imgban3").style.left = "1200px"; // Change 'right' to 'left'
                        document.getElementById("imgban3").style.zIndex = "500";
                    }, 500);
                    setTimeout(function(){
                        document.getElementById("imgban2").style.opacity = "1";
                    }, 1000);
                    bannerStatus = 2;
                }
                else if(bannerStatus === 2 ){
                    document.getElementById("imgban3").style.opacity = "0";
                    setTimeout(function(){
                        document.getElementById("imgban2").style.left = "0px"; // Change 'right' to 'left'
                        document.getElementById("imgban2").style.zIndex = "1000";
                        document.getElementById("imgban3").style.left = "1200px"; // Change 'right' to 'left'
                        document.getElementById("imgban3").style.zIndex = "1500";
                        document.getElementById("imgban1").style.left = "1200px"; // Change 'right' to 'left'
                        document.getElementById("imgban1").style.zIndex = "500";
                    }, 500);
                    setTimeout(function(){
                        document.getElementById("imgban3").style.opacity = "1";
                    }, 1000);
                    bannerStatus = 3;
                }
                else if(bannerStatus === 3 ){
                    document.getElementById("imgban1").style.opacity = "0";
                    setTimeout(function(){
                        document.getElementById("imgban3").style.left = "0px"; // Change 'right' to 'left'
                        document.getElementById("imgban3").style.zIndex = "1000";
                        document.getElementById("imgban1").style.left = "1200px"; // Change 'right' to 'left'
                        document.getElementById("imgban1").style.zIndex = "1500";
                        document.getElementById("imgban2").style.left = "1200px"; // Change 'right' to 'left'
                        document.getElementById("imgban2").style.zIndex = "500";
                    }, 500);
                    setTimeout(function(){
                        document.getElementById("imgban1").style.opacity = "1";
                    }, 1000);
                    bannerStatus = 1;
                }
            }
        </script>

        <!-- Main -->
        <main class="wrapper">

            <!-- Main Featured box -->
            <section class="featured-box" id="home">
                <div class="featured-text">
                    <div class="featured-text-card">
                        <span>About Me</span>
                    </div>
                    <div class="featured-name">
                        <p>Dr.Basheer Alhaimi</p>
                    </div>
                    <div class="featured-text-info" id="content">
                    <?php
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "personal_website";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch content from the 'descrip' table
    $sql = "SELECT section, content FROM descrip";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div>";
           // echo "<h2>" . htmlspecialchars($row["section"]) . "</h2>";
            echo "<p>" . htmlspecialchars($row["content"]) . "</p>";
            echo "</div>";
        }
    } else {
        echo "No content found.";
    }

    $conn->close();

    
    ?>

</div>

<?php
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'personal_website';

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        $sql = 'SELECT file_path FROM files WHERE section = "CV" ORDER BY id DESC LIMIT 1';
        $result = $conn->query($sql);
        $cvFilePath = '#'; // Default to a placeholder value if no file is found

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Assuming the file_path stored in the database is relative to the project directory
            $cvFilePath = 'uploads/' . $row['file_path'];
        }

        $conn->close();
    ?>

<div class="featured-text-btn">
    <a class="btn" href="<?php echo $cvFilePath; ?>" download style="text-decoration: none; color: black;">Download CV</a>
</div>


                </div>
                <div class="featured-image">
                    <div class="image">
                        <img src="images/personal.png" alt="avatar">
                    </div>
                </div>
                <div class="scroll-icon-box">
                    <a href="#about" class="scroll-btn">
                        <i class="uil uil-mouse-alt"></i>
                        <p>Scroll Down</p>
                    </a>
                </div>
            </section>

            <!-- About -->
            <section class="section" id="about">
                <div class="top-header">
                    <h1>Recent Developments</h1>
                </div>
                <div class="about-container">
                    <div class="about-info">
                        <h3>Professional Background</h3>
                        <p>I am well-versed in.. </p>
                        <div class="about-btn">
                            <button class="btn" onclick="downloadFile()">Download <i class="uil uil-import"></i></button>
                        </div>
                    </div>
                    <div class="about-info">
                        <h3>My Skills</h3>
                        <p>I have experience in..</p>

                        <!--<div class="about-btn">
                            <button class="btn" onclick="viewMore()">View Portfolio <i class="uil uil-import"></i></button>
                        </div>-->

                    </div>
                    <div class="about-info">
                        <h3>My Achievements</h3>
                        <p>I have received several awards and recognition for my work in the field of ..</p>

                        <!--<div class="about-btn">
                            <button class="btn" onclick="readMore()">Read More <i class="uil uil-import"></i></button>
                        </div> -->

                    </div>
                </div>
            </section>

            <!-- Project -->
            <section class="section" id="projects">
                <div class="top-header">
                    <h1>Expertise</h1>
                </div>
                <div class="project-container">
                    <div class="project-box">
                        <i class="uil uil-briefcase-alt"></i>
                        <h3>Education</h3>
                        <label>Master in ..</label>
                    </div>
                    <div class="project-box">
                        <i class="uil uil-users-alt"></i>
                        <h3>Works</h3>
                        <label>Worked with..</label>
                    </div>
                    <div class="project-box">
                        <i class="uil uil-award"></i>
                        <h3>Experience</h3>
                        <label>2 years in ..</label>
                    </div>
                </div>
            </section>

            <!-- Contact Box -->
            <section class="section" id="contact">
                <div class="top-header">
                    <h1>Get in touch</h1>
                    <span>Do you have any inquiry, contact me here</span>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="contact-info">
                            <h2>Find Me <i class="uil uil-corner-right-down"></i></h2>
                            <p><i class="uil uil-envelope"></i> Email: basheer@gmail.com</p>
                            <p><i class="uil uil-phone"></i> Tel: +60 183 165 301</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-control" id="form-control">
                            <div class="form-inputs">
                                <input type="text" id="name" class="input-field" placeholder="Name">
                                <input type="text" id="email" class="input-field" placeholder="Email">
                            </div>
                            <div class="text-area">
                                <textarea id="message" placeholder="Message"></textarea>
                            </div>
                            <div class="form-button">
                                <button class="btn" id="sendBtn">Send <i class="uil uil-message"></i></button>
                            </div>
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
            <div class="middle-footer">
                <ul class="footer-menu">
                    <li class="footer_menu_list">
                        <a href="#home">About</a>
                    </li>
                    <li class="footer_menu_list">
                        <a href="#about">Recent</a>
                    </li>
                    <li class="footer_menu_list">
                        <a href="#projects">Expertise</a>
                    </li>
                    <li class="footer_menu_list">
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="social_icons">
                <div class="icon"><a href="https://www.instagram.com/your_username"><i class="uil uil-instagram"></i></a></div>
                <div class="icon"><a href="https://www.linkedin.com/in/your_profile"><i class="uil uil-linkedin-alt"></i></a></div>
                <div class="icon"><a href="https://twitter.com/your_handle"><i class="uil uil-twitter"></i></a></div>
                <div class="icon"><a href="https://www.facebook.com/your_page"><i class="uil uil-facebook"></i></a></div>
            </div>
            <div class="bottom-footer">
                <p>Copyright &copy; <a href="#home" style="text-decoration: none;">Nada</a></p>
            </div>
        </footer>

    </div>

    <!-- Typing JavaScript Link -->
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

    <!-- Scroll Reveal Js Link -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- Main Js -->
    <script>

function myMenuFunction() {
            var x = document.getElementById("myNavMenu");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }

        //function downloadFile() {
           // window.location.href = 'path_to_your_cv_file.pdf'; // Replace with the path to your CV file
        //}
        // Function to handle view more
        function viewMore() {
            // Add your logic to navigate to the section where more information is available
            // For example, you can use smooth scrolling to navigate to the desired section
            console.log('View more...');
        }

        // Function to handle reading more
        function readMore() {
            // Add your logic to navigate to the section where more information is available
            // For example, you can use smooth scrolling to navigate to the desired section
            console.log('Reading more...');
        }

        // Function to handle view more
        function viewMore() {
            // Add your logic to navigate to the section where more information is available
            // For example, you can use smooth scrolling to navigate to the desired section
            console.log('View more...');
        }

        // Function to handle reading more
        function readMore() {
            // Add your logic to navigate to the section where more information is available
            // For example, you can use smooth scrolling to navigate to the desired section
            console.log('Reading more...');
        }

        // Function to handle sending a message
        // Function to handle sending a message
    function sendMessage() {
        // Get form values
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var message = document.getElementById("message").value;

        // Client-side validation
        if (!name || !email || !message) {
            alert("Please fill in all fields.");
            return;
        }

        // Send the message (you would typically use AJAX to send data to a server-side script)
        // This is just a basic example
        // Replace 'your-server-script.php' with the path to your server-side script
        var formData = new FormData();
        formData.append("name", name);
        formData.append("email", email);
        formData.append("message", message);

        fetch("server.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            alert("Message sent successfully!");
            document.getElementById("name").value = ""; // Clear the input fields
            document.getElementById("email").value = "";
            document.getElementById("message").value = "";
        })
        .catch(error => {
            console.error("There was a problem with your fetch operation:", error);
            alert("An error occurred. Please try again later.");
        });
    }

    // Add event listener to the send button
    document.getElementById("sendBtn").addEventListener("click", sendMessage);
    </script>

</body>
</html>
