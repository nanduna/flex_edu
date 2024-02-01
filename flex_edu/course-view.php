<?php
require_once './include/config.php';
include './include/function.php';
$categories = getcategories($conn);
$subCategories = getSubCategories($conn);
$courses =  GetCourses($conn);

$courseCategory = $_GET['courseCategory'];
$selectedCategory = $categories[$courseCategory];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="Style.css">
    <script src="https://kit.fontawesome.com/63da78ddab.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navigation -->
    <?php include './include/header.php' ?>



    <!-- Sub Category -->

    <div class="sub_category">
        <div class="wrapper">
            <h6 class="category sub litle"><?= $selectedCategory['C_Name'] ?></h6>
            <h3 class="ctegory_title">Our category</h3>

            <div class="category_container">

                <?php
                if (!empty($subCategories)) {
                    foreach ($subCategories as $selectedCategory) {

                        if ($selectedCategory['Category_id'] != $courseCategory) {
                            continue;
                        }
                ?>
                <a href="#course" class="category">
                    <img src="./assets/upload/course_image/<?= $selectedCategory['course_image'] ?>" alt="">
                    <div class="category_body">
                        <h4><?= $selectedCategory['SC_Name'] ?></h4>
                        <span>100 Courses</span>
                    </div>
                </a>

                <?php

                    }
                }
                ?>



            </div>

            <button class="show_all_button" type="button">Show all Category</button>

        </div>
    </div>

    <!-- Courses -->

    <section id="course">
        <h1>Our Free Courses</h1>
        <p>Learn new skills and advance your career with free online courses.
            Our courses cover a wide range of topics, taught by expert instructors.
            Learn at your own pace and start learning today!</p>

        <div class="course_Box">


            <?php
            if (!empty($courses)) {
                foreach ($courses as $selectedCourse) {

                    if ($selectedCourse['C_type'] != "free") {
                        continue;
                    }

            ?>
            <div class="courses">
                <img src="./assets/upload/course_image/<?= $selectedCourse['course_image'] ?>" alt="">
                <div class="deatails">
                    <span>
                        Updated 23/8/21
                    </span>
                    <h6><?= $selectedCourse['C_name'] ?></h6>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span>(230)</span>
                    </div>
                </div>

                <div class="cost">
                    FREE
                </div>
            </div>

            <?php

                }
            }
            ?>





        </div>

        </div>

    </section>

    <section>


        <section id="course">
            <h1 style="margin-top: 50px;">Our premium Courses</h1>
            <p>"Unlock Your Full Potential with Premium Courses:
                Elevate your skills and knowledge with our exclusive premium courses. Dive deep into specialized
                subjects,
                gain expert insights, and accelerate your personal and professional growth. Discover a world of premium
                learning opportunities on our website today!</p>

            <div class="course_Box">

                <?php
                if (!empty($courses)) {
                    foreach ($courses as $selectedCourse) {

                        if ($selectedCourse['C_type'] == "free") {
                            continue;
                        }

                ?>
                <div class="courses">
                    <img src="assets/images/course_image/python.jpg" alt="">
                    <div class="deatails">
                        <span>
                            Updated 23/8/21
                        </span>
                        <h6><?= $selectedCourse['C_name'] ?></h6>
                        <div class="star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(230)</span>
                        </div>
                    </div>

                    <div class="cost">
                        <?= number_format ($selectedCourse['C_price'],2) ?>
                    </div>
                </div>

                <?php

                    }
                }
                ?>







            </div>

            </div>

        </section>

    </section>


    <footer>
        <div class="footer-content">
            <div class="project-info">
                <h3>Group 28 Project</h3>
                <p>University of Sri Jayewardenepura</p>
            </div>
            <div class="contact-info">
                <h3>Contact Information</h3>
                <ul>
                    <li>ICT/20/857 Anushka Indunil</li>
                    <li>ICT/20/856 Chathuranga Sampath </li>
                    <li>ICT/20/802 Nandun</li>
                    <li>ICT/20/881 Hashini</li>
                    <li>ICT/20/924 Amila</li>
                    <!-- Add more members as needed -->
                </ul>

            </div>
        </div>
        <p>All right reserved</p>
    </footer>

</body>

</html>