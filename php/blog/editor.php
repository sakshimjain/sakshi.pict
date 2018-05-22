<?php
/**
 * Created by PhpStorm.
 * User: sakshi
 * Date: 2/5/18
 * Time: 6:22 PM
 */
session_start();
if(empty($_SESSION["email"]))
{
    echo "Access denied";
    exit;
}
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
    <h1>Something can be improved!!</h1>
    <br><br><br>
    <a href = "write.php" class="red">Write here</a>
    <a href = "view.php" class="green">View your post</a><br><br><br>
    <?php
        $a=$_SESSION["email"];
        $sql = "SELECT id FROM USER1 WHERE email = '$a'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $q=$row["id"]; 
       

        $sql = "SELECT title,content,create_date,id,user_id FROM POST1";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        echo "<table border='1'>";
        echo "<tbody>";
        echo "<th>Title</th><th>Content</th><th>Date</th><th>Edit</th>";
        echo "<tr>";
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['content']."</td>";
        echo "<td>".$row['create_date']."</td>";
           //echo "<td>"."<a href='edit.php" . "' />".Edit."</a>"."</td>";
         //  echo "<td>".'<a href="edit.php?id='$row['id'] . '" />".Edit."</a>"."</td>";
         if($row['user_id']==$q)
         {
         echo "<td>".'<a href="edit.php?id='.$row['id'].'">'.Edit.'</a>'."</td>";
         }
           echo "</tr>";
       while( $row = mysqli_fetch_assoc($result))
       {
           
         
           
           
           echo "<tr>";
           echo "<td>".$row['title']."</td>";
           echo "<td>".$row['content']."</td>";
           echo "<td>".$row['create_date']."</td>";
           //echo "<td>"."<a href='edit.php" . "' />".Edit."</a>"."</td>";
         //  echo "<td>".'<a href="edit.php?id='$row['id'] . '" />".Edit."</a>"."</td>";
         
         if($row['user_id']==$q)
         {
            echo "<td>".'<a href="edit.php?id='.$row['id'].'">'.Edit.'</a>'."</td>";
         }
           echo "</tr>";
           
          
          
       }
       echo "</tbody>";
       echo "</table>";

    ?>
    <br><br>
    <a href = "logout.php">Logout</a>
</body>
</html>
