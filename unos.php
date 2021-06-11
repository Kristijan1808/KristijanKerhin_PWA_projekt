<?php

session_start();

print '
<!DOCTYPE html>
<html lang="hr">
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
<header>';
include("header.php");
print '
</header>
<main class="unos_style">
<form action="skripta.php" method="post" enctype="multipart/form-data" >
    <div class="form-item">
        <span id="porukaTitle" class="bojaPoruke"></span><br>
        <label for="naslov">Naslov vijesti:</label>
        <div class="form-field">
            <input type="text" id="naslov" name="naslov" class="form-field-textual"';
             if($_GET['postoji'] == 1){
                    $dbc = mysqli_connect('localhost:3307','root','','projekt')
                    or die('Konekcija na bazu nije uspjela' . mysqli_connect_error());

                    $query = "SELECT * FROM clanak WHERE id='".$_GET['id']."' LIMIT 1";
                    $result = mysqli_query($dbc, $query);
                    $rowClanak = mysqli_fetch_array($result);
                    print "value='".$rowClanak['naslov']."'";
                }
print' >
       </div>
    </div>
    <div class="form-item">
        <span id="porukaSazetak" class="bojaPoruke"></span><br>
        <label for="sazetak_vijesti">Kratki sadržaj vijesti (do 150 znakova)</label>
        <div class="form-field">
            <textarea name="sazetak_vijesti" id="sazetak_vijesti" cols="30" rows="10" class="formfield-textual">';
            if($_GET['postoji'] == 1){
            print $rowClanak['sazetak'];
            }
    print '</textarea>
        </div>
    </div>
    <div class="form-item">
        <span id="porukaSadrzaj" class="bojaPoruke"></span><br>
        <label for="sadrzaj">Sadržaj vijesti</label>
        <div class="form-field">
            <textarea name="sadrzaj" id="sadrzaj" cols="30" rows="10" class="form-field-textual">';
        if($_GET['postoji'] == 1){
            print $rowClanak['tekst'];
        }
    print '</textarea>
        </div>
    </div>
    <div class="form-item">
        <span id="porukaSlika" class="bojaPoruke"></span><br>
        <label for="slika">Slika: </label>
        <div class="form-field">
            <input type="file" accept="image/jpg,image/gif,image/png, image/jpeg"
                   class="input-text" id="slika" name="slika">';
        if($_GET['postoji'] == 1){
        print "<img src='images/".$rowClanak['slika']."' class='slika_izmjeni'>";
        }
print '</div>
    </div>
    <div class="form-item">
        <span id="porukaKategorija" class="bojaPoruke"></span><br>
        <label for="kategorija">Kategorija vijesti:</label>
        <div class="form-field">
            <select name="kategorija" id="kategorija" class="form-field-textual">
            <option value="" disabled selected'; if($_GET['postoji'] == 1){
                    print "value='".$rowClanak['kategorija']."'";
                }
                print'>Odabir kategorije</option>
            ';


$dbc = mysqli_connect('localhost:3307','root','','projekt')
or die('Konekcija na bazu nije uspjela' . mysqli_connect_error());
mysqli_set_charset($dbc, "utf8");
$upit = 'SELECT * FROM kategorija';

$result = mysqli_query($dbc,$upit) or die('upit na bazu nije uspio! provjerite upit!');

if($result) {
    while ($row = mysqli_fetch_array($result)) {
        print "<option value=".$row['naziv_kategorija'] ." id='".$row['naziv_kategorija']."'>".$row['naziv_kategorija']."</option></br>";
    }
}

mysqli_close($dbc);
print '
            </select>
        </div>
    </div>
    <div class="form-item">
        <label>Spremiti u arhivu:
            <div class="form-field-checkbox">
                <input type="checkbox" name="arhiva">
            </div>
        </label>
    </div>
    <div class="form-item">
        <button type="reset" value="Ponisti">Poništi</button>';
        if($_GET['postoji'] == 1){
            print '<input type="hidden" name="id" value="'.$_GET['id'].'">';
            print '<button type="submit" name="izmjeni" id="slanje">Izmjeni</button>';
            print '<button type="submit" name="izbrisiClanak" id="slanje">Trajno izbriši članak</button>';

        }
        else{
            print '<button type="submit" name="Kreiraj" id="slanje">Kreiraj članak</button>';
        }
print "</div>
    <script type='text/javascript' src='noviClanakValidation.js'>
    
</script>
</form>
</main>
<footer>
    <div class='footer-text'><p class='prazan_p'></p><p>Copyright &copy" . date('Y') . " Kristijan Kerhin</p><span class='span_footer'>france.tv</span></div>
</footer>
</body>
";

?>