<?php
session_start();
print "<head>
<meta charset='UTF-8'>
</head>";
$dbc = mysqli_connect('localhost:3307','root','','projekt')
or die('Konekcija na bazu nije uspjela' . mysqli_connect_error());
mysqli_set_charset($dbc, "utf8");


/*-----------Kreiranje članka--------------*/
if(isset($_POST['Kreiraj'])) {

    $naslov = $_POST['naslov'];
    $sazetak_vijesti = $_POST['sazetak_vijesti'];
    $sadrzaj = $_POST['sadrzaj'];
    $kategorija = $_POST['kategorija'];
    $slika = $_FILES['slika']['name'];

    if (isset($_POST['arhiva'])) {
        $arhiva = 1;
    } else {
        $arhiva = 0;
    }

    $query = "INSERT INTO clanak(naslov,sazetak,tekst,kategorija,arhiva,slika) 
        VALUES('" . $naslov . "', '" . $sazetak_vijesti . "', '" . $sadrzaj . "','" . $kategorija . "', '" . $arhiva . "', '" . $slika . "')";
    $result = mysqli_query($dbc, $query) or die('Upit za spremanje clanka nije uspio! Provjerite upit!.');
    print 'cccc';
    $target_dir = 'images/' . $slika;
    move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
    print"<script type='text/javascript'>
alert('Uspješno ste kreirali novi članak.');
</script>";
    print '<p>Novi članak uspješno izrađen! :)</p>';
    header("Location: index.php");
}
/*}*/
/*---------------------------------------*/
/*-------------Izmjena članka------------*/
if(isset($_POST['izmjeni'])){

    $naslov = $_POST['naslov'];
    $sazetak_vijesti = $_POST['sazetak_vijesti'];
    $sadrzaj = $_POST['sadrzaj'];
    $kategorija = $_POST['kategorija'];
    $slika = $_FILES['slika']['name'];
    $id = $_POST['id'];

    if (isset($_POST['arhiva'])) {
        $arhiva = 1;
    } else {
        $arhiva = 0;
    }

    $upit = "UPDATE clanak SET naslov = '".$naslov."', sazetak = '".$sazetak_vijesti."', tekst = '".$sadrzaj."', kategorija = '".$kategorija."', slika = '".$slika."', arhiva = ".$arhiva." WHERE id=".$id." ";
    $result = mysqli_query($dbc,$upit) or die('upit na bazu nije uspio! provjerite upit!');
    $target_dir = 'images/' . $slika;
    move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
    header('Location: administracija.php');
}
/*------brisanje clanka--------*/
if(isset($_POST['izbrisiClanak'])){
    $id = $_POST['id'];
    $upit = "DELETE FROM clanak WHERE id = ".$id.";";

    $result = mysqli_query($dbc,$upit) or die('upit na bazu nije uspio! provjerite upit!');

    mysqli_close($dbc);
    header('Location: administracija.php');
}
/*----------Odjava korisnika-----------*/
if(isset($_GET['odjava'])){
        unset($_SESSION["ime"]);
        unset($_SESSION["email"]);
        unset($_SESSION["administrator"]);
        $_SESSION['administrator'] = 0;
        $_SESSION['name'] = 'nouser';
        $_SESSION['email']  ='nouser';
        header("Location:index.php");
}

/*--------------brisanje korisnika--------------*/

if(isset($_POST['odabir'])){
    $id = $_POST['odabir'];

    $upit = "DELETE FROM korisnik WHERE id = '".$id."'";

    $result = mysqli_query($dbc,$upit) or die('upit na bazu nije uspio! provjerite upit!');

    mysqli_close($dbc);
    header('Location: administracija.php');
}
else{header("Location: index.php");}
/*-----------brisanje kategorije-------------*/
if(isset($_POST['odabrana_kategorija'])){
    $kategorija = $_POST['odabrana_kategorija'];

    $upit = "DELETE FROM kategorija WHERE id_kategorija ='$kategorija'";
    $result = mysqli_query($dbc,$upit) or die('upit na bazu nije uspio! provjerite upit!');
    header("Location: administracija.php");
}
else{header("Location: index.php");}

/*-----------dodavanje nove kategorije------*/
if(isset($_POST['naziv_nove_kategorije'])){
    $naziv_kategorije = $_POST['naziv_nove_kategorije'];
    if($naziv_kategorije != ''){
        $upit = "INSERT INTO kategorija(naziv_kategorija) VALUES('".$naziv_kategorije."')";
        $result = mysqli_query($dbc,$upit) or die('upit na bazu nije uspio! provjerite upit!');
    }

    header("Location: administracija.php");
}

mysqli_close($dbc);
?>


