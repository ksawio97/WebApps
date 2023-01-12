<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css"/>
</head>
<body>
    <div id="banerLeft">
        <h1>Internetowy sklep z eko-warzywami</h1>
    </div>

    <div id="banerRight">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="https://terapiasokami.pl/">soki</a></li>
        </ol>
    </div>
    <div id="general">
        <?php
        $con = mysqli_connect("localhost", "root", "","sklep");

        $data = mysqli_query($con, "SELECT * FROM produkty");

        while($row = mysqli_fetch_array($data))
        {
            echo
            "
            <div id=blokProduktu>
                <img src=images/$row[zdjecie] alt=warzywniak>
                <h5>$row[nazwa]</h5>
                <p>opis: $row[opis]</p>
                <p>na stanie: $row[ilosc]</p>
                <h2>$row[cena] zł</h2>
            </div>
            ";
        }
        mysqli_close($con);
        ?>
    </div>

    <div id="stopka">
        Nazwa:<input/>
        Cena:<input type="number"/>
    </div>
</body>
</html>

