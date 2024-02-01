<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="index1.css">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="footern.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php
    require_once './include/config.php';
    include './include/function.php';
    $categories = getcategories($conn);
    $subCategories = getSubCategories($conn);
    //var_dump($categories); to check 
    ?>

    <style>
    .hero {
        width: 100%;
        min-height: 100vh;
        background-image: url(./assets/images/back.jpg);
        background-position: center;
        background-size: cover;
        padding: 10px 10%;
        overflow: hidden;
        position: relative;
    }

    .h1 {
        font-size: var(--fs-1);
    }

    .section-title {
        --color: var(--radical-red);
        text-align: center;
    }

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

    .content {
        margin-top: 5%;
        max-width: 600px;

    }

    .content h1 {
        font-size: 70px;
        color: #222;

    }

    .content p {
        margin: 20px 0 10px;
        padding-left: 200px;

        color: #333;
    }

    .content .btn {
        padding: 15px 80px;
        font-size: 16px;
        margin-left: 200px;
    }

    .btn:hover {
        border-top-right-radius: 30px;
    }

    .span {
        display: inline-block;
        text-decoration: none;
        padding: 14px 40px;
        color: #fff;
        background-image: linear-gradient(50deg, #19586b, #11444d);
        font-size: 14px;
        border-radius: 30px;

        font-size: 100px;
        margin-top: 10px;
    }

    .content .span {
        padding: 15px 80px;
        font-size: 28px;
    }

    .feature-img {
        width: 530px;
        position: absolute;
        bottom: 0;
        right: 10%
    }

    .anim {
        opacity: 0;
        transform: translateY(100px);
        animation: moveup 1.0s linear forwards;
    }

    .feature-img.anim {
        animation-name: 1.5s;
    }

    @keyframes moveup {
        100% {
            opacity: 1;
            transform: translateY(0px);
        }
    }
    </style>

</head>

<body>
    <!-- Navigation -->
    <?php include './include/header.php' ?>

    <div class="hero">
        <div class="content">
            <h1 class="h1 section-title">
                The Best <span class="span">Courses</span> <br>
                You will Find Here
            </h1>

            <p>
                Enhance your future with FlexiEdu. This is a best online platform for learning.
            </p>
            <a href="course-categories.php" class="btn">Find Course </a>

            <img src="./assets/images/hover.png" class="feature-img anim">
        </div>

    </div>

    <div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-6">
                    <h1 class="hedding">Popular Courses</h1>
                </div>
            </div>

            <div class="row my-5">
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

    </div>


    </footer>
    <?php include './include/footer.php' ?>
</body>

</html>