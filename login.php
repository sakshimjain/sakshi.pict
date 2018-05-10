
<html>
<body>

<form action="aa.php" method="post">

    <h1> Login</h1>
    Name:
    <input type="text" name="name" value ="<?php echo $name ?>" align="middle">
    <span class="error">* <?php echo $nameErr;?></span><br><br><br>
    Password:
    <input type="password" name = "password">
    <span class="error">* <?php echo $passErr;?></span><br><br><br>
    <input type="submit" name="submit" value="Login"><br>


</form>
<P>Not registered yet? <a href="test.php">Register here</a> </P>

</body>
</html>

