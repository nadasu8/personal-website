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
$sql = "SELECT id, section, content FROM descrip";
$result = $conn->query($sql);


session_start();

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
    
    <!--Favicon-->
      <!---- <link rel="shortcut icon" href="images/personal.png" type="image/x-icon">-->
    
    <title>Personal Website - Admin Panel</title>
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
            <div class="nav-button">
    <a href="../account/admin_logout.php" class="btn" style="text-decoration: none; color: black;">Logout Admin <i class="uil uil-lock"></i></a>
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

            <div class="imgbanbtn imgbanbtn-prev" id="imgbanbtn-prev" style="left: 5px; background-image: url('../images/arrowLeft.jpg');" ></div>

            <div class="imgban" id="imgban3" style="background-image: url(../images/m3.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">
                
                <div class="imgban-box">
                    <h2>Image 1 </h2>
                    <p>Write something here</p>
                </div>
                <!-- Edit and Save buttons -->
                <!--<div class="edit-buttons">
                    <button class="btn" onclick="editBannerContent(1)">Edit</button>
                    <button class="btn" onclick="saveBannerContent(1)">Save</button>
                </div>-->
                
            </div>
            <div class="imgban" id="imgban2" style="background-image: url(../images/m2.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">
                
                <div class="imgban-box">
                    <h2>Image 2 </h2>
                    <p>Write something here</p>
                </div>
                <!-- Edit and Save buttons -->
                <!--<div class="edit-buttons">
                    <button class="btn" onclick="editBannerContent(2)">Edit</button>
                    <button class="btn" onclick="saveBannerContent(2)">Save</button>
                </div>-->

            </div>
            <div class="imgban" id="imgban1" style="background-image: url(../images/m1.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">
                
                <div class="imgban-box">
                    <h2>Image 3 </h2>
                    <p>Write something here</p>
                </div>
                <!-- Edit and Save buttons -->
                <!--<div class="edit-buttons">
                    <button class="btn" onclick="editBannerContent(3)">Edit</button>
                    <button class="btn" onclick="saveBannerContent(3)">Save</button>
                </div>-->

            </div>
            <div class="imgbanbtn imgbanbtn-next" id="imgbanbtn-next" style="right: 5px; background-image: url('../images/arrowRight.jpg'); "></div>
        </div>
        
        <!-- Edit and Save buttons for banner image -->
        <!--<div class="edit-buttons">
            <button class="btn" onclick="deleteBannerImage()">Delete Banner Image</button>
            <button class="btn" onclick="uploadNewBanner()">Upload New Banner</button>
        </div>-->
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
                    <!--
                    <div class="featured-text-info">
                        <p>Explain more ..</p>
                    </div>-->
                    

                    <!-- Comment This Part-->
                    
                    <!-- Edit and Save buttons -->
                    <!--
                    <div class="edit-buttons">
                        <button class="btn" onclick="editAboutContent()">Edit</button>
                        <button class="btn" onclick="saveAboutContent()">Save</button>
                    </div> 
                     comment here -- File upload and download button 
                    <div class="featured-text-btn">
                        <input type="file" id="cvUpload" style="display: none;" onchange="uploadFile(event)">
                        <button class="btn" onclick="document.getElementById('cvUpload').click()">Upload New CV</button>
                        <button class="btn" id="downloadCvBtn" style="display: none;" onclick="downloadFile()">Download CV</button>
                    </div>
                    <body>
                        <form action="admin_update.php" method="post" enctype="multipart/form-data">
                             comment here -- About Description 
                        <div>
                            <label class="form-heading" for="new_about_description">About Description:</label>
                            <textarea style="margin: 10px;" name="new_about_description" rows="5" required>
                                <?php echo $current_about_description; ?></textarea>
                        </div>
                        comment here -- CV File Upload 
                        <div>
                            <label for="file">Upload CV:</label>
                            <input type="file" id="file" name="file" accept=".pdf">
                            <?php if (!empty($current_file_path)) : ?>
                                <p>Current CV: <a href="../files/<?php echo $current_file_path; ?>" target="_blank">View</a></p>
                            <?php endif; ?>
                        </div>
                            <div>
                                <label for="section">Section:</label>
                                <input type="text" id="section" name="section">
                            </div>
                            <div>
                                <label for="content">Content:</label>
                                <textarea id="content" name="content"></textarea>
                            </div>
                            <div>
                                <label for="file">Upload File:</label>
                                <input type="file" id="file" name="file">
                            </div>
                            <button type="submit">Save</button>
                        </form>
                    
                        <script>
                            function fetchContent(section) {
                                fetch('fetch_data.php?section=' + section)
                                    .then(response => response.json())
                                    .then(data => {
                                        document.getElementById('content').value = data.content;
                                    });
                            }
                    
                            document.getElementById('section').addEventListener('change', function() {
                                fetchContent(this.value);
                            });
                        </script> 
                        -->




