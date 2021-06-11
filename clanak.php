<?php
session_start();
?>
<?php print"<!DOCTYPE html>"; ?>
<html lang='hr'>
<head>
    <title>clanak</title>
    <meta charset="utf-8">
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
    <?php
    include ('connect_dtb.php');
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $basename = "projekt";

    $dbc = mysqli_connect($servername, $username, $password, $basename) or die('Error 
connecting to MySQL server.'.mysqli_error());
    mysqli_set_charset($dbc, "utf8");
    $upit = "SELECT * FROM clanak WHERE id = ".$_GET['id']. " LIMIT 1 ";
    $result = mysqli_query($dbc,$upit);

    $row = mysqli_fetch_array($result);
    ?>
    <section class='clanak_section'>
        <h2><?php echo $row['naslov']; ?></h2>
        <p class="sazetak"><?php echo $row['sazetak']; ?></p>
        <picture>
            <img src="images/<?php echo $row['slika']; ?>">
        </picture>
        <div>
            <span class="datum">
            <?php $datum = $row['datum'];
            $date = date_create("$datum");
            echo date_format($date, 'd.m.Y');?></span>
        </div>

        <div class="sadrzaj">
            <p class="tekst">
            <?php echo $row['tekst'];?>
            </p>
        </div>
    </section>

</main>

<footer class="clanak_footer">
    <div class="footer-div">
        <div class='footer-text-clanak'>franceinfo<span>:</span></div>
    </div>
</footer>
</body>
</html>




