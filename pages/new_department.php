<?
if(!empty($_POST['name'])) {
	
	$query = "INSERT INTO departments set name = '{$_POST['name']}'";
	$query = mysqli_query($connection, $query);
	if($query){
		echo "Adaugat cu succes!";
	}else{
	    echo "Eroare de adaugare";
    }

	
	
} else {
?>
<form action="" method="post">
	Nume deaprtament <input type="text" name="name">
	<br>
	<input type="submit" value="adauga Departament">
</form>

<?php
}
?>