<script>
        function editDescription(id) {
            var content = document.getElementById('content-' + id).innerText;
            document.getElementById('edit-content').value = content;
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-form').style.display = 'block';
        }
    </script>
</head>
<body>

<h1></h1>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        //echo "<h2>" . htmlspecialchars($row["section"]) . "</h2>";
        echo "<p id='content-" . $row["id"] . "'>" . htmlspecialchars($row["content"]) . "</p>";
        echo "<button onclick='editDescription(" . $row["id"] . ")'>Edit</button>";
        echo "</div>";
    }
} else {
    echo "No content found.";
}
$conn->close();
?>

<div id="edit-form" style="display:none; padding: 20px; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 5px; background-color: rgb(255, 255, 255); margin-bottom: 20px;">
    <h2 style="font-size: 24px; color: rgb(45, 122, 127); margin-bottom: 15px;">Edit Description</h2>
    <form method="POST" action="admin_update.php">
        <input type="hidden" id="edit-id" name="id">
        <textarea id="edit-content" name="content" style="width: 100%; height: 150px; padding: 10px; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 5px; margin-bottom: 15px; font-size: 16px;"></textarea><br>
        <button type="submit" style="padding: 10px 20px; border: none; background-color: rgb(45, 122, 127); color: white; font-size: 16px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;">Save</button>
    </form>
</div>

<div style="padding: 20px; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 5px; background-color: rgb(255, 255, 255);">
    <h2 style="font-size: 24px; color: rgb(45, 122, 127); margin-bottom: 15px;">Upload New File</h2>
    <form method="POST" action="admin_update.php" enctype="multipart/form-data">
        <input type="file" name="file" accept=".pdf" style="padding: 10px; margin-bottom: 15px;"><br>
        <input type="hidden" name="section" value="CV">
        <button type="submit" style="padding: 10px 20px; border: none; background-color: rgb(45, 122, 127); color: white; font-size: 16px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;">Upload</button>
    </form>
</div>





<?php if (isset($_SESSION['success_message'])): ?>
    <script>
        alert("<?php echo $_SESSION['success_message']; ?>");
        window.location.href = "../index.php";
    </script>
    <?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error_message'])): ?>
    <script>
        alert("<?php echo $_SESSION['error_message']; ?>");
    </script>
    <?php unset($_SESSION['error_message']); ?>
