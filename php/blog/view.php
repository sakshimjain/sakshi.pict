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
if(empty($_SESSION["email"]))
{
    echo "Access denied";
    exit;
}




?>

<html>
<head>
<style>


table

{

border-style:solid;

border-width:2px;

border-color:black;

}
td {
    border: 1px solid black;
    text-align: left;
    padding: 8px;
}
.red
{
    color: black;
    float:right;
    position: absolute;
    right:500;
    left:100;
    transition: transform .0s;  
   margin: 0 auto;

}
.red:hover 
{
    -ms-transform: scale(1); /* IE 9 */
    -webkit-transform: scale(1); /* Safari 3-8 */
    transform: scale(1);
}
.green 
{
    color: black;
    float:right;
    position: absolute;
    right:100;
    left:500;
    transition: transform .0s;  
   margin: 0 auto;
}
.green:hover 
{
    -ms-transform: scale(1); /* IE 9 */
    -webkit-transform: scale(1); /* Safari 3-8 */
    transform: scale(1);s
}
</style>
    <link rel="stylesheet" type="text/css" href="index.css">     
      
</head>
<body>
    <h1>You did some awesome work !!</h1>
    <br><br><br>
    <?php
        $a=$_SESSION["email"];
        $sql = "SELECT id FROM USER1 WHERE email = '$a'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $q=$row["id"]; 
        $sql = "SELECT title,content,create_date FROM POST1 WHERE user_id = '$q'";
        $result = mysqli_query($conn,$sql);
      //  echo "<table border='1'>";
     //   echo "<tbody>";
      //  echo "<th>Title</th><th>Content</th><th>Date</th>";
       while( $row = mysqli_fetch_assoc($result))
       {
           
         
        echo "<fieldset style=min-height:70px;>";
        echo "<legend>". $row['title']."</legend>";
        echo $row['content'];
       
        echo "</fieldset><br><br>";
         
         //  echo "<tr>";
         //  echo "<td>".$row['title']."</td>";
         //  echo "<td>".$row['content']."</td>";
         //  echo "<td>".$row['create_date']."</td>";
         //  echo "</tr>";
        
          
       }
      // echo "</tbody>";
     //  echo "</table>";

    ?>
    <br><br>
    <a href = "logout.php">Logout</a>
</body>
</html>
