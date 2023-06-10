<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>
<body>
    <form method="Post">
        Login: <input type="text" placeholder="Login" name="login"><br>
        Password: <input type="password" name="password"><br>
        <button type="sumbit">Sumbit</button>
    </form>

    <?php
        if(isset($_POST["login"]) && isset($_POST["password"]))
        {
            $login = $_POST["login"];
            $password = $_POST["password"];

            $conn = mysqli_connect("localhost", "root", "", "dane");
            $result = mysqli_query($conn, "SELECT imie, nazwisko FROM osoby WHERE id = '$login' and rok_urodzenia = '$password'");

            if ($user = mysqli_fetch_array($result))
            {
                session_start();
                $_SESSION["imie"] = $user["imie"];
                $_SESSION["nazwisko"] = $user["nazwisko"];
                header("Location: lista.php");
            }
            else
            {
                echo "Error: User doesn't exist or password is wrong";
            }
        }
    ?>
</body>
</html>