<?php endif; ?>



                    </body>

                    
                </div>
                <div class="featured-image">
                    <div class="image">
                        <img src="../images/personal.png" alt="avatar">
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
                        <!-- Edit and Save buttons -->
                        <!--<div class="edit-buttons">
                            <button class="btn" onclick="editProfessionalBackground()">Edit</button>
                            <button class="btn" onclick="saveProfessionalBackground()">Save</button>
                        </div>-->
                    </div>
                    <div class="about-info">
                        <h3>My Skills</h3>
                        <p>I have experience in..</p>
                        <!-- Edit and Save buttons -->
                        <!--<div class="edit-buttons">
                            <button class="btn" onclick="editSkills()">Edit</button>
                            <button class="btn" onclick="saveSkills()">Save</button>
                        </div>-->
                    </div>
                    <div class="about-info">
                        <h3>My Achievements</h3>
                        <p>I have received several awards and recognition for my work in the field of ..</p>
                        <!-- Edit and Save buttons -->
                        <!--<div class="edit-buttons">
                            <button class="btn" onclick="editAchievements()">Edit</button>
                            <button class="btn" onclick="saveAchievements()">Save</button>
                        </div>-->
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
                        <!-- Edit and Save buttons -->
                        <!--<div class="edit-buttons">
                            <button class="btn" onclick="editEducation()">Edit</button>
                            <button class="btn" onclick="saveEducation()">Save</button>
                        </div>-->
                    </div>
                    <div class="project-box">
                        <i class="uil uil-users-alt"></i>
                        <h3>Works</h3>
                        <label>Worked with..</label>
                        <!-- Edit and Save buttons -->
                        <!--<div class="edit-buttons">
                            <button class="btn" onclick="editWorks()">Edit</button>
                            <button class="btn" onclick="saveWorks()">Save</button>
                        </div>-->
                    </div>
                    <div class="project-box">
                        <i class="uil uil-award"></i>
                        <h3>Experience</h3>
                        <label>2 years in ..</label>
                        <!-- Edit and Save buttons -->
                        <!--<div class="edit-buttons">
                            <button class="btn" onclick="editExperience()">Edit</button>
                            <button class="btn" onclick="saveExperience()">Save</button>
                        </div>-->
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
                <p>Copyright &copy; <a href="#home" style="text-decoration: none;"></a></p>
            </div>
        </footer>

    </div>

    <!-- Typing JavaScript Link -->
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

    <!-- Scroll Reveal Js Link -->
    <script src="https://unpkg.com/scrollreveal"></script>

     <!-- Main Js -->
    <script>
        // Function to handle editing the About section content
        function editAboutContent() {
            var aboutParagraph = document.querySelector('.featured-text-info p');
            var aboutText = aboutParagraph.innerText.trim();
            var inputField = document.createElement('input');
            inputField.value = aboutText;
            aboutParagraph.parentNode.replaceChild(inputField, aboutParagraph);

            var saveButton = document.createElement('button');
            saveButton.innerHTML = 'Save';
            saveButton.addEventListener('click', saveAboutContent);
            document.querySelector('.edit-buttons').appendChild(saveButton);
        }

        // Function to handle saving the About section content
        function saveAboutContent() {
            var updatedContent = document.querySelector('.featured-text-info input').value.trim();
            var aboutInputField = document.querySelector('.featured-text-info input');
            var aboutParagraph = document.createElement('p');
            aboutParagraph.innerText = updatedContent;
            aboutInputField.parentNode.replaceChild(aboutParagraph, aboutInputField);
            alert("Content saved successfully!");
        }

        // Function to handle editing the banner image
        function editBannerContent(imageNumber) {
            console.log('Editing banner image ' + imageNumber);
            // Add logic to edit banner image content
            var bannerBox = document.getElementById('imgban' + imageNumber);
            var bannerText = bannerBox.querySelector('p').innerText.trim();
            var inputField = document.createElement('input');
            inputField.value = bannerText;
            bannerBox.replaceChild(inputField, bannerBox.querySelector('p'));

            var saveButton = document.createElement('button');
            saveButton.innerHTML = 'Save';
            saveButton.addEventListener('click', function() {
                saveBannerContent(imageNumber);
            });
            document.querySelector('.edit-buttons').appendChild(saveButton);
        }

        // Function to handle saving the banner image
        function saveBannerContent(imageNumber) {
            console.log('Saving banner image ' + imageNumber);
            var bannerBox = document.getElementById('imgban' + imageNumber);
            var updatedContent = bannerBox.querySelector('input').value.trim();
            var bannerParagraph = document.createElement('p');
            bannerParagraph.innerText = updatedContent;
            bannerBox.replaceChild(bannerParagraph, bannerBox.querySelector('input'));
            alert("Content saved successfully!");
        }

        // Function to handle uploading a new banner image
        function uploadNewBanner() {
            console.log('Uploading new banner image');
            // Add logic to upload new banner image
            var input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.addEventListener('change', function() {
                // Handle file upload
                var file = input.files[0];
                // Implement logic to upload the file to the server
                alert("New banner image uploaded successfully!");
            });
            input.click();
        }

        // Function to handle deleting the banner image
        function deleteBannerImage() {
            console.log('Deleting banner image');
            // Add logic to delete banner image
            var confirmDelete = confirm("Are you sure you want to delete the banner image?");
            if (confirmDelete) {
                // Implement logic to delete the image
                alert("Banner image deleted successfully!");
            }
        }

        // Function to handle file upload
        function uploadFile(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    // Save the file data
                    var fileData = e.target.result;
                    // Assuming you have a server-side mechanism to save this file
                    // For now, we will just display the download button
                    document.getElementById('downloadCvBtn').style.display = 'inline-block';
                    alert("File uploaded successfully!");
                };
                reader.readAsDataURL(file);
            }
        }

        // Function to handle file download
        //function downloadFile() {
            // Trigger file download
           // var a = document.createElement('a');
          //  a.href = '/path/to/your/cv/file'; // Replace with the actual file path
          //  a.download = 'CV.pdf'; // Adjust the filename as needed
          //  a.click();
        //}

        // Function to handle sending a message
        function sendMessage() {
            // Add logic to send message
        }

        // Add event listener to the send button
        document.getElementById("sendBtn").addEventListener("click", sendMessage);
    </script>


</body>
</html>
