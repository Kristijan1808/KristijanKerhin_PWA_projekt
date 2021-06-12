<?php session_start();?>
<!DOCTYPE html>
<html lang='hr'>
<head>
    <title>franceinfo</title>
    <meta charset="UTF-8">
    <meta name="description" content="projekt iz kolegija Programiranje web aplikacija">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP">
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
    <section class='obrisi_kategoriju_section'>
        <h2 class=''>Brisanje kategorije:</h2>

   <?php
   $dbc = mysqli_connect('localhost:3307','root','','projekt')
   or die('Konekcija na bazu nije uspjela' . mysqli_connect_error());

   $upit = "SELECT * FROM kategorija";

   $result = mysqli_query($dbc,$upit) or die('upit na bazu nije uspio! provjerite upit!');
   if($result){
       echo "<form method='POST' action='skripta.php'>";
       while($row = mysqli_fetch_array($result)){
           print "<input type='radio' name='odabrana_kategorija' value='".$row['id_kategorija']."' >".$row['naziv_kategorija']."<br>";
       }
       echo "<input type='submit' value='Obriši'>";
       echo "</form>";
   }

   mysqli_close($dbc);
   ?>
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
