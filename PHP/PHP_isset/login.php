<?php
    session_start();

    if (isset($_POST["user"]) && isset($_POST["haslo"])) {
        $user = $_POST["user"];
        $haslo = $_POST["haslo"];
        $sql = mysqli_connect("localhost", "root", "", "dane");

        $res = mysqli_query($sql, "SELECT id FROM users WHERE name='$user' AND password='$haslo'");

        $obj = mysqli_fetch_object($res);
        if ($obj)
            $_SESSION["zalogowany"] = $obj -> id;
        mysqli_close($sql);
    }

    if (isset($_SESSION["zalogowany"])) {
        header("Location: lista.php");
        return;
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Lista przyjaciół</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div class="baner">
        <h1>Portal społecznościowy</h1>
        <form method="POST">
            <input type="text" name="user">
            <input type="password" name="haslo">
            <input type="submit" value="Zaloguj się">
        </form>
    </div>
</body>
</html>