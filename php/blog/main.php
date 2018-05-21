

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

</style>
    <link rel="stylesheet" type="text/css" href="index.css">       
</head>
<body>
    <h1>Read and Write your heart out!!</h1>
    <br><br><br>
    <a href = "write.php" class="red">Write here</a>
    <a href = "view.php" class="green">View your post</a><br><br><br>
    <?php
        $sql = "SELECT content,create_date FROM POST1";
        $result = mysqli_query($conn,$sql);
      //  echo "<table border='1'>";
      //  echo "<tbody>";
      //  echo "<th>Content</th><th>Date</th>";
       while( $row = mysqli_fetch_assoc($result))
       {
        echo "<fieldset  style=min-height:70px>";
        echo "<legend>". $row['create_date']."</legend>";
        echo $row['content'];
       
        echo "</fieldset><br><br>";
         
           
         
          // echo "<tr>";
          // echo "<td>".$row['content']."</td>";
          // echo "<td>".$row['create_date']."</td>";
          // echo "</tr>";
        
          
       }
      // echo "</tbody>";
      // echo "</table>";
       

    ?>

</body>
</html>
