<?php

    if (isset($_POST["course_reg_id"]))
    {
        $output = '';

        $connect = mysqli_connect('localhost', 'root', '', 'project');
        $query = "SELECT course_title, opening_date, closing_date, lastname, firstname, implementation
                FROM course AS C, registration_course AS R, pool_instructor_details AS P, account_details AS A
                WHERE (C.course_id = R.course_id AND R.instructor_id = P.instructor_id AND P.account_id = A.account_id) AND course_reg_id = '".$_POST["course_reg_id"]."'";
        $result = mysqli_query($connect, $query);

        $output .= '
        <div class="table-responsive">
            <table class="table table-bordered">';
        while($row = mysqli_fetch_array($result))
        {
            $output .= '
                <tr>
                    <td width="40%"><label>Course Title</label></td>
                    <td width="60%">'.$row["course_title"].'</td>
                </tr>
                <tr>
                    <td width="40%"><label>Opening Date</label></td>
                    <td width="60%">'.$row["opening_date"].'</td>
                </tr>
                <tr>
                    <td width="40%"><label>Closing Date</label></td>
                    <td width="60%">'.$row["closing_date"].'</td>
                </tr>
                <tr>
                    <td width="40%"><label>Implementation</label></td>
                    <td width="60%">'.$row["implementation"].'</td>
                </tr>
                <tr>
                    <td width="40%"><label>Instructor</label></td>
                    <td width="60%">'.$row["firstname"].' '.$row["lastname"].'</td>
                </tr> 
            ';
        } 
        $output .= "</table></div>";
        echo $output;

    }
?>