<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("location:index.php");
    exit;
}
?>
<?php 
include("includes/background.php");
include("includes/db_connect.php");
?>
<?php
$name = $_GET['name'];
?>

<html>
    <body>
        <div id="main">
            <?php
            $columns = array('id', 'student_id', 'full_name', 'section', 'DO');
            $get_search_query = mysql_query("select ".implode(', ', $columns)." from students where full_name = $name or stud_first_name = $name or stud_last_name = $name");
            $num_results = mysql_num_rows($get_search_query);
            ?>
            <h1 style="color: #0E4456">Search Result: <?php echo $num_results ?> match<?php if($num_results != 1){echo "es";}?> found</h1>
            <hr style="width: 100%;"/>
            <?php
            while($get_search_result = mysql_fetch_array($get_search_query)){
            ?>
            <h2>Name: <?php echo $get_search_result[2];?></h2>
            <h2>ID Number: <?php echo $get_search_result[1];?></h2>
            <h2>Section: <?php echo $get_search_result[3];?></h2>
            <?php
            if($get_search_result[4] == 1){
            ?>
            <h2>Status: Drop Out</h2>
            <?php
                }
            else{
                $status_query = mysql_query("select * from working_days where student_id=$get_search_result[0]");
                $status_result = mysql_fetch_array($status_query);
                $absent_count = 0;
                $present_count = 0;
                $late_count = 0;
                $permission_count = 0;
                for($i = 0; $i < 64; $i++){
                    if($status_result[$i] == 'absent'){
                        $absent_count += 1;
                    }
                    else if($status_result[$i] == 'present'){
                        $present_count += 1;
                    }
                    if($status_result[$i] == 'late'){
                        $late_count += 1;
                    }
                    if($status_result[$i] == 'permission'){
                        $permission_count += 1;
                    }
                }
            ?>
            <h2>Absents: <?php echo $absent_count; ?> | Pesents: <?php echo $present_count; ?> | Permissions: <?php echo $permission_count; ?> | Late <?php echo $late_count; ?></h2>
            <?php
            }
            ?>
            <hr style="width: 100%;"/>
            <?php
            }
            ?>
        </div>
    </body>
</html>