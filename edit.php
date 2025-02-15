<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
<div class="edit">
<form method="POST" action="">
    <?php
        include "connection.php";
        if($_GET['edit']){
            $edit_id=$_GET['edit'];
            $sql="SELECT * FROM `fest` WHERE id=$edit_id";
            $edit_data=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($edit_data))
            {
              
                $taskInput=$row['taskInput'];
    
                echo "<input type='text' name='taskInput' value='$taskInput'><br>";
            
            }
        }
    ?>
    <button name="submit">Update</button>
    </form>
    <?php
    if(isset($_POST['submit'])){
        $taskInput = $_POST['taskInput'];
   
        $sql="UPDATE `fest` SET taskInput = '$taskInput' WHERE id = $edit_id";

        //echo $sql;die;
        $edit_insert=mysqli_query($conn,$sql);
        header("location:index.php");
    }
    ?>
    </div>
</body>
</html>