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
  require '../templates/navigation.php'; ?>
  <form action="Add.php" method="post"><?php
  if(isset($_POST['insert'])){
  $query= "SELECT * FROM account_details WHERE user_type='instructor'
  ";
  $result = mysqli_query($conn,$query); 
  if (mysqli_num_rows($result)){
?>
  <table>
	<thead>
		<tr>
			<th>Account ID</th>
      <th>Last Name</th>
			<th>First Name</th>
      <th>Middle Name</th>
			<th>Suffix  </th>
      <th>User Type  </th>
		</tr>
	</thead>
	
  <tbody>
	<?php while ($row = mysqli_fetch_array($result)) { ?>
		<tr>
      <td><?php echo $row['account_id']; ?></td>
      <td><?php echo $row['lastname']; ?></td>
			<td><?php echo $row['firstname']; ?></td>
      <td><?php echo $row['middlename']; ?></td>
			<td><?php echo $row['suffix']; ?></td>
      <td><?php echo $row['user_type']; ?></td>
      <td>
				<button type="submit" name="add "class="button3" > Add</button> 
			</td>
		</tr>
	<?php } ?>
  </tbody>
</table>
<?php
 }
}
?></form>
<br><br>
<button class= 'button1'><a class = "text-decoration-none" style = "font-size:15px; color: white;" href="create_instructor.php"> Add New Instructor</a></button>

</center>

</body>
</html>