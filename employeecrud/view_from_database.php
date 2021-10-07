<?php
require_once("include/db.php");
?>

<html>
    <head>
    	<title>view into database</title>
    	<link rel="stylesheet" href="include/style.css">
    </head>

    <body>
        <h2 class="success"><?php echo @$_GET['id']; ?></h2>

        <div>
            <fieldset>
                <form action="view_from_database.php" method="GET">
                    <input type="text" name="search" value="" placeholder="search by name or ssn" />
                    <input type="submit" name="searchbutton" value="searchrecord"/>
                </form>
            </fieldset>
        </div>

        <?php
        if(isset($_GET['searchbutton']))
        {
            $ConnectingDB;
            $search=$_GET['search'];
            $sql ="SELECT * FROM emp_record WHERE ename=:searcH OR ssn=:searcH";
            $stmt=$ConnectingDB->prepare($sql);
            $stmt->bindValue(':searcH',$search);
            $stmt->execute();
            while($DataRows= $stmt->fetch())
            {
                $id=$DataRows['id'];
                $ename=$DataRows['ename'];
                $ssn=$DataRows['ssn'];
                $department=$DataRows['dept'];
                $salary=$DataRows['salary'];
                $homeaddress=$DataRows['homeaddress'];

        ?>
                <div>

                    <table width="1000" border="5" align="center">
                        <caption>Search Result</caption>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>SSN</th>
                            <th>Department</th>
                            <th>Salary</th>
                            <th>Home Address</th>
                            <th>Search Again</th>
                        </tr>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $ename; ?></td>
                            <td><?php echo $ssn; ?></td>
                            <td><?php echo $department; ?></td>
                            <td><?php echo $salary; ?></td>
                            <td><?php echo $homeaddress; ?></td>
                            <td><a href="view_from_database.php">Search Again</a></td>
                        </tr>
                    </table>
                </div>


        <?php  } //ending of while loop
        } //ending of submit button
        ?>

        <table width="1000" border="5" align="center">
            <caption>View From Database</caption>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>SSN</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Homeaddress</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php
            $ConnectingDB;
            $sql="SELECT * FROM emp_record";
            $stmt=$ConnectingDB->query($sql);

            while($DataRows=$stmt->fetch()){
                $id=$DataRows['id'];
                $ename=$DataRows['ename'];
                $ssn=$DataRows['ssn'];
                $department=$DataRows['dept'];
                $salary=$DataRows['salary'];
                $homeaddress=$DataRows['homeaddress'];
            ?>

            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $ename; ?></td>
                <td><?php echo $ssn; ?></td>
                <td><?php echo $department; ?></td>
                <td><?php echo $salary; ?></td>
                <td><?php echo $homeaddress; ?></td>
                <td><a href="update.php?id=<?php echo $id; ?>">Update</a></td>
                <td><a href="delete.php?id=<?php echo $id; ?>">Delete</a></td>
            </tr>
        <?php } ?>
        </table>
    	<div>
    		
    	</div>
    </body>
</html>