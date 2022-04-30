<?php
include("includes/db_connect.php");
session_start();
if(!isset($_SESSION['admin'])){
    header("location:index.php");
    exit();    
}
if(isset($_POST['add_stud'])){
    header("location:add_stud.php");
}
$section_set = false;
if(isset($_GET['section'])){
    if($_GET['section'] != 'Select section'){
        $section_set = true;
        $section = $_GET['section'];
    }
}
?>
<?php
    if(isset($_POST['search_btn'])){
        if(!empty($_POST['search_txt'])){
            $name = mysql_real_escape_string($_POST['search_txt']);
            header("location:search.php?name=\"$name\"");
            exit;
        }
    }
?>
<html>
    <head>
        <title>EIT Attendance management system</title>
        <link rel=stylesheet type="text/css" href="css/home_css.css"/>
    </head>
    <body>
        <div id="header">
            <h1>EIT Attendance Management System</h1>
            <div id="search_form">
            <form action="" method="post">
                <label style="color:white">Search</label>
                <input type=text name=search_txt />
                <button id="search_button" type="submit" name="search_btn">Search</button>
            </form>
        </div>
        </div>
        <div id="navigation">
            <form>
                <select name="section" id="section_select">
                    <option>Select section</option>
                <?php
                for ($i = 1; $i <= 24; $i++){
                    $option = "<option name=$i ";
                    if($section_set){
                        if($section == $i){
                            $option .= "selected ";
                        }
                    }
                    $option .=  ">$i</option>";
                    echo $option;
                }    
                ?>
                </select>
                <button id=go_button>GO</button>
            </form>
            <br/>
            <ul>
                <li><a href="view.php">View</a></li>
            </ul>
            <ul>
                <li style="color:white"><a href="edit.php">Edit</a></li>
            </ul>
            <form id="add_stud" style="align:center; color:white;" action="" method="post">
                <button type=submit name="add_stud">
                    +student
                </button>
            </form>
        </div>
    </body>
</html>