<?php 
    include("database.php");

    session_start();

    if(!isset($_SESSION["user"])) {
        header("Location: ./Login.php");
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
    <link rel="stylesheet" href="./css/BlogEntry.css">
    <script src="./script.js"></script>
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
                <li><a href="Logout.php" id="button">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <fieldset>
            <legend>Add Blog Post</legend>
            <form action="BlogEntry.php" method="post" class="form" id="blog">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo $_SESSION["title"] ?>" placeholder="Title">
                <br>
                <label for="content">Content:</label>
                <textarea id="content" name="content" placeholder="Enter your text here"><?php echo $_SESSION["content"] ?></textarea>
                <div class="hr">
                    <input type="submit" name="post" value="Post" id="submit">
                    <section id="clear">
                        <input type="reset" name="reset" value="Clear" class="reset" id="reset">
                    </section>
                    <input type="submit" name="preview" value="preview" id="preview">
                </div>
        </fieldset>
    </main>
</body>
</html>

<?php 
    $_SESSION["title"] = null;
    $_SESSION["content"] = null;

    if(isset($_POST["post"])) {

        $sql = "INSERT INTO posts (TITLE, CONTENT) VALUES ('".$_POST["title"]."', '".$_POST["content"]."')";
        $result = mysqli_query($conn, $sql);

        header("Location: Blog.php");
        mysqli_close($conn);
    }

    if(isset($_POST["preview"])) {
        $_SESSION["title"] = $_POST["title"];
        $_SESSION["content"] = $_POST["content"];
        header("Location: Preview.php");
        exit();
    }

    if(isset($_POST["reset"])) {
        echo "clear";
        $_SESSION["title"] = null;
        $_SESSION["content"] = null;
        header("Location: ./BlogEntry.php");
        exit();
    }
?>