<?php
//including the database connection file
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>
 
<html>
<head>    
    <title>Edit Page</title>
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
</div> <div role="main" class="container">
    <table id="dataTable" width="75%" class="table table-bordered table-dark table-hover">
        <tr  >
            
        <td>NAME</td>
            <td>AGE</td>
            <td>EMAIL</td>
            <td>UPDATE</td>
        </tr>''
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['age']."</td>";
            echo "<td>".$res['email']."</td>";    
            echo "<td><a href=\"edit.php?id=$res[id]\"><button style=\"width:80%\">Edit</button></a> </td>";
        }
        ?>
    </table>
</body>
</html>