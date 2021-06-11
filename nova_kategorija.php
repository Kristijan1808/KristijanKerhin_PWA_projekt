<?php session_start();?>
<!DOCTYPE html>
<html lang='hr'>
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Kristijan Kerhin">
    <link rel="stylesheet" type="text/css" href="style.css">

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
<main class="nova_kategorija_style">
    <section class='nova_kategorija_section'>
        <h2>Dodavanje nove kategorije:</h2>
        <form method="post" action="skripta.php">
            <label for="naziv_nove_kategorije">Naziv:</label>
            <input type="text" id="naziv_nove_kategorije" name="naziv_nove_kategorije"><br><br>
            <input type="submit" value="Kreiraj novu kategoriju" id="nova_kategorija_button">
        </form>
    </section>

</main>

<?php print "
<footer class='footer-bootom'>
    <div class='footer-text'><p class='prazan_p'></p><p>Copyright &copy" . date('Y') . " Kristijan Kerhin</p><span class='span_footer'>france.tv</span></div>
</footer>
";
?>
</body>
</html>