<?php
require_once './include/config.php'; //create database connection
include './include/function.php';

$getUsers = getUser($conn);
$categories = getcategories($conn);
$subCategories = getSubCategories($conn);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courseName = $_POST['course-name'];
    $courseType = $_POST['course-type'];
    $mainCategory = $_POST['main-category'];
    $courseFee = $_POST['course_fee'];
    $subCategory = $_POST['sub-category'];

    $queryResult = SaveCourse($conn, $courseName, $courseType, $courseFee, $mainCategory, $subCategory);
   print_r($queryResult);
}


if (isset($_FILES['course_image'])) {
    $file_name = $_FILES['course_image']['name'];
    $file_size = $_FILES['course_image']['size'];
    $file_tmp = $_FILES['course_image']['tmp_name'];
    $file_type = $_FILES['course_image']['type'];

    $imagePath = "./assets/upload/course_image/". $file_name;
    $file_parts = explode('.', $file_name);
    $file_ext = strtolower(end($file_parts));
    $expensions = array("jpeg", "jpg", "png", "webp","mp4","pdf");
    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "please choose a video file.";
    }
    if ($file_size > 2097152) {
        $errors[] = 'File size must be exactly 2 MB';
    }

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp,  $imagePath);
    } else {
        // echo json_encode(array('status' => 'error', 'message' => $errors[0]));
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './include/head.php' ?>
    <link rel="stylesheet" href="course_adding.css">
    <title>create course</title>

    <style>
    .result {
        color: red;
    }
    </style>
</head>

<body>
    <?php include './include/teacherHeader.php' ?>

    <div class="container">

        <div class="course-form">
            <h1>Add a New Course</h1>
            <form id="course-form" action="#" method="post">
                <label for="course-name">Course Name:</label>
                <input type="text" id="course-name" name="course-name" required>

                <label for="course-type">Course Type:</label>
                <select id="course-type" name="course-type">
                    <option value="free">Free</option>
                    <option value="paid">Paid</option>
                </select>

                <label for="main-category">Main Category:</label>
                <select id="main-category" name="main-category">
                    <?php
                    if (!empty($categories)) {
                        foreach ($categories as $selectedArray) {
                    ?>
                    <option value="<?= $selectedArray['Category_id'] ?>"><?= $selectedArray['C_Name'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>

                <label for="main-category">Sub Category:</label>
                <select id="sub-category" name="sub-category">
                    <?php
                    if (!empty($subCategories)) {
                        foreach ($subCategories as $selectedArray) {
                    ?>
                    <option value="<?= $selectedArray['SC_id'] ?>"><?= $selectedArray['SC_Name'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>

                <label for="course-fee">Course Fee (if paid):</label>
                <input type="text" id="course_fee" name="course_fee" placeholder="Enter course fee" value="0">

                <label for="image">Course Image:</label>
                <input type="file" id="course_image" name="course_image">

                <button type="submit">Add Course</button>



            </form>
        </div>

        <div class="image-container">
            <img src="./assets/images/course.jpg" alt="Image Description">
        </div>

    </div>



    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const courseForm = document.getElementById('course-form');
        const coursesList = document.getElementById('courses-list');
        const courseTypeSelect = document.getElementById('course-type');
        const courseFeeInput = document.getElementById('course-fee');

        // Function to toggle the "Course Fee" input based on the "Course Type" selection
        function toggleCourseFeeInput() {
            if (courseTypeSelect.value === 'paid') {
                courseFeeInput.removeAttribute('disabled');
            } else {
                courseFeeInput.setAttribute('disabled', 'disabled');
            }
        }

        // Initial state based on page load
        toggleCourseFeeInput();

        // Event listener for changes in the "Course Type" selection
        courseTypeSelect.addEventListener('change', toggleCourseFeeInput);

    });
    </script>



    <?php include './include/footer.php'; ?>

</body>

</html>