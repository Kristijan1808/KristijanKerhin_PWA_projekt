<?php
session_start();
?>
<!DOCTYPE html>
<html lang='hr'>
<head>
    <title>franceinfo</title>
    <meta charset="UTF-8">
    <meta name="description" content="projekt iz kolegija Programiranje web aplikacija">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Kristijan Kerhin">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
</head>
<body>
<header>
    <?php include("header.php"); ?>
</header>
<main>
    <section class='administracija_section'>
        <a href="nova_kategorija.php" class="admin_opcije_link">Dodaj novu kategoriju</a>
        <a href='unos.php?postoji=0' class="admin_opcije_link">Dodaj novi članak</a>
        <a href="obrisi_kategoriju.php" class="admin_opcije_link">Obriši kategoriju</a>
        <a href='obrisi_clanak.php' class="admin_opcije_link">Obriši/Izmjeni postojeći članak</a>
    </section>
    <section class='administracija_korisnici_section'>
        <h2>Registrirani korisnici:</h2>
        <span class="uputa_o_brisanju">(Kliknite na kružić ispred korisnika kojeg želite obrisati. Ne možete odabrati više korisnika odjednom!)</span>
        <?php

        $dbc = mysqli_connect('localhost:3307','root','','projekt')
        or die('Konekcija na bazu nije uspjela' . mysqli_connect_error());

        $upit = "SELECT * FROM korisnik";

        $result = mysqli_query($dbc,$upit) or die('upit na bazu nije uspio! provjerite upit!');

        if($result) {

            echo "<form method='post' action='skripta.php'>";

            while ($row = mysqli_fetch_array($result)) {
                echo "<input type='radio' class='obrisi_korisnika_radio' name='odabir' value='".$row['id']."' id='".$row['id']."'>".$row['id']." - "
                    .$row['ime'] . " " . $row['prezime']." ".$row['email']. "</br>";
            }
            echo "<input type='submit' value='izbriši'>";
            echo "</form>";
        }
        mysqli_close($dbc);

        ?>
    </section>
</main>

<?php print "
<footer>
    <div class='footer-text'><p class='prazan_p'></p><p>Copyright &copy" . date('Y') . " Kristijan Kerhin</p><span class='span_footer'>france.tv</span></div>
</footer>
";
?>
</body>
</html>



