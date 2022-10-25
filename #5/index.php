<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="banner1">
        <img src="zad5.png" alt="logo lotnisko">
    </div>
    <div class="banner2">
        <h1>Przyloty</h1>
    </div>
    <div class="banner3">
        <h3>przydatne linki</h3>
        <href="index.html">Pobierz</#href=>
    </div>

    <div class="main">
        <table>
            <tr>
                <td>czas</td><td>kierunek</td><td>numer rejsu</td><td>status</td>
            </tr>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "baza5");
                if(!$conn){
                    echo("Błąd połączenia z bazą danyc");
                }
                else{
                    $data = mysqli_query($conn, "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty");
                    while($result = mysqli_fetch_array($data)){
                        echo("<tr><td>".$result['czas']."</td><td>".$result['kierunek']."</td><td>".$result['nr_rejsu']."</td><td>".$result['status_lotu']."</td></tr>");
                    }
                }
                mysqli_close($conn);
            ?>
        </table>
    </div>

    <div class="stopka1">
        <?php

        ?>
    </div>
    <div class="stopka2">
        Autor: Tomasz Buława 00000000000
    </div>

</body>
</html>