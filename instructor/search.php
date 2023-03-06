<!DOCTYPE html>
<html
  <head>
<title>Pool of Instructors</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" type="text/css" href="../assets/css/instructor_style.css">


  </head>
  
  <body>
    <br><br>
    <br><a href = "index.php" class = "text-decoration-none" style = "font-size:15px; color: #681a1a; margin-left: 10px">&#8592; Back to View</a>
<center>
  <h1>Instructors Found</h1><br><br><br>
<?php
session_start();
  #include 'connectdb.php';
  require '../templates/connection.php';
  require '../templates/header.php';
  require '../templates/navigation.php';
  if(isset($_POST['search'])){
  $name=$_POST['name'];

  $query= "SELECT * FROM account_details iNNER JOIN pool_instructor_details ON account_details.account_id = pool_instructor_details.account_id
  WHERE lastname LIKE '$name' OR course_specialization LIKE '$name' AND user_type = 'instructor';";
  $result = mysqli_query($conn,$query); 
  if (mysqli_num_rows($result)){
?>
  <table>
	<thead>
		<tr>
			<th>Instructor ID</th>
			<th>Account ID</th>
      <th>Rank</th>
      <th>Last Name</th>
			<th>First Name</th>
      <th>Middle Name</th>
			<th>Suffix  </th>
      <th>Qualification Degree</th>
      <th>Course Specialization</th>
      <th>Other Qualification</th>
		</tr>
	</thead>
	
  <tbody>
	<?php while ($row = mysqli_fetch_array($result)) { ?>
		<tr>
			<td><?php echo $row['instructor_id']; ?></td>
      <td><?php echo $row['account_id']; ?></td>
			<td><?php echo $row['rank']; ?></td>
      <td><?php echo $row['lastname']; ?></td>
			<td><?php echo $row['firstname']; ?></td>
      <td><?php echo $row['middlename']; ?></td>
			<td><?php echo $row['suffix']; ?></td>
      <td><?php echo $row['qualification_degree']; ?></td>
			<td><?php echo $row['course_specialization']; ?></td>
      <td><?php echo $row['other_qualification']; ?></td>
			<td>
				<a href="update_form.php?update1= <?php echo $row['account_id']; ?>" ><button type="submit" class="button3" > Update</button> </a>
			</td>
		</tr>
	<?php } ?>
  </tbody>
</table>
<?php
 }elseif($name == null)
 {

   echo "Please Input Last Name/ Training Course";

   ?>
   <br>
   <br>


 <?php
 }else {
  echo " $name is not an Instuctor/ Training Course";

   ?>
   <br>
   <br>
   <div class="btnback">
   <a href="index.php"><button type=submit >Back</button></a>        
   </div><?php
 }
}
?>
</center>


</body>
</html>