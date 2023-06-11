<?php
    $conn = mysqli_connect("localhost", "root", "", "biblioteka");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="baner">
        <h2>Miejska Biblioteka Publiczna w Książkowicach</h2>
    </div>
    <div class="lewy">
        <h2>Dodaj czytelnika</h2>
        <form method="POST">
            imię:<input name="imie"><br>
            nazwisko:<input name="nazwisko"><br>
            rok urodzenia:<input name="rok" type="number">
            <button type="submit">DODAJ</button>
        </form>
        <?php
            if(isset($_POST["imie"]) && isset($_POST["nazwisko"]) && isset($_POST["rok"]))
            {
                $imie = $_POST["imie"];
                $nazwisko = $_POST["nazwisko"];
                $rok = $_POST["rok"];
                $kod = strtolower(substr($imie, 0, 2).substr((string)$rok, -2, 2).substr($nazwisko, 0, 2));
                mysqli_query($conn, "INSERT INTO czytelnicy(imie, nazwisko, kod) 
                VALUES ('$imie', '$nazwisko', '$kod');");
                echo "Czytelnik: $nazwisko został dodany do bazy danych";
            }
        ?>
    </div>
    <div class="srodkowy">
        <img src="biblioteka.png" alt="biblioteka">
        <h4>ul. Czytelnicza 25<br>12-120 Książkowice<br>tel.: 123123123<br>e-mail: <a href="biuro@bib.pl">biuro@bib.pl</a></h4>
    </div>
    <div class="prawy">
        <h3>Nasi czytelnicy</h3>
        <ul>
            <?php
                $result = mysqli_query($conn, "SELECT imie, nazwisko FROM czytelnicy;");
                while($row = mysqli_fetch_array($result))
                {
                    echo "<li>$row[imie] $row[nazwisko]</li>";
                }
            ?>
        </ul>
    </div>
    <div class="stopka">
        <p>Projekt witryny: XYZ</p>
    </div>
</body>
</html>

<?php
    mysqli_close($conn);
?>