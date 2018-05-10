
<?php
if(isset($_REQUEST['submit']))
{
    $servername = "localhost";                                      //connecting to sql
    $username = "root";
    $password = "3135sakshi";
    $database = "INFORMATION";
// Create connection
    $conn = new mysqli($servername, $username, $password , $database);
    $name = $_REQUEST['name'];
    $password = $_REQUEST['password'];
    $sql =  "SELECT name,password FROM Employee WHERE name = '$name' and password = '$password'";
    $result = mysqli_query($conn, $sql);                            //The mysqli_query() function performs a query against the database
    // $result = $conn->query("SELECT name FROM Employee WHERE name = '$name'");
    if (!$row = mysqli_fetch_assoc($result)) {                          //The mysqli_fetch_assoc() function fetches a result row as an associative array.  printf ("%s (%s)\n",$row["Lastname"],$row["Age"]);
        echo "Your username or password  is incorrect!";
    }
    else
    {
        echo "You are logged in!";
    }
}
