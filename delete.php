<?php
include "connection.php";
if($_GET['delete']){
    $delete_id=$_GET['delete'];
    $sql="DELETE FROM fest WHERE id='$delete_id'";
    $delete_data=mysqli_query($conn,$sql);
    header("location:index.php");
}
?>