<?php
session_start();
require '../templates/connection.php';

if(isset($_POST['save_course']))
{

    $course_title = mysqli_real_escape_string($conn, $_POST['course_title']);
    $number_of_days = mysqli_real_escape_string($conn, $_POST['number_of_days']);
    $mtap_course = $_POST['mtap_course'] ? 1 : 0;
    $implementation = mysqli_real_escape_string($conn, $_POST['implementation']);
    $implementation_year = mysqli_real_escape_string($conn, $_POST['implementation_year']);
    $year_certified = mysqli_real_escape_string($conn, $_POST['year_certified']);

    $query = "
        SELECT * 
        FROM course 
        WHERE course_title='$course_title' 
        AND number_of_days = '$number_of_days'
        AND mtap_course = '$mtap_course'
        AND implementation = '$implementation'
        AND implementation_year = '$implementation_year'
        AND year_certified = '$year_certified'
        ";
    
    $query_run = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($query_run);
    
    if (!$result) {
        $query = "
            INSERT INTO course (course_title,number_of_days,mtap_course,implementation, implementation_year, year_certified) 
            VALUES ('$course_title','$number_of_days','$mtap_course','$implementation', '$implementation_year', '$year_certified')
        ";
        $query_run = mysqli_query($conn, $query);
        
        $_SESSION['message'] = "Course Created";

    } else {
        $_SESSION['message'] = "Something went wrong!";  
    }
    
    header("Location: index.php");
    exit(0);
}



if(isset($_POST['update_course']))
{
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $course_title = mysqli_real_escape_string($conn, $_POST['course_title']);
    $number_of_days = mysqli_real_escape_string($conn, $_POST['number_of_days']);
    $mtap_course = $_POST['mtap_course'] ? 1 : 0;
    $year_certified = mysqli_real_escape_string($conn, $_POST['year_certified']);
    $implementation = mysqli_real_escape_string($conn, $_POST['implementation']);
    $implementation_year = mysqli_real_escape_string($conn, $_POST['implementation_year']);


    $query = "UPDATE course SET course_title='$course_title', number_of_days='$number_of_days', mtap_course='$mtap_course', implementation='$implementation', year_certified = '$year_certified', implementation_year = '$implementation_year' WHERE course_id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Course Updated!";
        header("Location: viewRecord.php?id=$id");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Course Not Updated!";
        header("Location: viewRecord.php?id=$id");
        exit(0);
    }

}


if(isset($_POST['delete_course']))
{
    $id = mysqli_real_escape_string($conn, $_POST['c_id']);

    $query = "DELETE FROM course WHERE course_id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Course Deleted!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Course Not Deleted!";
        header("Location: index.php");
        exit(0);
    }
}


if(isset($_POST['register'])) {
    $course_id = $_POST['course_id'];
    $instructor_id = mysqli_real_escape_string($conn, $_POST['instructor_id']);
    $opening_date = date('Y-m-d', strtotime($_POST['opening_date']));
    $closing_date = date('Y-m-d', strtotime($_POST['closing_date']));

    echo $opening_date . " " . $closing_date;

    $sql = "SELECT * FROM `pool_instructor_details` WHERE instructor_id = $instructor_id";
    $query = mysqli_query($conn, $sql);
    $instructor = mysqli_fetch_assoc($query);

    if(!$instructor) {
        // insert session message about instructor id invalid
        header("location: index.php");
        exit(0);
    }

   $sql = "
        INSERT INTO `registration_course` (course_id,instructor_id, opening_date, closing_date, implementation_nr)
        VALUES ($course_id, $instructor_id, $opening_date, $closing_date, $implementation_nr)";

    $query = mysqli_query($conn, $sql);

    if($query) {
        header("location: viewRecord.php?id=$course_id");
    } else {
        echo "Didnt work";
    }
}
?>