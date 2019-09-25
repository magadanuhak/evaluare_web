<?
if(!empty($_POST['name'])) {
	
	$query = "INSERT INTO employees set name = '{$_POST['name']}', phone = '{$_POST['phone']}'";
	$query = mysqli_query($connection, $query);
	if($query){
		$employee_id = mysqli_insert_id($connection);
		$values = [];
		
		foreach ($_POST['departments'] as $department_id) {
			$values[] = "({$employee_id} , {$department_id} )";
		}
		$values = implode(", ", $values);
		
		
		if(mysqli_query($connection, "
			INSERT INTO dep_emp (employee_id, department_id)
			VALUES {$values}"
		)) {
			echo "Adaugat cu succes!";
		} else {
			echo $values;
		}
	} else{
	    echo "eroare de inserare";
    }

	
	
} else {
?>
<form action="" method="post">
	Nume angajat <input type="text" name="name">
	<br>
	Virsta <input type="text" name ="phone"><br>
	Departament <br>
	<select name="departments[]" multiple>
	 	<?php
	 		$result = mysqli_query($connection, "SELECT * FROM departments");
	 		while ($row = mysqli_fetch_assoc( $result)) { ?>
		
	 			<option value="<?=$row['id']?>"><?=$row["name"]?></option>
	 			<?
	 	
	 		}
	 	 ?>
	</select>
	<a href="index.php?page=new_department">Adauga Departament</a>
	<br>
	<input type="submit" value="adauga angajat">
</form>

<?php
}
?>