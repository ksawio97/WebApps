<?php
    $conn = mysqli_connect("localhost", "root", "", "wedkowanie");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_1.css">
    <title>Wędkowanie</title>
</head>
<body>
    <div id="baner">
        <h1>Portal dla wędkarzy</h1>
    </div>
    <div id="lewy1">
        <h1>Ryby zamieszkujące rzeki</h1>
        <ol id="listaRyb">
            <?php
                $result = mysqli_query($conn, "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo
                FROM lowisko
                JOIN ryby ON lowisko.Ryby_id = ryby.id
                WHERE rodzaj = 3;");
                while($row = mysqli_fetch_array($result))
                {
                    echo "<li>$row[nazwa] pływa w rzece $row[akwen], $row[wojewodztwo]</li>";
                }
            ?>
        </ol>
    </div>
    <div id="lewy2">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <tr>
                <th>L.p</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
            </tr>
            <?php
                $result = mysqli_query($conn, "SELECT id, nazwa, wystepowanie FROM ryby
                WHERE styl_zycia = 1;");
                while($row = mysqli_fetch_array($result))
                {
                    echo "<tr>
                        <td>$row[id]</td>
                        <td>$row[nazwa]</td>
                        <td>$row[wystepowanie]</td>
                    </tr>";
                }
                mysqli_close($conn);
            ?>
        </table>
    </div>
    <div id="prawy1">
        <img src="ryba1.jpg" alt="Sum">
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    <div id="stopka">
        <p>Stronę wykonał: XYZ</p>
    </div>
</body>
</html>