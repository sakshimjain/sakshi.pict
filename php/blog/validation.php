<?php
session_start();

if(isset($_REQUEST['submit']))
{

    $servername = "localhost";                                      //connecting to sql
    $username = "root";
    $pswd = "3135sakshi";
    $database = "BLOG";
// Create connection
    $conn = new mysqli($servername, $username, $pswd , $database);
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $_SESSION["email"]="$email";
    $_SESSION["password"]="$password";
    $_SESSION["content"]="";
    
   
    $sql =  "SELECT email,password,role_id,id FROM USER1 WHERE email = '$email' and password = SHA1('$password')";
   // $sql = "SELECT password FROM USER1"

    $result = mysqli_query($conn, $sql);                            //The mysqli_query() function performs a query against the database
   
    // $result = $conn->query("SELECT name FROM Employee WHERE name = '$name'");
    if (!$row = mysqli_fetch_assoc($result)) {                          //The mysqli_fetch_assoc() function fetches a result row as an associative array.  printf ("%s (%s)\n",$row["Lastname"],$row["Age"]);
        echo "Your username or password  is incorrect!";
        $_SESSION["role_id"]=$row["role_id"];
        $_SESSION["id"]=$row["id"];
       
    }
    else
    {
        $_SESSION["id"]=$row["id"];
       
        $_SESSION["role_id"]=$row["role_id"];
       
          if( $row["role_id"] == '3')
          {
              header("Location: editor.php");
              exit;
          }
          if($row["role_id"] == '1')
          {
              echo "Login Successful";
              header("Location: index.php");
              exit;
          }
          if($row["role_id"] == '2')
          {
              echo "Login Successful";
              header("Location: editor.php");
              exit;
          }
    }
  
  

}
?>



