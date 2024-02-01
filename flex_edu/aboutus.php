<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="Style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
    .about-container {
        position: relative;
        background-color: #1e435c;
        color: #ffffff;
        padding: 20px;
        max-width: 800px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-left: 10px;
        margin: 10px;
    }

    .about-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        opacity: 0.5;
        /* Adjust the transparency here */
        z-index: -1;

    }

    h1 {
        margin-bottom: 20px;
        color: yellow;
    }

    .team-member {
        display: flex;
        flex-direction: column;
        margin-top: 20px;
    }

    .member-info {
        margin-bottom: 20px;
    }

    .member-info h2 {
        margin-bottom: 10px;
        color: #ffff;
    }

    .member-info p {
        line-height: 1.6;
    }

    .member-image img {
        max-width: 100%;
        border-radius: 50%;
    }

    .container {
        display: flex;
    }

    .image-container {

        text-align: right;
        padding: 20px;
        display: flex;
        width: auto;
        height: 500px;
        margin-top: 100px;
    }

    .image-container img {
        width: auto;
        height: 500px;

    }
    </style>
</head>

<body>
    <?php include './include/header.php' ?>
    <div class="container">



        <div class="about-container">
            <h1>About Us</h1>

            <div class="team-member">
                <div class="member-info">
                    <h2>Chathuranga Sampath</h2>
                    <p>Undergraduate University of Sri Jayewardenepura. Currently following Information Communication
                        Technology Degree programme. ict20856</p>
                </div>

            </div>

            <div class="team-member">
                <div class="member-info">
                    <h2>Anushka Indunil</h2>
                    <p>Undergraduate University of Sri Jayewardenepura. Currently following Information Communication
                        Technology Degree programme. ict20857 </p>
                </div>

            </div>

            <div class="team-member">
                <div class="member-info">
                    <h2>Hashini Maheesha</h2>
                    <p>Undergraduate University of Sri Jayewardenepura. Currently following Information Communication
                        Technology Degree programme. ict20881 </p>
                </div>

            </div>

            <div class="team-member">
                <div class="member-info">
                    <h2>Amila Ishara</h2>
                    <p>Undergraduate University of Sri Jayewardenepura. Currently following Information Communication
                        Technology Degree programme. ict20924 </p>
                </div>

            </div>

            <div class="team-member">
                <div class="member-info">
                    <h2>Nadun Abeykoon</h2>
                    <p>Undergraduate University of Sri Jayewardenepura. Currently following Information Communication
                        Technology Degree programme. ict20802 </p>
                </div>

            </div>

            <!-- Add more team members as needed -->

        </div>
        <div class="image-container">
            <img src="./assets/images/aboutusimg2.jpg" alt="Description of the image">
        </div>
    </div>
    <footer>
        <?php include './include/footer.php'; ?>
    </footer>
</body>

</html>