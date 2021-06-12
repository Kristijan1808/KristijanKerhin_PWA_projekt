<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <title>brisanje/izmjena clanka</title>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML, CSS, JavaScript,PHP">
    <meta name="author" content="Kristijan Kerhin">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
</head>

<body>
<header>
    <h1>franceinfo<span>:</span></h1>
    <nav>
        <div class='navigation_style'>
            <?php include("menu.php"); ?>
        </div>
    </nav>
</header>

<main>
    <h2 class='index_h2'>Brisanje i izmjena članka:</h2>
    <section class='obrisi_clanak_section'>
        <?php
        $dbc = mysqli_connect('localhost:3307','root','','projekt')
        or die('Konekcija na bazu nije uspjela' . mysqli_connect_error());

        $upit = "SELECT * FROM kategorija";

        $result = mysqli_query($dbc,$upit) or die('upit na bazu nije uspio! provjerite upit!');

        if($result) {

            while ($row = mysqli_fetch_array($result)) {
                echo "<h3>".$row['naziv_kategorija']."</h3>";
                $upit2 = "SELECT * FROM clanak WHERE kategorija = '".$row['naziv_kategorija']."'";
                $result2 = mysqli_query($dbc,$upit2) or die('upit za dohvat clanka nije uspio, provjerite upit!');
                echo "<div class='skup_clanaka'>";
                while($row2 = mysqli_fetch_array($result2)){
                    echo "<div class='clanak_sazetak'>
                    <img src='images/".$row2['slika']."' class='malaSlika'>
                    <a class='obrisi_clanak_radio' name='odabir' href='unos.php?id=".$row2['id']."&postoji=1'>
                    <h4>".$row2['naslov']."</h4></a>
                    </div>
                    ";
                }
                echo "</div>";

            }

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