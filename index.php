<?php

class Interview
{
	public $title = 'Interview test';
}

$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';

$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

$person = $_POST['person']; //it's good practice to check if there's a value being posted before assigning it to a variable with the isset().

//print_r($person);

//initiates object to get title from the class Interview.
$Interview = new Interview();
$title = $Interview ->title;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interview test</title>
	<style>
		body {font: normal 14px/1.5 sans-serif;}
	</style>
</head>
<body>

	<h1><?=$title;?></h1>

	<?php
	// Print 10 times
	for ($i=0; $i<10; $i++) { //won't run because 10 !< 0
		echo '<p>'.$lipsum.'</p>'; // fixed concatenation
	}
	?>
	<hr>

	<form method="post" action="<?=$_SERVER['REQUEST_URI'];?>"> <!-- using a get instead of a post when submitting person -->
		<p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>
		<p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>
		<p><label for="email">Email</label> <input type="text" name="person[email]" id="email"></p>
		<p><input type="submit" value="Submit" /></p>
	</form>

	<?php if (isset($person)): // check if variable is set?>
		<p><strong>Person</strong> <?=$person['first_name'];?>, <?=$person['last_name'];?>, <?=$person['email'];?></p>
	<?php endif; ?>

	<hr>

	<table>
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($people as $person ): ?>
				<tr>
					<td><?=$person['first_name']//$person->first_name; //accessing this as an object instead of an array value?></td>
					<td><?=$person['last_name']//$person->last_name;?></td>
					<td><?=$person['email']//$person->email;?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>