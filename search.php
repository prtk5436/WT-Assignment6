<!DOCTYPE html>
<html>
<head>    
    <title>Homepage</title>
</head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
<body>
<div class="wrapper">
         
        <nav>
            <div class="container">
                <ul>
                    <li><a href="index.php">HOME</a>
                    </li>

                    <li> <a href="add.php">ADD</a> </li>
                    <li> <a href="EditPage.php">EDIT</a> </li>
                    <li> <a href="DeletePage.php">DELETE</a> </li>

                    <li> <a href="search.php">SEARCH</a> </li>            
                    </ul>
            </div>
        </nav>
    <br/><br/>
</div>
<div role="main" class="container">

<form method="post">
<label>Search</label>
<input type="text" name="search" placeholder="search by name">
<br>
<input type="submit" class="btn btn-danger btn-block" name="submit">
	
</form>

</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=test",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `users` WHERE name = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table id="dataTable" width="75%" class="table table-bordered table-dark table-hover">
			<tr>
				<th>NAME</th>
				<th>AGE</th>
				<th>EMAIL</th>
			</tr>
			<tr>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->age;?></td>
				<td><?php echo $row->email;?></td>
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?>