<?php
include("includes/background.php");
include("includes/db_connect.php");
?>
<?php
if($section_set){
$stud_select_query = mysql_query("select * from students where section = {$section} order by full_name asc");
}
else{
    $stud_select_query = mysql_query("select * from students order by section, full_name asc");
}
?>
<?php

if(isset($_POST['change'])){
    $count = 0;
    $weekend_days = array();
    for($i = 0; $i < 90; $i++){
        if ($i - ($count * 7) == 4){
            $weekend_days[] = $i;
            $i += 1;
            $weekend_days[] = $i;
            $count++;
        }
    }
    $all_days = array();
    $days_in_month = array(31, 31, 28);
    for ($i = 0; $i < count($days_in_month); $i++){
        for($j = 1; $j < $days_in_month[$i]; $j++){
            $day = "";
            if($i == 0){
                $day .= "Dec_$j"."_2020";
            }
            else if($i == 1){
                $day .= "Jan_$j"."_2021";
            }
            else if($i == 2){
                $day .= "Feb_$j"."_2021";
            }
            $all_days[] = $day;
        }
    }
    $week_days = array();
    for ($i = 0; $i < count($all_days); $i++){
        if (in_array($i, $weekend_days)){
            continue;
        }
        $week_days[] = $all_days[$i];
    }
    while($element = each($_POST)){
        $key = $element['key'];
        if($key == 'change'){
            break;
        }
        $holder = explode('-', $key);
        $status = $_POST[$key];
        $student_id = $holder[1];
        $day = $holder[2];
        $day = $week_days[(int)$day - 1];
        if($status == 'status'){
            continue;
        }
        $update_status_query = mysql_query("update working_days set $day='$status' where student_id=$student_id");
        if(!$update_status_query){
            die("Query failed".mysql_error());
        }
    }
}
?>
<html>
    <body>
        <div id="main">
            <form action="" method=post>
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
                    for ($i = 1; $i <64;){
                        if($stud_select_fetch[6] == 1){
                            echo "<td>DO</td>";
                        }
                        else{
                    ?>
                    <td>
                        <select name="select-<?php echo  $stud_select_fetch[0]. "-". $i?>">
                            <option value="status">Status</option>
                            <option value="present" <?php if($day_status_result[$i] == 'present'){echo "selected";} ?>>present</option>
                            <option value="absent" <?php if($day_status_result[$i] == 'absent'){echo "selected";} ?>>absent</option>
                            <option value="late" <?php if($day_status_result[$i] == 'late'){echo "selected";} ?>>late</option>
                            <option value="permission" <?php if($day_status_result[$i] == 'permission'){echo "selected";} ?>>permission</option>
                        </select>
                    </td>
                    <?php
                        } 
                        $i++;
                    }
                    ?>
                    </tr>
                    <?php
                        }
                    ?> 
                </table>
                <button type="submit" name="change">Change</button>
            </form>
        </div>
    </body>
</html>