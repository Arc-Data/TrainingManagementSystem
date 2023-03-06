<!DOCTYPE html>
<html>
<head>
    <?php  session_start(); ?>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width=device-width, initial-scale=1">
	<title>STUDENT CENTER</title>

	<link rel = "preconnect" href="https://fonts.googleapis.com">
    <link rel = "preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href = "https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        .rectangle {
            width: 350px;
            height: 233.33px;
            background-color: #681A1A;
            border-radius: 15px;
        }
        .rectangle2 {
            width: 350px;
            height: 233.33px;
            background-color: #681A1A;
            border-radius: 15px;
        }

        .rectangle3 {
            width: 350px;
            height: 233.33px;
            background-color: #681A1A;
            border-radius: 15px;
        }
        
    
        .jumpto{
           
            justify-content: center;
            justify-items: center;
            padding-right: 45px;
            padding-top: 100px;
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 700;
            font-size: 35px;
            line-height: 43px;
    

            display: flex;
            align-items: center;
            text-align: center;

            color: #000000;

            mix-blend-mode: normal;
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



        </style>
    </head>
    <br><br><br><a href = "../user/homepage.php" class = "text-decoration-none" style = "font-size:15px; color: #681a1a; margin-left: 10px">&#8592; Back to View</a>
    <body style="font-family: Montserrat;">
	
    <?php 
    require '../templates/navigation.php';
    ?>
  


  <div class="container">
    <div class="row pt-5">
        <div class="col">
            <a class= "text-decoration-none" href="search_database.php">
                <div class="rectangle d-flex align-items-center"> 
                    <h1 style="color:white; text-align: center; font-size: 40px;">SEARCH DATABASE</h1>
                </div>
            </a>
        </div>
    

        <div class="col">
            <a class= "text-decoration-none" href="class_information_details.php">
                <div class="rectangle2 d-flex align-items-center"> 
                    <h1 style="color:white; text-align: center; font-size: 40px;">CLASS INFORMATION DETAILS</h1>
                </div>
            </a>
        </div>
    

        <div class="col">
            <a class= "text-decoration-none" href="create_student.php">
                <div class="rectangle3 d-flex align-items-center justify-content-center">  
                    <h1 style="color:white; text-align: center;">ADD STUDENT</h1>
                </div>
            </a>
        </div>
    </div>

    <!-- <div class="jumpto">
        <button class="btn btn-secondary dropdown-toggle" style="width:280px"type="button" data-bs-toggle="dropdown" aria-expanded="false">
            JUMP TO:
        </button>
        <ul class="dropdown-menu" style="text-align: center;">
            <li><a class="dropdown-item" href="add_participants.php">ADD PARTICIPANT</a></li>
            <li><a class="dropdown-item" href="search_database.php">SEARCH DATABASE</a></li>    
            <li><a class="dropdown-item" href="class_information_details.php">CLASS INFORMATION DETAILS</a></li>
            <li><a class="dropdown-item" href="create_student.php">CREATE STUDENT</a></li>
            <li><a class="dropdown-item" href="read_student.php">READ STUDENT</a></li> 
        </ul>
    </div> -->

</div>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>


    </body>
    <footer>
      <div class="custom-shape-divider-bottom-1676706408">
          <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
          <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
          <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
          <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
          </svg>
      </div>
    </footer>
</html>    