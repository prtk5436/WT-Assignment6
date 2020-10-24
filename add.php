<html>
<head>
    <title>Add Data</title>
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
    
   
 
    <form  method="post" name="form1">
        <table  id="dataTable" width="50%" class="table table-bordered table-dark table-hover">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr> 
                <td>Age</td>
                <td><input type="text" name="age"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit"class="btn btn-danger btn-block" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

</body>

<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
        
    // checking empty fields
    if(empty($name) || empty($age) || empty($email)) {                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");
        
        //display success message
        echo "<font color='green'><center>Data added successfully!!</center>";
        echo "<br/><center><a href='index.php'><button style=\"width:20%\">View Result</button></a></center>";
    }
}
?>  
 </html>