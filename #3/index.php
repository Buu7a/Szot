<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje BMI</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="logo">
        <img src="wzor.png" alt="wzór BMI">
    </div>
    <div class="banner">
        <h1>Oblicz swoje BMI</h1>
    </div>

    <div class="main">
        <table>
            <tr>
                <td>Interpretacja BMI</td><td>Wartość minimalna</td><td>Wartość maksymalna</td>
            </tr>
            <tr>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "baza3");
                    if (!$conn){
                        exit("Błąd połączenia z bazą danych");
                    }
                    else{
                        $data = mysqli_query($conn, "SELECT wart_min, wart_max, informacja FROM bmi");
                        while($result = mysqli_fetch_array($data)){
                        echo("<td>".$result["wart_min"]."</td><td>".$result["wart_max"]."</td><td>".$result["informacja"]."</td></tr>");
                        }
                    }
                    mysqli_close($conn);
                ?>
            </tr>
        </table>
    </div>

    <div class="lewy">
        <h2>Podaj wagę i wzrost</h2>
        <form method="POST" action="index.php">
            Waga: <input name="waga" type="number" min="1"><br>
            Wzrost w cm: <input name="wzrost" type="number" min="1">
            <button type="submit">Oblicz i zapamiętaj wynik</button>
            <?php
                //$conn = mysqli_connect("localhost", "root", "", "baza3");
                //if(!$conn){
                //   exit("Błąd połączenia z bazą danych");
                //}
                //else{
                //    $data = mysqli_query($conn);
                //}
            ?>
        </form>
    </div>
    <div class="prawy">
        <img src="rys1.png" alt="ćwiczenia">
    </div>

    <div class="stopka">
        Autor: Tomasz Buława 00000000000
    </div>
</body>
</html>