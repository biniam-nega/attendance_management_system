<?php
include("includes/db_connect.php");
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
    $day = $all_days[$i];
    $query = mysql_query("ALTER TABLE working_days ADD $day VARCHAR(10) null");
    if(!$query){
        die("Query failed");
    }
}
?>