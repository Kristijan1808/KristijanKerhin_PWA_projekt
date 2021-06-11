<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="projekt iz kolegija Programiranje web aplikacija">
    <meta name="keywords" content="HTML, CSS, JavaScript,PHP">
    <meta name="author" content="Kristijan Kerhin">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
    <title>franceinfo</title>
</head>
<?php
print '
<body>
    <header>';
       include("header.php");
print"</header>
  <main>
        <section class='index_section'>
            <h2 class='index_h2'><a href='kategorija.php?kategorija=politika'> Politika</a></h2>";
            print "<div class='articles'>";
            include ('connect_dtb.php');
            $query = "SELECT * FROM clanak WHERE arhiva=0 AND kategorija='politika' LIMIT 5";
            $result = mysqli_query($dbc, $query);
              if($result){
                 while($row = mysqli_fetch_array($result)) {
                      echo '<article class="pet_clanka">';
                      echo'<div class="article">';
                      echo '<div class="sport_img">';
                      echo '<img src="images/'.$row['slika'].'" class="malaSlika">';
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

        print"</div>
        </section>
<hr>
        <section class='index_section'>
            <h2 class='index_h2'><a href='kategorija.php?kategorija=sport'>Sport</a></h2>";
            print "<div class='articles'>";
            include ('connect_dtb.php');
            $query = "SELECT * FROM clanak WHERE arhiva=0 AND kategorija='sport' LIMIT 4";
            $result = mysqli_query($dbc, $query);
             if($result){
                 while($row = mysqli_fetch_array($result)) {
                     echo '<article>';
                     echo'<div class="article">';
                     echo '<div class="sport_img">';
                     echo '<img src="images/'.$row['slika'].'" class="malaSlika">';
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

            print"</div>
        </section>
    </main>

  <footer>
        <div class='footer-text'><p class='prazan_p'></p><p>Copyright &copy" . date('Y') . " Kristijan Kerhin</p><span class='span_footer'>france.tv</span></div>
    </footer>
</body>
</html>";

?>

