<!DOCTYPE html>
<html lang="en">


<?php
require_once './include/config.php'; //create database connection
include './include/function.php';

$result = array('status' => '', 'message' => '');
$getUsers = getUser($conn);
$categories = getcategories($conn);
$subCategories = getSubCategories($conn);
$courseName =  getCourses($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $C_id = $_POST["C_id"];
  


   if (isset($_FILES['l_material'])) {
    $file_name = $_FILES['l_material']['name'];
    $file_size = $_FILES['l_material']['size'];
    $file_tmp = $_FILES['l_material']['tmp_name'];
    $file_type = $_FILES['l_material']['type'];

    $imagePath = "./assets/upload/l_material/". $file_name;
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

    $l_material = $file_name;

    if (isset($_FILES['reference'])) {
        $file_name = $_FILES['reference']['name'];
        $file_size = $_FILES['reference']['size'];
        $file_tmp = $_FILES['reference']['tmp_name'];
        $file_type = $_FILES['reference']['type'];
    
        $imagePath = "./assets/upload/reference/". $file_name;
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
    $reference = $file_name;
    
    $result= saveCourseDetails($conn, $C_id, $l_material, $reference);
   
}
   

}


?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Course</title>
    <link rel="stylesheet" href="Style.css">
    <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: rgb(106, 106, 106);
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 8px;
        font-weight: bold;
        color: #555;
    }

    input {
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        padding: 12px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    @media only screen and (max-width: 600px) {
        .container {
            width: 90%;
        }
    }

    /* Drop down */

    #drop-area {
        border: 2px dashed #2d2c2c;
        border-radius: 8px;
        padding: 40px;
        text-align: center;
        cursor: pointer;
        transition: border 0.3s ease-in-out;
    }

    #drop-area.highlight {
        border-color: #218838;
    }

    #file-list {
        list-style: none;
        padding: 0;
        max-width: 400px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #file-list li {
        margin-bottom: 10px;
        word-break: break-all;
    }

    #file-list li::before {
        content: '📁 ';
        font-size: 18px;
        margin-right: 5px;
    }

    #drop-area p {
        margin: 0;
        font-size: 18px;
        color: #3326c6;
    }
    </style>
</head>

