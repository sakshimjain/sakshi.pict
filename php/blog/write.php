

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
// define variables and set to empty values
$fnameErr = $emailErr = $snameErr = $websiteErr = "";
$title = $content = $image = $role_id = $password = "";
if(empty($_SESSION["email"]))
{
    echo "Access denied";
    exit;
}
$a=$_SESSION["email"];
$sql = "SELECT id FROM USER1 WHERE email = '$a'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$q=$row["id"]; 
$_SESSION["id"]="$q";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["content"])) {
        $contentErr = "Field is required";
    } else {
        $content = test_input($_POST["content"]);
    }

   
    

    if (empty($_POST["title"])) {
        $nameErr = "";
    } else {
        $title = test_input($_POST["title"]);
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

    if (empty($_POST["image"])) {
        $nameErr = "";
    } else {
        $image = test_input($_POST["image"]);
    }

    $sql = "INSERT INTO POST1(content,image,title,create_date,update_date,user_id) VALUES ('$content','$image','$title',CURDATE(),NULL,'$q')";
      if ($conn->query($sql) == TRUE) 
      {
           echo "Your Post Posted :)";
      } 
      else
      {
        echo "Something went wrong:(";
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
.Large
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

<form action="write.php" method="post">

    <h1> Write your heart out!!</h1>
    <!--Content: <input type="text"  class="Large" name="content" value ="<?php echo $content ?>" align="middle">-->
    Content: <textarea name="content" rows="20" cols="80" ></textarea>
    <span class="error">* <?php echo $contentErr;?></span>
    Max 900 Characters!!<br><br><br>
    Title: <input type="text" name="title"  align="middle">
    <span class="error">* <?php echo $contentErr;?></span><br><br><br>
    Image: <input type="text" name="image" align="middle"><br><br><br>
    <input type="submit" name="Submits"><br><br><br>
    <br><br>
    <a href = "logout.php">Logout</a>


  
</form>
<br>


</body>
</html>

