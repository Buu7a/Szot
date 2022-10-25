<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozgrywki futbolowe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="banner">
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </div>

    <div class="mecze">
        <table>
            <tr>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "baza1");
                    if (!$conn){
                        exit("Błąd połączenia z serwerem");
                    }
                    else{
                        $data = mysqli_query($conn, 'SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka');
                        while ($result = mysqli_fetch_array($data)){
                            echo("<td><h3>".$result['zespol1']."-".$result['zespol2']."</h3><br>
                            <h4>".$result['wynik']."</h4>
                            <a>w dniu:".$result['data_rozgrywki']."</a></td>");
                        }
                    }
                    mysqli_close($conn);



                ?>
            </tr>
        </table>
    </div>

    <div class="main">
        <h2>Reprezentacja Polski</h2>
    </div>

    <div class="lewy">
        <a>Podaj pozycje zawodników (1-brmkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</a>
        <form method="post" action="index.php">
            <input type="number" name="pozycja">
            <button type="submit">Sprawdź</button>
        </form>
                     <?php
                        
                        $conn = mysqli_connect("localhost", "root", "", "baza1");
                        if (!$conn){
                            exit("Błąd połaczenia z serwerem");
                        }
                        else {
                            $poz = $_POST['pozycja'];
                            $data = mysqli_query($conn, "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id=$poz");
                            while ($result = mysqli_fetch_array($data)){
                                echo("<ul><li>".$result["imie"].$result["nazwisko"]."</li></ul>");
                            }
                        }
                        mysqli_close($conn);
                     ?>
    </div>
    <div class="prawy">
        <img src="zad1.png" alt="piłkarz">
        <a>Autor: Tomasz Buława 00000000000</a>
    </div>

</body>
</html>