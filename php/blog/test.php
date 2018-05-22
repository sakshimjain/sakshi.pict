

<?php
/**
 * Created by PhpStorm.
 * User: sakshi
 * Date: 2/5/18
 * Time: 6:22 PM
 */

$servername = "localhost";                                      //connecting to sql
$username = "root";
$password = "3135sakshi";
$database = "BLOG";
// Create connection
$conn = new mysqli($servername, $username, $password , $database);
// define variables and set to empty values
$fnameErr = $emailErr = $snameErr = $websiteErr = "";
$fname = $email = $sname = $role_id = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["fname"])) {
        $fnameErr = "Field is required";
    } else {
        $fname = test_input($_POST["fname"]);
    }

    if (empty($_POST["sname"])) {
        $snameErr = "Name is required";
    } else {
        $sname = test_input($_POST["sname"]);
    }
    

    if (empty($_POST["email"])) {
        $nameErr = "";
    } else {
        $email = test_input($_POST["email"]);
    }


    if (empty($_POST["password"])) {
        $nameErr = "";
    } else {
        $password = test_input($_POST["password"]);
    }

    if (empty($_POST["role_id"])) {
        $nameErr = "";
    } else {
        $role_id = test_input($_POST["role_id"]);
    }
    

  
        if($role_id == 1)
        { 
        
            $sql = "INSERT INTO USER1 (fname,sname,email,password,status,role_id) VALUES ('$fname','$sname','$email',SHA1('$password'),'active','1')";
        
        }
        if($role_id == 3)
        $sql = "INSERT INTO USER1 (fname,sname,email,password,status,role_id) VALUES ('$fname','$sname','$email',SHA1('$password'),'active','3')";

        if ($conn->query($sql) === TRUE)//performs sql query on server to insert the values
        {
            echo "Cheers!! Registered Successfully";
        }


   
}



function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<html>
<style>
a {
    color: grey;
}


</style>
<head>
    <link rel="stylesheet" type="text/css" href="index.css"> 
       
</head>
<body>

<form action="test.php" method="post">
   
    <h1>Register to watch tv series for free !!</h1>
    Name: <input type="text" name="fname" value ="<?php echo $fname ?>" align="middle">
    <span class="error">* <?php echo $nameErr;?></span><br><br><br>
    Surname: <input type="text" name ="sname" value ="<?php echo $sname ?>" align="middle"><br><br><br>
    E-mail: <input type="email" name="email" value ="<?php echo $email ?>"><br><br><br>
    Password: <input type="password" name = "password">
    <span class="error">* <?php echo $nameErr;?></span><br><br><br><br><br><br>
    <input type="radio" name="role_id" value="1">User
    <input type="radio" name="role_id" value="3">Editor<br><br><br>
    <input type="submit" name="Submit"><br><br>
   
   
</form>
<br>
<p>Please Login to continue!!<a href="login.php">Login</a></p> 

</body>
</html>

