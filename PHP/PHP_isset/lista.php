<?php
    session_start();
    if (!isset($_SESSION["zalogowany"])) {
        header("Location: login.php");
        return;
    }
?>
<!DOCTYPE html>
<html lang = "pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista przyjaciół</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div class = "banner">
        <h1>Portal Społecznościowy - moje konto</ht>
    </div>
    <div class = "main">
        <h2>Moje zainteresowania</h2>

        <ul>
            <li>muzyka</li>
            <li>film</li>
            <li>komputery</li>
        </ul>

        <h2>Moi znajomi</h2>

        <?php
            $con = mysqli_connect("localhost", "root", "", "dane");
            $res = mysqli_query($con, "SELECT imie, nazwisko, opis, zdjecie FROM osoby WHERE Hobby_id IN (1, 2, 6)");

            while ($row = mysqli_fetch_object($res)) {
                echo "
                <div class = 'pole'>
                    <img src = 'images/$row->zdjecie' alt = 'przyjaciel'>
                    <div class = 'opis'>
                        <h3>$row->imie $row->nazwisko</h3>
                        <p>Ostatni wpis: $row->opis</p>
                    </div>
                </div>
                <hr style = 'clear:both' class = 'linia'>
                ";
            }

            mysqli_close($con);
        ?>
    </div>
    <div class = "jeden">
        Strone wykonał: ja
    </div>
    <div class = "dwa">
        <a href = "ja@portal">napisz do mnie</a>
        <a href="logout.php">Log out</a>
    </div>
</body>
</html>