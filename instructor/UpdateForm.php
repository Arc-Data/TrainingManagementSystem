<!DOCTYPE html>
<html>
  <head>
<title>Pool of Instructors</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" type="text/css" href="style.css">


  </head>

  <body>
    <header>
    <h1>POOL OF INSTRUCTORS </h1> 
      <div class="homebutton"><a href="PoolofInstructor.php"><span class="material-symbols-outlined">home</span></a>
    </div>
    </header>

<center>
<?php
  include 'connectdb.php';

  if(isset($_GET['update1'])){
  $userid=$_GET['update1'];
  $query= "SELECT * FROM account_details iNNER JOIN pool_instructor_details ON account_details.account_id = pool_instructor_details.account_id
           WHERE account_details.account_id = '$userid' OR pool_instructor_details.account_id='$userid'";
  $result = mysqli_query($conn,$query); 

  if (mysqli_num_rows($result)){
    while ($row =mysqli_fetch_array($result))
    {
      $instructor_id=$row['instructor_id'];
      $account_id=$row['account_id'];
      $rank=$row['rank'];
      $lastname=$row['lastname'];
      $firstname=$row['firstname'];
      $middlename=$row['middlename'];
      $suffix=$row['suffix'];
      $quadeg=$row['qualification_degree'];
      $couspe=$row['course_specialization'];
      $othqua=$row['other_qualification'];
    }
    ?>
    <form action="UpdateAddData.php" method="post">
    <input type="text" name="instrucid" value="<?php echo $instructor_id;?>">
     <span>INSTRUCTOR ID</span><br>
     <input type="text" name="accid" value="<?php echo  $account_id;?>"readonly>
     <span>ACCOUNT ID</span><br>
     <input type="text" name="rank" value="<?php echo  $rank;?>">
     <span>rank</span><br>
     <input type="text" name="last" value="<?php echo  $lastname;?>"readonly>
     <span>last name</span><br>
     <input type="text" name="first" value="<?php echo  $firstname;?>"readonly>
     <span>first name</span><br>
     <input type="text" name="middle" value="<?php echo  $middlename;?>"readonly>
     <span>middle name</span><br>
     <input type="text" name="suffix" value="<?php echo  $suffix;?>"readonly>
     <span>suffix</span><br>
     <input type="text" name="quadeg" value="<?php echo  $quadeg;?>">
     <span>qualification degree</span><br>
     <input type="text" name="couspe" value="<?php echo  $couspe;?>">
     <span>Course Specialization</span><br>
     <input type="text" name="othqua" value="<?php echo  $othqua;?> ">
     <span>Other Qualification</span><br>
     <div>
     <button type="submit" name="update" >Update </button>
     </div>
   </form>
  <?php
    }
    }
?>
</center>


</body>
</html>