<body>

    <!-- Navigation -->

    <?php include './include/header.php' ?>



    <div class="container">
        <?= $result['message'] ?>
        <h1>Add New Course</h1>
        <form action="#" method="post" enctype="multipart/form-data">
            <label for="courseName">Course Name:</label>
            <select id="C_id" name="C_id">
                <?php
                    if (!empty($courseName)) {
                        foreach ($courseName as $selectedArray) {
                    ?>
                <option value="<?= $selectedArray['C_id'] ?>"><?= $selectedArray['C_name'] ?></option>
                <?php
                        }
                    }
                    ?>
            </select>

            <br>


            <label for="Category">Course Main Category:</label>
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

            <br>

            <label for="sub-category">Sub Category:</label>
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

            <br>

            <!-- Lecture materials -->

            <label for="Matirials">Lecture Matirials:</label>
            <!-- 
            <div id="drop-area" ondragover="allowDrop(event)" ondrop="handleDrop(event)"
                ondragenter="highlightDropArea()" ondragleave="unhighlightDropArea()">
                <p>Drag &amp; or click to Select the videos and pdf</p>
                <input type="file" id="" name="l_material">
            </div> -->

            <input type="file" id="" name="l_material">

            <script>
            function allowDrop(event) {
                event.preventDefault();
            }

            function highlightDropArea() {
                document.getElementById('drop-area').classList.add('highlight');
            }

            function unhighlightDropArea() {
                document.getElementById('drop-area').classList.remove('highlight');
            }

            function handleDrop(event) {
                event.preventDefault();
                unhighlightDropArea();

                const files = event.dataTransfer.files;
                handleFiles(files);
            }

            function handleFiles(files) {
                const fileList = document.getElementById('file-list');
                fileList.innerHTML = ''; // Clear previous entries

                for (const file of files) {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${file.name} - ${formatBytes(file.size)}`;
                    fileList.appendChild(listItem);
                }
            }

            function formatBytes(bytes, decimals = 2) {
                if (bytes === 0) return '0 Bytes';

                const k = 1024;
                const dm = decimals < 0 ? 0 : decimals;
                const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

                const i = Math.floor(Math.log(bytes) / Math.log(k));

                return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
            }

            document.getElementById('drop-area').addEventListener('click', () => {
                document.getElementById('file-input').click();
            });
            </script>

            <br>

            <!-- References -->

            <label for="References">References:</label>

            <!-- <div id="drop-area" ondragover="allowDrop(event)" ondrop="handleDrop(event)"
                ondragenter="highlightDropArea()" ondragleave="unhighlightDropArea()">
                <p>Drag &amp; or click to Select the References</p>

            </div> -->

            <input type="file" id="reference" name="reference">
            <script>
            function allowDrop(event) {
                event.preventDefault();
            }

            function highlightDropArea() {
                document.getElementById('drop-area').classList.add('highlight');
            }

            function unhighlightDropArea() {
                document.getElementById('drop-area').classList.remove('highlight');
            }

            function handleDrop(event) {
                event.preventDefault();
                unhighlightDropArea();

                const files = event.dataTransfer.files;
                handleFiles(files);
            }

            function handleFiles(files) {
                const fileList = document.getElementById('file-list');
                fileList.innerHTML = ''; // Clear previous entries

                for (const file of files) {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${file.name} - ${formatBytes(file.size)}`;
                    fileList.appendChild(listItem);
                }
            }

            function formatBytes(bytes, decimals = 2) {
                if (bytes === 0) return '0 Bytes';

                const k = 1024;
                const dm = decimals < 0 ? 0 : decimals;
                const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k,
                    i)).toFixed(dm)) + ' ' + sizes[i];
            }
            document.getElementById('drop-area').addEventListener('click', () => {
                document.getElementById('file-input').click();
            });
            </script>

            <br>




            <script>
            function allowDrop(event) {
                event.preventDefault();
            }

            function highlightDropArea() {
                document.getElementById('drop-area').classList.add('highlight');
            }

            function unhighlightDropArea() {
                document.getElementById('drop-area').classList.remove('highlight');
            }

            function handleDrop(event) {
                event.preventDefault();
                unhighlightDropArea();

                const files = event.dataTransfer.files;
                handleFiles(files);
            }

            function handleFiles(files) {
                const fileList = document.getElementById('file-list');
                fileList.innerHTML = ''; // Clear previous entries

                for (const file of files) {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${file.name} - ${formatBytes(file.size)}`;
                    fileList.appendChild(listItem);
                }
            }

            function formatBytes(bytes, decimals = 2) {
                if (bytes === 0) return '0 Bytes';

                const k = 1024;
                const dm = decimals < 0 ? 0 : decimals;
                const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

                const i = Math.floor(Math.log(bytes) / Math.log(k));

                return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
            }

            document.getElementById('drop-area').addEventListener('click', () => {
                document.getElementById('file-input').click();
            });
            </script>

            </p>


            <button type="submit">Add Course</button>
            <br>

            <!-- Clear -->

            <button type="clear" style="background-color: rgb(216, 83, 83);" onclick="clearForm()">Clear</button>


            <script>
            function allowDrop(event) {
                event.preventDefault();
            }

            function highlightDropArea(dropAreaId) {
                document.getElementById(dropAreaId).classList.add('highlight');
            }

            function unhighlightDropArea(dropAreaId) {
                document.getElementById(dropAreaId).classList.remove('highlight');
            }

            function handleDrop(dropAreaId, files) {
                event.preventDefault();
                unhighlightDropArea(dropAreaId);

                const fileList = document.getElementById(dropAreaId + '-list');
                fileList.innerHTML = '';

                for (const file of files) {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${file.name} - ${formatBytes(file.size)}`;
                    fileList.appendChild(listItem);
                }
            }

            function formatBytes(bytes, decimals = 2) {
                if (bytes === 0) return '0 Bytes';

                const k = 1024;
                const dm = decimals < 0 ? 0 : decimals;
                const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

                const i = Math.floor(Math.log(bytes) / Math.log(k));

                return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
            }

            function clearForm() {
                // Clear input fields
                document.getElementById('courseName').value = '';
                document.getElementById('instructor').value = '';
                document.getElementById('cars').value = 'ICT';
                document.getElementById('type').value = 'free';
                document.getElementById('price').value = '';
                document.getElementById('startDate').value = '';

                // Clear drop areas
                clearDropArea('lectureDropArea');
                clearDropArea('referencesDropArea');
                clearDropArea('quizDropArea');

                // Clear file lists
                clearFileList('lecture-drop-list');
                clearFileList('references-drop-list');
                clearFileList('quiz-drop-list');
            }

            function clearDropArea(dropAreaId) {
                document.getElementById(dropAreaId).innerHTML = '';
            }

            function clearFileList(fileListId) {
                document.getElementById(fileListId).innerHTML = '';
            }

            // Use unique IDs for each drop area and file list
            document.getElementById('lecture-drop-area').addEventListener('click', () => {
                document.getElementById('lecture-file-input').click();
            });

            document.getElementById('references-drop-area').addEventListener('click', () => {
                document.getElementById('references-file-input').click();
            });

            document.getElementById('quiz-drop-area').addEventListener('click', () => {
                document.getElementById('quiz-file-input').click();
            });

            document.getElementById('courseForm').addEventListener('submit', (event) => {
                event.preventDefault();
                // Handle form submission
            });
            </script>

        </form>
    </div>

    <footer><?php include './include/footer.php' ?>

    </footer>

</body>


</html>