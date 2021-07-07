<?php
session_start();

include "config.php";
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(isset($_POST['update'])) {
    $name = $_POST['name'];

    $query = "UPDATE `members` SET late='$_POST[number]' WHERE name='$_POST[name]'";
    $query_run = mysqli_query($link, $query);

    if($query_run) {
        echo '<script> alert("UPDATE") </script>';
    } else {
        echo '<script> alert("ERROR") </script>';
    }
}
?>
 
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        .center{ display: flex; justify-content: center; margin: 2% 0; }
        th, tr{ text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Willkommen, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h1>
    </div>
    <div class="center">
    <p>
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
    <h3>Wer soll bearbeitet werden ?</h3>
    <div class="center">
        <form action="welcome.php" method="POST">
            <input type="text" name="name" placeholder="Name">
            <input type="number" name="number" placeholder="Verspätungen">
            <input type="submit" name="update" value="UPDATE">
        </form>
    </div>
        <a href="reset-password.php" class="btn btn-warning">Passwort zurücksetzen</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </p>
</body>
</html>