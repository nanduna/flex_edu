<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="new.css">
    <link rel="stylesheet" href="Style.css">

    <style>
    #prof {
        background-color: white;
        max-width: 500px;
        margin: 40px auto;
        padding: 80px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #id {

        .profile-pic1 {
            max-width: 300px;
            border-radius: 50%;
            margin-bottom: 20px;
            margin-right: 50%;
        }

        #hcon {
            padding: 80px;

        }
    }
    </style>
</head>

<body>
    <!-- Navigation -->
    <?php include './include/header.php' ?>

    <div class="container1">


        <div id="prof">
            <img src="./assets/images/instructor.png" alt="Profile Picture" id="profile-pic1">
            <div id="hcon">
                <h2>
                    <centre>Become an instructor
                </h2>
                </centre><br>

                <p>Instructors from around the world teach millions of learners on FlexiEdu. We provide the tools and
                    skills to teach what you love.</p>
                <br>
                <a href="create-course.php" class="btn">Start teaching today </a>
            </div>
        </div>

    </div>
    <img src="./assets/images/prohover.png" class="feature-img anim">

    </div>
    </div>
    <footer>
        <?php include './include/footer.php' ?>
    </footer>
</body>

</html>