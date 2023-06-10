<?php
    $conn = mysqli_connect("localhost", "root", "", "dane");
    $result = mysqli_query($conn, "SELECT imie, nazwisko, opis, zdjecie FROM osoby WHERE Hobby_id in (1, 2, 6);");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista przyjaciół</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="baner">
        <h1>Portal Społecznościowy - moje konto</h1>
        <?php
        session_start();
        $imie = "imie";
        $nazwisko = "nazwisko";
        if(isset($_SESSION["imie"]) && isset($_SESSION["nazwisko"]))
        {
            $imie = $_SESSION["imie"];
            $nazwisko = $_SESSION["nazwisko"];
        }
        else{
            header("Location: login.php");
        }
        echo "<h1>Portal Społecznościowy - $imie $nazwisko</h1>";
        session_destroy();
        ?>
    </div>
    <div id="glowny">
        <h2>Moje Zainteresowania</h2>
        <ol>
            <li>muzyka</li>
            <li>film</li>
            <li>komputery</li>
        </ol>
        <h2>Moi znajomi</h2>
        <?php  
            while($row = mysqli_fetch_array($result))
            {
                echo 
                "
                <div class=blok>
                    <div class=zdjecie>
                        <img src=$row[zdjecie] alt=przyjaciel>
                    </div>
                    
                    <div class=opis>
                        <h3>$row[imie] $row[nazwisko]</h3>
                        <p>Ostatni wpis: $row[opis]</p>
                    </div>
                </div>
                <hr>
                ";
            } 
        ?>
    </div>
    <div id="stopka1">
        Stronę wykonał: XYZ
    </div>
    <div id="stopka2">
        <a href="ja@portal.pl">napisz do mnie</a>
    </div>
</body>
</html>