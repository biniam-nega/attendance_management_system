<?php
$is_DO = false;
include("includes/background.php");
include("includes/db_connect.php");
?>
<html>
    <body>
        <div id="main">
            <table border="1px" style="color:black;margin:10px">
                <tr>
                    <td>Student ID</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Section</td>
                    <td>present</td>
                    <td>Late</td>
                    <td>Absent</td>
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
                <td>
                    <?php
                    if($is_DO == true){
                        echo "DO";
                    }
                    else{
                        echo "0";
                    }        
                    ?>
                </td>
                <td>
                    <?php
                    if($is_DO == true){
                        echo "DO";
                    }
                    else{
                        echo "0";
                    }        
                    ?>
                </td>
                <td>
                    <?php
                    if($is_DO == true){
                        echo "DO";
                    }
                    else{
                        echo "0";
                    }        
                    ?>
                </td>
            </tr>
            <?php
            }
            ?>
            </table>
        </div>
    </body>
</html>