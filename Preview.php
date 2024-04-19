<?php 
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/Blog.css">
    <link rel="stylesheet" href="./css/BlogEntry.css">
    <link rel="stylesheet" href="./css/preview.css">
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

    <main>
        <h2>Blog</h2>
        <?php
            session_start();

            $date = new DateTime('now', new DateTimeZone('Europe/London'));
            $date = $date->format('d-m-Y H:i:s');

            echo "<section>";
                echo "<p id='time'>".$date."</p>";
                echo "<h3>".$_SESSION["title"]."</h3>";
                echo "<p>".$_SESSION["content"]."</p>";
                echo "<hr>";
                echo "</section>";
        ?>

        <h2>Would you like to post this blog?</h2>
        <form action="./Preview.php" method="post" class="preview">
            <div class="preview">
                <input type="submit" name="post" value="Post" id="submit">
                <input type="submit" name="edit" value="Edit" id="reset">
            </div>
        </form>
    </main>
</body>
</html>

<?php
    if(isset($_POST["post"])) {
        $sql = "INSERT INTO posts (TITLE, CONTENT) VALUES ('".$_SESSION["title"]."', '".$_SESSION["content"]."')";
        $result = mysqli_query($conn, $sql);
        $_SESSION["title"] = "";
        $_SESSION["content"] = "";
        header("Location: ./Blog.php");
        exit();
    } else if(isset($_POST["edit"])) {
        header("Location: ./BlogEntry.php");
        exit();
    }
?>