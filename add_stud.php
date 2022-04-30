<?php
include("includes/db_connect.php");
include("includes/background.php");
?>
<?php
$success = false;
if(isset($_POST['add'])){
    if(isset($_POST['stud_id']) && isset($_POST['lname']) && isset($_POST['fname']) && $_POST['section'] != 'select section'){
        $f_name = $_POST['fname'];
        $l_name = $_POST['lname'];
        $section = $_POST['section'];
        $student_id = $_POST['stud_id'];
        $full_name = $f_name ." ". $l_name;
        $add_query1 = mysql_query("insert into students (student_id, stud_first_name, stud_last_name, full_name, section) values('$student_id', '$f_name', '$l_name', '$full_name', '$section')");
        if(!$add_query1){
            die("Query failed".mysql_error());
        }
        $select_student_query = mysql_query("select ID from students where student_id = '$student_id'");
        if(!$select_student_query){
            die("Query failed".mysql_error());
        }
        $select_student_result = mysql_fetch_array($select_student_query);
        $student_id = $select_student_result[0];
        $add_query2 = mysql_query("insert into working_days (student_id) values($student_id)");
        if(!$add_query2){
            die("Query failed".mysql_error());
        }
        $success = true;
    }
}
?>
<html>
    <body>
        <div id="main">
            <form action="" method="post">
                <fieldset>
                    <legend>Add Student</legend>
                    <label>First Name</label>
                    <input type=text name=fname /><br/><br/>
                    <label>Last Name</label>
                    <input type=text name=lname /><br/><br/>
                    <label>Student ID</label>
                    <input type=text name=stud_id /><br/><br/>
                    <label>Section</label>
                    <select name="section" id="section_select">
                        <option>Select section</option>
                    <?php
                    for ($i = 1; $i <= 24; $i++){
                        $option = "<option name=$i ";
                        $option .=  ">$i</option>";
                        echo $option;
                    }    
                    ?>
                    </select><br/><br/>
                    <button type="submit" name="add">+ Add</button>
                    <?php
                    if($success){
                    ?>
                    <div id="success">
                        <h3>Added Successfully</h3>
                    </div>
                    <?php
                    }
                    ?>
                </fieldset>
            </form>
        </div>
    </body>
</html>