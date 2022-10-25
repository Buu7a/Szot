<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piłka nożna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="banner">
        <h3>Reprezentacja polski w piłce nożnej</h3>
        <img src="obraz1.jpg" alt="reprezentacja">
    </div>
    
    <div class="lewy">
        <form method="POST" action="index.php">
            <select name="poz">
                <option value="1" selected>Bramkarze</option>
                <option value="2">Obrońcy</option>
                <option value="3">Pomocnicy</option>
                <option value="4">Napastnicy</option>
            </select>
            <button type="submit">Zobacz</button>
        </form>
        <img src="zad2.png" alt="piłka">
        <a>Autro: Tomasz Buława 00000000000</a>
    </div>
    <div class="prawy">
            
                    <?php
                        
                        $conn = mysqli_connect("localhost", "root", "", "baza2");
                        if (!$conn){
                            exit("Błąd połączenia z bazą danych");
                        }
                        else{
                            $poz = $_POST["poz"];
                            $data = mysqli_query($conn, "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $poz");
                            while ($result = mysqli_fetch_array($data)){
                                echo("<ol><li>".$result['imie'].$result['nazwisko']."</li></ol>");
                            }
                        }
                        mysqli_close($conn);
                    ?>


    </div>

    <div class="main">
        <h3>Liga mistrzów</h3>
    </div>

    <div class="liga">
        <table>
            <tr>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "baza2");
                    if (!$conn){
                        exit("Błąd połączenia z bazą danych");
                    }
                    else{
                        $data = mysqli_query($conn, "SELECT zespol, punkty, grupa FROM liga ORDER BY punkty DESC");
                        while ($result = mysqli_fetch_array($data)){
                            echo("<td><h2>".$result['zespol']."<h2><br>
                            <h1>".$result['punkty']."</h1><br>
                            <a>grupa:".$result['grupa']."</a></td>");
                        }
                    }
                    mysqli_close($conn);



                ?>
            </tr>
        </table>
    </div>
</body>
</html>