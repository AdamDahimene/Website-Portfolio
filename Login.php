<?php 
    include("database.php");
    session_start();

    if(isset($_SESSION["user"])) {
        header("Location: ./BlogEntry.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/Login.css">
    <title>Adam Dahimene</title>
</head>
<body>
    <header>
        <nav class="flex">
            <a href="Home.html"><h1 class="title">Adam Dahimene </h1></a>
            <ul class="flex">
                <li><a href="About.html" id="button">About me</a></li>
                <li><a href="About.html#experience" id="button">Experience</a></li>
                <li><a href="Skills.html" id="button">Skills</a></li>
                <li><a href="Skills.html#education" id="button">Education</a></li>
                <li><a href="Skills.html#project" id="button">Projects</a></li>
                <li><a href="Blog.php" id="button">Blog</a></li>
            </ul>
        </nav>
    </header>
    
    <fieldset>
        <legend>Login</legend>
        <form action="Login.php" method="post" class="form">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login" id="login">
        </form>
    </fieldset>
</body>
</html>

<?php
    if(isset($_POST["login"])) {
        $sql = "SELECT * FROM users WHERE EMAIL = '".$_POST["email"]."' AND PASSWORD = '".$_POST["password"]."'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["user"] = $row["NAME"];
            $_SESSION["title"] = null;
            $_SESSION["content"] = null;
            header("Location: ./BlogEntry.php");
            exit();
        }
    }

    mysqli_close($conn);
?>