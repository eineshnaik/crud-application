<?php
require_once("include/db.php");
$SearchQueryParameter=$_GET['id'];
if(isset($_POST['submit']))
{
    
        $ename=$_POST['ename'];
        $ssn=$_POST['ssn'];
        $dept=$_POST['dept'];
        $salary=$_POST['salary'];
        $homeaddress=$_POST['homeaddress'];
        $ConnectingDB;
        $sql="DELETE FROM emp_record WHERE id='$SearchQueryParameter'";
        $Execute=$ConnectingDB->query($sql);

        if($Execute)
        {
            echo '<script>window.open("view_from_database.php?id=Record Deleted Successfully","_self")</script>';
        }
       
        
   

}
?>

<html>
    <head>
    	<title>Update Data into Database</title>
    	<link rel="stylesheet" href="include/style.css">
    </head>

    <body>
        <?php
        $ConnectingDB;
        $sql="SELECT * FROM emp_record WHERE id='$SearchQueryParameter'";
        $stmt=$ConnectingDB->query($sql);

        while($DataRows=$stmt->fetch())
        {
            $id=$DataRows['id'];
            $ename=$DataRows['ename'];
            $ssn=$DataRows['ssn'];
            $department=$DataRows['dept'];
            $salary=$DataRows['salary'];
            $homeaddress=$DataRows['homeaddress'];
        }
        ?>
    	<div>
    		<form class="" action="delete.php?id=<?php echo $SearchQueryParameter; ?>" method="POST">
    			<fieldset>
    				<span class="fieldinfo">Employee Name:</span><br>
    				<input type="text" name="ename" value="<?php echo $ename;  ?>"/><br>

    				<span class="fieldinfo">Social Security Number:</span><br>
    				<input type="text" name="ssn" value="<?php echo $ssn;  ?>"/><br>

    				<span class="fieldinfo">Department:</span><br>
    				<input type="text" name="dept" value="<?php echo $department;  ?>"/><br>

    				<span class="fieldinfo">Salary:</span><br>
    				<input type="text" name="salary" value="<?php echo $salary;  ?>"/><br>

    				<span class="fieldinfo">Home Address::</span><br>
    				<textarea name="homeaddress" rows="8" cols="80"> <?php echo $homeaddress;  ?> </textarea><br>

    				<input type="submit" name="submit" value="delete"/>
    				
    			</fieldset>
    		</form>
    	</div>
    </body>
</html>