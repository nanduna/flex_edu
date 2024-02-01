<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profilenew.css">
    <link rel="stylesheet" href="Style.css">
    <script src="https://kit.fontawesome.com/63da78ddab.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Navigation -->
    <?php include './include/teacherHeader.php' ?>
    <!DOCTYPE html>
    <div class="proback">
        <div class="container">

            <div class="profile">
                <h1> My Profile </h1>

            </div>
            <div class="profile-header">
                <img src="./assets/images/OIP.jpg" alt="Profile Picture">
                <h1>John Doe</h1>
                <a href="profile01.php"><span class="location">Edit Profile</span></a>


            </div>

            <div class="profile-details">
                <ul>
                    <li>
                        <span class="label">Email:</span>
                        <span class="value"></span>
                    </li>
                    <li>
                        <span class="label">Phone:</span>
                        <span class="value"></span>
                    </li>
                    <li>
                        <span class="label">Occupation:</span>
                        <span class="value"></span>
                    </li>
                    <li>
                        <span class="label">Interests:</span>
                        <span class="value"></span>
                    </li>
                </ul>
            </div>

            <div class="courses-section">
                <h3>Courses Interests</h3>
                <ul>
                    <li>
                        <span class="course-name">Introduction to Python Programming</span>
                        <span class="course-status">Completed</span>
                    </li>
                    <li>
                        <span class="course-name">Data Analysis with Python</span>
                        <span class="course-status">In Progress</span>
                    </li>
                    <li>
                        <span class="course-name">Machine Learning Fundamentals</span>
                        <span class="course-status">Not Started</span>
                    </li>
                </ul>
            </div>
            <img src="./assets/images/prohover.png" class="feature-img anim">
        </div>
    </div>

    <footer>
        <?php include './include/footer.php' ?>
    </footer>


</body>

</html>