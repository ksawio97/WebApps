<?php
    if(isset($_POST["Lowisko_id"]) && isset($_POST["data_zawodow"]) && isset($_POST["sedzia"]))
    {
        $conn = mysqli_connect("localhost", "root", "", "wedkarstwo");
        mysqli_query($conn, "INSERT INTO 
        zawody_wedkarskie(Karty_wedkarskie_id, Lowisko_id, data_zawodow, sedzia) 
        VALUES (0, $_POST[Lowisko_id], $_POST[data_zawodow], $_POST[sedzia]);");
        mysqli_close($conn);
        header("Location: zawody.html");
    }
?>