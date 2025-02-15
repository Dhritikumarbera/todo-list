<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <!-- <h2>To-Do List <img src="checklist-1295319_1920.png"></h2> -->
        <div class="todo-list">
        <h2>To-Do List <img src="image.png"></h2>
        <div class="input-container">
            <form action="" method="POST">
            <input type="text" id="taskInput" name = "taskInput" placeholder="Enter task">
            <input type="time" id="taskTime" name="taskTime">
            <button name="task">Add</button>
</form>
       
</div>
</div>

<?php

// Check if the form is submitted
if (isset($_POST['task'])) {
    $taskInput = $_POST['taskInput'];
    $taskTime = $_POST['taskTime'];

    // Insert the task into the database
    $sql = "INSERT INTO `fest` (taskInput, taskTime) VALUES ('$taskInput', '$taskTime')";

    $insert=mysqli_query($conn,$sql);
    if($insert){
        echo "insertion done! !";
    }
    else{
        echo "error";
    }
}
?>
<br>
<div class="fetch">
	<table border="1">
		<tr>
			<th>ID</th>
			
            <th>TASK NAME</th>
			<th>TASK TIME</th>
            <th>ACTION</th>
			
		</tr>
		<?php 
			$sql="SELECT * FROM fest";
			$fetch= mysqli_query($conn,$sql);
			while ($row= mysqli_fetch_assoc($fetch)) {	#loop for printing result
				// code...
				$db_id= $row['id'];
				$db_taskInput= $row['taskInput'];
				$db_taskTime=$row['taskTime'];
				echo "<tr>";	
				echo "<td>$db_id</td>";
				echo"<td>$db_taskInput</td>";
				echo "<td>$db_taskTime</td>";
				
				echo "<td> <a href='edit.php?edit=$db_id'>Edit</a>"; // Edit button with edit.php?id=<user_id>
                echo " | ";
                echo "<a href='delete.php?delete=$db_id'>Delete</a></td>";
				
				echo "</tr>";
			}


		?>
	</table>
 
    </div>
        
    </div>  
</body>
</html>


