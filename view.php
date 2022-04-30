<?php
include("includes/background.php");
include("includes/db_connect.php");
?>
<html>
    <body>
        <div id="main">
            <table border="1px" style="color:black;margin:10px">
                <tr style="background-color: #0E4456; color: white">
                    <td>Student ID</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Section</td>
                    <?php
                    $query = mysql_query("select * from working_days");
                    $result = mysql_fetch_array($query);
                    while($element = each($result)){
                        if(is_int($element['key']) || $element['key'] == 'student_id'){
                            continue;
                        }
                        echo "<td>{$element['key']}</td>";
                    }
                    ?>
                </tr>
            <?php
            if($section_set){
                $stud_select_query = mysql_query("select * from students where section = {$section} order by full_name asc");
            }
            else{
                $stud_select_query = mysql_query("select * from students order by section, full_name asc");
            }
            while($stud_select_fetch = mysql_fetch_array($stud_select_query)){
            ?>
            <tr <?php 
                if($stud_select_fetch[6] == 1){
                    $is_DO = true;
                    echo "style=\"background-color:gray;\"";
                }
                else{
                    $is_DO = false;
                }
                ?>>
                <?php
                for($i = 1; $i < 6; $i++){
                    if($i == 4){
                        continue;
                    }
                ?>
                <td>
                    <?php
                    echo $stud_select_fetch[$i];
                    ?>
                </td>
                <?php
                    }
                ?>
                <?php
                $day_status_query = mysql_query("select * from working_days where student_id = $stud_select_fetch[0]");
                $day_status_result = mysql_fetch_array($day_status_query);
                for ($i = 1; $i < 64; $i++){
                    if($stud_select_fetch[6] == 1){
                        echo "<td>DO</td>";
                    }
                    else{
                        echo "<td>$day_status_result[$i]</td>";
                    } 
                }
                ?>
                </tr>
                <?php
                    }
                ?> 
            </table>
        </div>
    </body>
</html>