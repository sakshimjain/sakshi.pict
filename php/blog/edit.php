<?php
/**
 * Created by PhpStorm.
 * User: sakshi
 * Date: 2/5/18
 * Time: 6:22 PM
 */
session_start();
$servername = "localhost";                                      //connecting to sql
$username = "root";
$password = "3135sakshi";
$database = "BLOG";
// Create connection
$conn = new mysqli($servername, $username, $password , $database);
$con=$fnameErr=$id="";

if(empty($_SESSION["email"]) || $_SESSION["role_id"]=='1')
{
    echo "ab";
    echo "Access denied";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    
        if (empty($_POST["con"])) {
        
            $fnameErr = "Field is required";
        } else {
            
            $con = test_input($_POST["con"]);
        }

        if (empty($_POST["ide"])) {
        
            $fnameErr = "Field is required";
        } else {
            
            $ide = test_input($_POST["ide"]);
        }
        

        $sql = "SELECT user_id FROM POST1 WHERE id = '$ide'";
        $result = mysqli_query($conn, $sql);//performs query against database
        $row = mysqli_fetch_assoc($result);//fetches a result row as an associative array
        $a=$row["user_id"];
        if($a != $_SESSION["id"] and  $_SESSION["role_id"]!='2')
        {
           
            echo "Access denied";
            exit;
        }
        $sql = "UPDATE POST1 SET content = '$con' WHERE id='$ide'";
    
        if(mysqli_query($conn, $sql))
        {
            echo "updated successfully";
        }   
    
    
    }
    $id= $_GET['id'];
    $sql = "SELECT user_id FROM POST1 WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);//performs query against database
    $row = mysqli_fetch_assoc($result);//fetches a result row as an associative array
    $a=$row["user_id"];
    if(($a != $_SESSION["id"] and $_SERVER["REQUEST_METHOD"] != "POST" ) and $_SESSION["role_id"]!='2')
    {
        
        echo "Access denied";
        exit;
    }

    $sql = "SELECT content FROM POST1 WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);//performs query against database
    $row = mysqli_fetch_assoc($result);//fetches a result row as an associative array
    $content=$row["content"];

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>

    <html>
    <style><br><br>
    .La    <a href = "logout.php">Logout</a>
    {
        size="35";
        height: 150px;
        Width: 550px;
    
        
    }
    </style>    
    <head>
        <link rel="stylesheet" type="text/css" href="index.css"> 
        
    </head>
    <body>
    <form action="edit.php" method="post">

    <h1> Write your heart out!!</h1>
        
        Content: <textarea name="con" rows="20" cols="80" required="required"><?php echo $content ;?></textarea>
        <!--Content: <input type="text"  class="Large" name="con" value ="<?php// echo $content ?>" align="middle">-->
    
        
        <br><br>
        <input type="hidden"  name="ide" value ="<?php echo $id ?>" align="middle">
        <input type="submit" name="Submits" value="Update"><br><br><br>
        <br><br>
        <a href = "logout.php">Logout</a>




    </form>
    </body>
    </html>
