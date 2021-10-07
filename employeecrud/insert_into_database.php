<?php
require_once("include/db.php");
if(isset($_POST['submit']))
{
    if(!empty($_POST['ename']) && !empty($_POST['ssn']))
    {
        $ename=$_POST['ename'];
        $ssn=$_POST['ssn'];
        $dept=$_POST['dept'];
        $salary=$_POST['salary'];
        $homeaddress=$_POST['homeaddress'];
        $ConnectingDB;
        $sql=" INSERT INTO emp_record(ename,ssn,dept,salary,homeaddress)
        VALUES(:enamE,:ssN,:depT,:salarY,:homeaddresS)";
        $stmt=$ConnectingDB->prepare($sql);
        $stmt->bindValue(':enamE',$ename);
        $stmt->bindValue(':ssN',$ssn);
        $stmt->bindValue(':depT',$dept);
        $stmt->bindValue(':salarY',$salary);
        $stmt->bindValue(':homeaddresS',$homeaddress);
        $Execute=$stmt->execute();
        if($Execute)
        {
            echo '<span class="success">Record has been added Successfully</span>';
        }
       
        
    }
    else
    {
        echo "<span class='fieldinfoheading'>add name and social security number</span>";
    }

}
?>

<html>
    <head>
    	<title>insert into database</title>
    	<link rel="stylesheet" href="include/style.css">
    </head>

    <body>
    	<div>
    		<form class="" action="insert_into_database.php" method="POST">
    			<fieldset>
    				<span class="fieldinfo">Employee Name:</span><br>
    				<input type="text" name="ename"/><br>

    				<span class="fieldinfo">Social Security Number:</span><br>
    				<input type="text" name="ssn"/><br>

    				<span class="fieldinfo">Department:</span><br>
    				<input type="text" name="dept"/><br>

    				<span class="fieldinfo">Salary:</span><br>
    				<input type="text" name="salary"/><br>

    				<span class="fieldinfo">Home Address::</span><br>
    				<textarea name="homeaddress" rows="8" cols="80"></textarea><br>

    				<input type="submit" name="submit" value="submit"/>
    				
    			</fieldset>
    		</form>
    	</div>
    </body>
</html>