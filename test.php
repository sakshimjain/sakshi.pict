

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
$database = "INFORMATION";
// Create connection
$conn = new mysqli($servername, $username, $password , $database);
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $nameErr = "";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["contact"])) {
        $nameErr = "";
    } else {
        $contact = test_input($_POST["contact"]);
    }

    if (empty($_POST["gender"])) {
        $nameErr = "";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["age"])) {
        $nameErr = "";
    } else {
        $age = test_input($_POST["age"]);
    }

    if (empty($_POST["password"])) {
        $nameErr = "";
    } else {
        $password = test_input($_POST["password"]);
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
<body>

<form action="test.php" method="post">

    <h1> Registration</h1>
    Name: <input type="text" name="name" value ="<?php echo $name ?>" align="middle">
    <span class="error">* <?php echo $nameErr;?></span><br><br><br>
    E-mail: <input type="email" name="email" value ="<?php echo $email ?>"><br><br><br>
    Age: <input type="number" name="age" value ="<?php echo $age ?>"><br><br><br>
    Contact No: <input type="tel" name="contact" value ="<?php echo $contact ?>">
    <span class="error">* <?php echo $nameErr;?></span><br><br><br>
    Password: <input type="password" name = "password"><br><br><br>

    <input type="radio" name="gender" value="F">Female
    <input type="radio" name="gender" value="M">Male
    <input type="radio" name="gender" value="O">Other<br><br><br>
    <input type="submit" name="Submit"><br>

    <?php
            $sql = "USE INFORMATION";
            $sql = "INSERT INTO Employee (name,email,contact,gender,age,password) VALUES ('$name','$email','$contact','$gender','$age','$password')";

            if ($conn->query($sql) === TRUE)
            {
                echo "Entry successfully";
            }
    ?>
</form>


</body>
</html>

