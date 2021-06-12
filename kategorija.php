<?php
session_start();

print '
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="projekt iz kolegija Programiranje web aplikacija">
    <meta name="keywords" content="HTML, CSS, JavaScript,PHP">
    <meta name="author" content="Kristijan Kerhin">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
    <title>franceinfo</title>
</head>
<body>


    <header>';
include("header.php");
print"</header>
     <main>
        <section class='kategorija_section'>
            <h2 class='kategorija_h2'>".$_GET['kategorija']."</h2>";
            print "<div class='articles'>";

            $dbc = mysqli_connect('localhost:3307','root','','projekt')
            or die('Konekcija na bazu nije uspjela' . mysqli_connect_error());
            mysqli_set_charset($dbc, "utf8");
            $query = "SELECT * FROM clanak WHERE kategorija='".$_GET['kategorija']."'";

            $result = mysqli_query($dbc, $query);
            if($result){
                while($row = mysqli_fetch_array($result)) {
                    echo '<article>';
                    echo'<div class="article">';
                    echo '<div class="sport_img">';
                    echo '<img src="images/' .$row['slika'] .'" class="malaSlika">';
                    echo '</div>';
                    echo '<div class="media_body">';
                    echo '<h4 class="title">';
                    echo '<a href="clanak.php?id='.$row['id'].'">';
                    echo $row['naslov'];
                    echo '</a></h4>';
                    echo '</div class="sazetak">';
                    echo  $row['sazetak'];
                    echo '</div>';
                    echo '</article>';
                }
            }
            print "</div>";
print"</section>
        <div class='empty'></div>
    </main>

  <footer class='footer-bootom'>
    <div class='footer-text'><p class='prazan_p'></p><p>Copyright &copy" . date('Y') . " Kristijan Kerhin</p><span class='span_footer'>france.tv</span></div>
</footer>
</body>
</html>";

?>