<?php
    $conn = mysqli_connect("localhost", "root", "", "dane3"); 
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video on Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div id="baner1">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </div>
    <div id="baner2">
        <table>
            <tr>
                <td>Kryminał</td>
                <td>Horror</td>
                <td>Przygodowy</td>
            </tr>       
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>  
        </table>
    </div>
    <div id="blok1">
        <h3>Polecamy</h3>
        <div style="display: flex; flex-direction: row;">
            <?php
                $result = mysqli_query($conn, "SELECT id, nazwa, opis, zdjecie FROM Produkty
                WHERE id in (18, 22, 23, 25);");
                while($row = mysqli_fetch_array($result))
                {
                    echo "
                    <div class=blokFilmu> 
                        <h4>$row[id] $row[nazwa]</h4>
                        <img src=$row[zdjecie] alt=film>
                        <p>$row[opis]</p>
                    </div>";
                }
            ?>
        </div>
    </div>
    <div id="blok2">
        <h3>Filmy fantastyczne</h3>
        <div style="display: flex; flex-direction: row;">
            <?php
                $result = mysqli_query($conn, "SELECT id, nazwa, opis, zdjecie FROM Produkty
                WHERE Rodzaje_id = 12;");
                while($row = mysqli_fetch_array($result))
                {
                    echo "
                    <div class=blokFilmu> 
                        <h4>$row[id] $row[nazwa]</h4>
                        <img src=$row[zdjecie] alt=film>
                        <p>$row[opis]</p>
                    </div>";
                }
            ?>
        </div>
    </div>
    <div id="stopka">
        <form method="post">
            Usuń film nr:<input name="deleteNumber" type="numeric"> 
            <button type="submit">Usuń film</button><br>
            Stronę internetową wykonał: XYZ
        </form>
        <?php
            if(isset($_POST["deleteNumber"]))
            {
                mysqli_query($conn, "DELETE FROM Produkty
                WHERE id = $_POST[deleteNumber];");
            }
            mysqli_close($conn);
        ?>
    </div>
</body>
</html>