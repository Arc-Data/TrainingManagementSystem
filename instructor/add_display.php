<!DOCTYPE html>
<html
  <head>
<title>Pool of Instructors</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../assets/css/instructor_style.css">


  </head>
  
  <body>
    <br><br>
    <br><a href = "index.php" class = "text-decoration-none" style = "font-size:15px; color: #681a1a; margin-left: 10px">&#8592; Back to View</a>
<center>
<?php
session_start();
  require '../templates/connection.php';
  require '../templates/header.php';
  require '../templates/navigation.php'; 

  if(isset($_POST['insert'])){
    //$query= "SELECT * FROM account_details, pool_instructor_details WHERE user_type='instructor'";
    $query= "SELECT a.username, a.account_id, a.lastname, a.firstname, a.middlename, a.suffix, a.user_type, p.instructor_id
    FROM account_details a LEFT JOIN pool_instructor_details p ON a.account_id = p.account_id 
    WHERE user_type='instructor' AND p.instructor_id IS NULL";
    //$query= "SELECT a.account_id, a.lastname, a.firstname, a.middlename, a.suffix, a.user_type, p.instructor_id FROM account_details a INNER JOIN pool_instructor_details p ON a.account_id = p.account_id WHERE user_type='instructor'";
  $result = mysqli_query($conn,$query); 
  if (mysqli_num_rows($result)){
?>
    <h1>Instructors</h1>
    <p>List of Instructor user types that don't Instructor details.</p>
    <br><br><br>
    <div class="col-lg-10 mx-auto row container my-3 table-responsive">
    <table class='table'>
	<thead>
		<tr>
            <!-- <th>Instructor ID</th> -->
			<th style='width: 10%'>Account ID</th>
            <th style='width: 15%'>Username</th>
            <th style='width: 10%'>Last Name</th>
			<th style='width: 10%'> First Name</th>
            <th style='width: 10%'>Middle Name</th>
			<th style='width: 5%'>Suffix  </th>
            <!-- <th>User Type  </th> -->
            <th style='width: 5%'> </th>
		</tr>
	</thead>
	
  <tbody>
	<?php while ($row = mysqli_fetch_array($result)) { ?>
		<tr>
           
            <td class = "fs-5"><?php echo $row['account_id']; ?>  </td>
            <td class = "fs-5"><?php echo $row['username']; ?>  </td>
            <td class = "fs-5"><?php echo $row['lastname']; ?></td>
			<td class = "fs-5"><?php echo $row['firstname']; ?></td>
            <td class = "fs-5"><?php echo $row['middlename']; ?></td>
			<td class = "fs-5"><?php echo $row['suffix']; ?></td>
            
            <td class = "fs-5">
                <a href="Add.php?add1= <?php echo $row['account_id']; ?>" ><button type="submit" name="add"  class="button3" > Add</button> 
			</td>
		</tr>
	<?php 
  }?>
  </tbody>
</table>
<?php
 }
}
?>
</div>
<br><br>
<button class= 'button' ><a class="text-decoration-none fa-solid fa-user-plus" style = "font-size:15px; color: white;" href="create_instructor.php"> Add</a></button>

</center>


</body>
</html>