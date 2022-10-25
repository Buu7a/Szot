<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Twój wskaźnik BMI</title>
</head>
<body>
    <div class="banner">
        <h2>Oblicz wskaźnik BMI</h2>
    </div>
    <div class="logo">
        <img src="wzor.png" alt="liczymi BMI">
    </div>

    <div class="lewy">
        <img src="rys1.png" alt="zrzuć kalorie!">
    </div>
    <div class="prawy">
        <h1>Podaj dane</h1>
        <form method="POST" action="index.php">
            Waga: <input type="number" name="waga"><br>
            Wzrost [cm]: <input type="number" name="wzrost"><br>
            <button type="submit">Licz BMI i zapisz wynik</button><br>
            <?php
            if (isset($_POST['waga']) && isset($_POST['wzrost'])){
                $waga = $_POST["waga"];
                $wzrost = $_POST["wzrost"];
                $bmi = ($waga / ($wzrost * $wzrost)) * 10000;
                echo("Twoja waga:".$waga.";"." "."Twój wzrost:".$wzrost."<br>"."BMI wynosi:"." ".$bmi);           
            }
            ?>
        </form>
    </div>

    <div class="main">
        <table>
            <tr>
                <td>lp.</td><td>Interpretacja</td><td>zaczyna się od...</td>
            </tr>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "baza4");
                if (!$conn){
                    echo("Błąd połączenia z bazą danych!");
                }
                else{
                    $data = mysqli_query($conn, "SELECT id, informacja, wart_min FROM bmi");
                    while ($result = mysqli_fetch_array($data)){
                        echo("<tr>");
                        echo("<td>".$result['id']."</td><td>".$result['informacja']."</td><td>".$result['wart_min']."</td>"); 
                        echo("</tr>");
                    }
                }
                mysqli_close($conn);
                ?>
        </table>
    </div>

    <div class="stopka">
        Autor: Tomasz Buława 00000000000
        <link href="kw2.jpg">
    </div>



</body>
</html>