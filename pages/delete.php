<?
if(isset($_GET['id'])){
	$sql = mysqli_query($connection, "DELETE FROM employee WHERE id = {$_GET['id']}");
	$sql2= mysqli_query($connection, "DELETE FROM dep_emp WHERE employee_id = {$_GET['id']}");
} else{
	
}


?>