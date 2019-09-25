<?
$result = mysqli_query($connection, "SELECT  employees.id as employee_id, 
        employees.name as employee_name,
        employees.phone as employee_phone,
        GROUP_CONCAT(departments.name ORDER BY departments.name) departments
FROM    employees
        INNER JOIN dep_emp 
            ON employees.id = dep_emp.employee_id 
        INNER JOIN departments 
            ON dep_emp.department_id = departments.id
GROUP   BY employees.id, employees.name
");
?>
<table border="1">
	<tr>
		<td>Nume</td>
		<td>Telefon</td>
		<td>Departament</td>
		<td>Stergere</td>
		<td>Editare</td>
	</tr>
	<? while($employee = mysqli_fetch_assoc($result)){?>

	<tr>
		<td><?= $employee['employee_name']?></td>
		<td><?= $employee['employee_phone']?></td>
		<td><?= $employee['departments']?></td>
		<td><a href="?page=delete&id=<?=$employee['employee_id'] ?>">X</a></td>
		<td><a href="?page=edit_employee&id=<?=$employee['employee_id'] ?>">Modifica</a></td>
	</tr>
<? }?>