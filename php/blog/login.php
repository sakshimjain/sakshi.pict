
<?php


/*if(isset($_REQUEST['submit']))
{

    $servername = "localhost";                                      //connecting to sql
    $username = "root";
    $pswd = "3135sakshi";
    $database = "BLOG";
// Create connection
    $conn = new mysqli($servername, $username, $pswd , $database);
    $fname = $_REQUEST['fname'];
    $password = $_REQUEST['password'];
    $sql =  "SELECT fname,password FROM USER1 WHERE fname = '$fname' and password = SHA1('$password')";
   // $sql = "SELECT password FROM USER1"
    $result = mysqli_query($conn, $sql);                            //The mysqli_query() function performs a query against the database
    // $result = $conn->query("SELECT name FROM Employee WHERE name = '$name'");
    if (!$row = mysqli_fetch_assoc($result)) {                          //The mysqli_fetch_assoc() function fetches a result row as an associative array.  printf ("%s (%s)\n",$row["Lastname"],$row["Age"]);
        echo "Your username or password  is incorrect!";
    }
    else
    {
          echo "To View All Blogs <a href='main.php'>Click here</a>";
    }
  

}*/
?>

<html>
<head>
<style>
a {
    color: grey;
}
</style>
    <link rel="stylesheet" type="text/css" href="index.css"> 
</head>        
<body>

<form action="validation.php" method="post">

    <h1> Login</h1>
    Email:
    <input type="text" name="email" value ="<?php echo $email ?>" align="middle">
    <span class="error">* <?php echo $nameErr;?></span><br><br><br>
    Password:
    <input type="password" name = "password">
    <span class="error">* <?php echo $passErr;?></span><br><br><br>
    <input type="submit" name="submit" value="Login"><br>


</form>
<P>Not registered yet? <a href="test.php">Register here</a> </P>
<?php include 'validation.php';?>
<br><br>
    <a href = "logout.php">Logout</a>
</body>
</html>
