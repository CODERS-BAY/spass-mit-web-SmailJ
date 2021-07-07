<?php 
require_once "config.php";
$sql = "SELECT SUM(late) AS totalsum FROM members";
$result = $link->query($sql); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['totalsum'];
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>CodersBay - Group-Managment</title>
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="sponsors.php">Sponsors</a>
        <a href="login.php">Login</a>
    </nav>
    <div class="center">
        <h1>Verspätungen</h1>
    </div>
    <div class="container">
        <?php
        require_once "config.php";
        $sql = "SELECT name, late FROM members";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Name</th><th>Verspätungen</th></tr>";
            while($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row["name"]. "</td><td>" . $row["late"]."</td></tr>";
              
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        ?>
    </div>
    <div class="center">
        <h2>Gesamt: <?php echo $sum ?>€</h2>
    </div>
</body>
</html>