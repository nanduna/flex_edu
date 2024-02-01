<!DOCTYPE html>
<html lang="en">

<?php
require_once './include/config.php';
include './include/function.php';
$categories = getcategories($conn);
$subCategories = getSubCategories($conn);
//var_dump($categories); to check 
?>

<?php include './include/head.php' ?>
<link rel="stylesheet" href="Style.css">
<script src="https://kit.fontawesome.com/63da78ddab.js" crossorigin="anonymous"></script>

<head>


    <title>Teacher view</title>
    <style>
    .btn {
        display: inline-block;
        text-decoration: none;
        padding: 14px 40px;
        color: #fff;
        background-image: linear-gradient(45deg, #19586b, #11444d);
        font-size: 14px;
        border-radius: 30px;
        border-top-right-radius: 0;
        transition: 0.5S;
    }
    </style>
</head>

<body>

    <!-- Navigation -->
    <?php include './include/teacherHeader.php' ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="hedding">Course Categories</h1>
            </div>
        </div>

        <div><a href="create-course.php">
                <button class="btn">Add Course</button></a> <br><br>
            <a href="addCourse.php"> <button class="btn">Add Course Content</button></a>

        </div>

        <div class=" row my-5">
            <?php
            if (!empty($categories)) {
                foreach ($categories as $selectedArray) {
            ?>

            <div class="col-6 col-md-3 mb-3 d-flex">
                <div class="card shadow flex-fill">
                    <div class="card-body">
                        <img src="assets/images/course_image/<?= $selectedArray['image_path'] ?>" alt=""
                            style="width:100%">
                        <h3 class="mt-2"><?= $selectedArray['C_Name'] ?></h3>
                        <p><?= $selectedArray['description'] ?></p>
                    </div>
                    <a href="course-view.php?courseCategory=<?= $selectedArray['Category_id'] ?>"><button
                            class="btn btn-dark w-100">Read More</button></a>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>



    <footer>
        <?php include './include/footer.php' ?>
    </footer>
</body>

</html>