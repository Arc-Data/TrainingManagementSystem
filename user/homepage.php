<?php session_start();

    require '../templates/connection.php';
    require '../templates/header.php';

?>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>


        body {

            font-family: 'Montserrat', sans-serif;
            overflow: hidden; /* Hide scrollbars */
        }

        .rectangle {
            width: 350px;
            height: 233.33px;
            background-color: #681A1A;
            border-radius: 15px;
            margin-top: 50px;
        }
        .rectangle2 {
            width: 350px;
            height: 233.33px;
            background-color: #681A1A;
            border-radius: 15px;
            margin-top: 50px;
        }
        .rectangle3 {
            width: 350px;
            height: 233.33px;
            background-color: #681A1A;
            border-radius: 15px;
            margin-top: 50px;
        }


        .cclass{
            position: absolute;
            width: 131.03px;
            height: 64.62px;
            left: 967.95px;
            top: 172.59px;

            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            font-size: 67px;
            line-height: 82px;

            color: #FFFFFF;
        }
        .class{
            position: absolute;
            width: 152.56px;
            height: 26.92px;
            left: 968px;
            top: 264px;

            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            font-size: 24px;
            line-height: 29px;

            color: #FFFFFF;
        }


    .custom-shape-divider-bottom-1676706408 {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    transform: rotate(180deg);
    }

    .custom-shape-divider-bottom-1676706408 svg {
    position: relative;
    display: block;
    width: calc(118% + 1.3px);
    height: 112px;
    transform: rotateY(180deg);
    }

    .custom-shape-divider-bottom-1676706408 .shape-fill {
    fill: #681A1A;
    }

    .icon1{
        width: 500px;
        position: fixed;
        right: 0;
        bottom: 0;
        padding-right: 75px;
    }

    .icon2{
        width: 500px;
        position: fixed;
        left: 0;
        bottom: 0;
        padding-left: 75px;
    }

    .icon3{
        width: 800px;
        position: fixed;
        left: 0;
        bottom: 0;
        padding-left: 75px;
    }

    .first-class {
    color: gray;
    margin-top: 100px;
    margin-bottom: 5px;
    font-size: 17px;
    font-weight: 300;
    text-align: center;
    font-weight: bold;
    letter-spacing: 5px;
    font-family: Montserrat;
    float: center;
    }


    </style>
</head>

<br><br><br><a href = "../user/index.php" class = "text-decoration-none" style = "font-size:15px; color: #681a1a; margin-left: 10px">&#8592; View ongoing courses</a>
<body style="font-family: Montserrat;">

<header>

    <?php
    require '../templates/navigation.php';
    $sql = "SELECT COUNT(account_id) AS student_total FROM account_details WHERE user_type='student'";

    $result = mysqli_query($conn,$sql);
    $no_students = mysqli_fetch_assoc($result);

    $sql = "SELECT COUNT(account_id) AS instructor_total FROM account_details WHERE user_type='instructor'";

    $result = mysqli_query($conn,$sql);
    $no_instructors = mysqli_fetch_assoc($result);

    $sql = "SELECT COUNT(course_reg_id) AS class_total FROM registration_course";

    $result = mysqli_query($conn,$sql);
    $no_classes = mysqli_fetch_assoc($result);
    ?>
<div class="container">
    <div class="row pt-5">
        <div class="col">
            <div class="rectangle"> <h1 style="color: white; text-align:center; padding-top: 70px; font-size:35px;"> <i class="fa-solid fa-user-graduate"></i> STUDENTS <br><br><?php echo $no_students['student_total'];?> </h1> </div>
        </div>
        <div class="col">
            <div class="rectangle2"><h1 style="color: white; text-align:center; padding-top: 70px; font-size:35px;"> <i class="fa-solid fa-chalkboard-user"></i> INSTRUCTORS <br><br><?php echo $no_instructors['instructor_total'];?> </h1> </div>
        </div>
        <div class="col">
            <div class="rectangle3"><h1 style="color: white; text-align:center; padding-top: 70px; font-size:35px;"> <i class="fas fa-book"></i> CLASSES <br><br><?php echo $no_classes['class_total'];?> </h1></div>
        </div>

</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>



<footer>
      <div class="custom-shape-divider-bottom-1676706408">
          <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
          <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
          <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
          <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
          </svg>
      </div>

      <div class ="first-class">
        <table>
               <tr> <br>
                <h1 class="fc-h1>">Training Management System</h1> <br>
                <h4 class="fc-h4"> WEB DEVELOPMENT </h4> </tr> <br> <br> <br> <br>
        </table>
      </div>

<div class="col">
    <div class="icon1">
    <h5 style="color:#FFFFFA; font-size:15px;"> Keep In Touch </h5>
    <i class="fab fa-facebook-f pt-1" style="font-size:25px; color:white"></i>
    <i class="fab fa-twitter pt-1 p-3" style="font-size:25px;color:white " ></i>
    <i class="fab fa-google pt-1 p-3" style="font-size:25px;color:white " ></i>
    <i class="fab fa-instagram pt-1 p-3" style="font-size:25px;color:white "></i>
    <i class="fab fa-linkedin-in pt-1 p-3" style="font-size:25px;color:white " ></i>
    </div>
</div>


<div class="icon3">
    <h5 style="color:#FFFFFA; font-size:15px;"> Email: trainingsystem@gmail.com </h5>
    <h5 style="color:#FFFFFA; font-size:15px;"> Phone No.: +639 </h5>
</div>

</footer>

</html>