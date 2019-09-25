<?
    $curr_empl = "";
if(!empty($_GET['id'])){
    $curr_empl = mysqli_query($connection, "SELECT * FROM employees WHERE id = {$_GET['id']} ");
    $curr_empl = mysqli_fetch_assoc($curr_empl);
}
if(!empty($_POST['name'])) {
	
	$query = "UPDATE employees set name = '{$_POST['name']}', phone = '{$_POST['phone']}' WHERE id = {$_POST['id']}";
	$query = mysqli_query($connection, $query);

} else {
?>
<form action="" method="post">
    <input type="hidden" name="id" value="<?=$curr_empl['id']?>">
	Nume angajat <input type="text" name="name" value="<?=$curr_empl['name']?>">
	<br>
	Telefon <input type="text" name ="phone" value="<?=$curr_empl['phone']?>"><br>
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
	<input type="submit" value="Modifica angajat">
</form>

<?php
}
?>