<?php 
    include("database.php");
    if(isset($_GET["month"])) {
        $sql = "SELECT * FROM `posts` WHERE MONTH(TIME) = '".$_GET["month"]."'";
        $result = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT * FROM posts";
        $result = mysqli_query($conn, $sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/Blog.css">
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

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET" class="month">
            <label>Choose a Month:</label>
            <select name="month">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <input type="submit" value="Submit">
        </form>

        <?php
            $rows = array();
            while($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            
            for($i = 0; $i < count($rows); $i++) {
                for($j = 0; $j < count($rows) - $i - 1; $j++) {
                    if($rows[$j]["TIME"] < $rows[$j + 1]["TIME"]) {
                        $temp = $rows[$j];
                        $rows[$j] = $rows[$j + 1];
                        $rows[$j + 1] = $temp;
                    }
                }
            }
            
            foreach($rows as $row) {
                echo "<section>";
                echo "<p id='time'>".$row["TIME"]."</p>";
                echo "<h3>".$row["TITLE"]."</h3>";
                echo "<p>".$row["CONTENT"]."</p>";
                echo "<hr>";
                echo "</section>";
            }

            

        ?>
    </main>
</body>
</html>