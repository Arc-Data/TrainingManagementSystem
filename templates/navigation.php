<nav class = "navbar navbar-expand-lg navbar-dark fixed-top pe-5 ps-5 h-18" style = "background-color: #681A1A;">

        <a class = "navbar-brand" href="../user/homepage.php" style="font-size:23px;" >Web Development</a>
        <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#portfolio-nav" aria-controls = "portfolio-nav" aria-expanded = "false" aria-label = "Toggle navigation">
            <span class = "navbar-toggler-icon"></span>
        </button>

        <?php if((isset($_SESSION['user_type']))): ?>
        <div class = "collapse navbar-collapse" id = "portfolio-nav">
            <ul class="nav navbar-nav me-auto">
                <li class ="nav-item">
                    <a class="nav-link" href="../user/homepage.php" style="font-size:15px;">HOME</a>

                <?php endif;  ?>

                    <?php if((isset($_SESSION['username']) && $_SESSION['user_type'] == 'admin')): ?>
                    <!-- </li> -->
                    <li class = "nav-item">
                        <a class="nav-link" href="../student/index.php" style="font-size:15px;">STUDENT</a>
                    </li>
                    <li class = "nav-item">
                        <a class="nav-link" href="../course/index.php" style="font-size:15px;">COURSE</a>
                    </li>
                    <li class = " nav-item">
                        <a class="nav-link" href="../instructor/index.php" style="font-size:15px;">INSTRUCTORS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="../report/index.php" style="font-size:15px;" >GENERATE REPORT</a>
                    </li>
                    <li class ="nav-item">
                        <a class="nav-link" href="../user/Admin-Module.php" style="font-size:15px;">UPDATE DATABASE</a>
                    </li>
                    <?php endif;  ?>
                <!-- </li> -->

            </ul>



<!--     <div class="right-side"> -->
            <ul class="nav navbar-nav ms-auto">
            <?php if(!isset($_SESSION['username'])){ ?>
               <!--  <div class = "collapse navbar-collapse" id = "portfolio-nav">
                    <ul class="nav navbar-nav mr-auto"> -->
                        <li class = "nav-item"><a class="nav-link"href="../user/Login.php">Login</a></li>
                        <li class = "nav-item"><a class="nav-link" href="../user/Registration-Form.php">Register</a></li>
                    <!-- </ul>
                </div> -->
            <?php }else{ ?>
                <!-- <div class = "collapse navbar-collapse" id = "portfolio-nav">
                    <ul class="nav navbar-nav mr-auto"> -->
                    <?php
                    require '../templates/connection.php';
                    $sql = "SELECT * FROM account_details";
                    $records = mysqli_query($conn, "SELECT * from account_details WHERE username = '$_SESSION[username]'");

                    if($row = mysqli_fetch_assoc($records)) {
                        $fname = $row['firstname'];
                        $user_type = $row['user_type'];}
                        ?>

                        <li class = "nav-item"><a class="nav-link" href="../user/userProfile.php"> <?php echo ucfirst($row['firstname']);?> (<?php echo $row['user_type']?>)</a>    </li>
                        <li class = "nav-item"><a class="nav-link" href="../user/logoutProcess.php">Log Out</a> </li>
                   <!--  </ul>
                </div>  -->
            <?php } ?>
            </ul>
           <!--  </div> --> <!-- right-side -->
        </div>  <!-- collapse nav bar -->
</nav>