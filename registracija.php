<?php
session_start();
?>
<!DOCTYPE html>
<html lang='hr'>
<head>
    <title>registracija</title>
    <meta charset="UTF-8">
    <meta name="description" content="projekt iz kolegija Programiranje web aplikacija">
    <meta name="keywords" content="HTML, CSS, JavaScript,PHP">
    <meta name="author" content="Kristijan Kerhin">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
</head>

<body>
<header>
    <?php include("header.php"); ?>
</header>
<main>
    <section class='registracija_login_section'>
        <div class="form_style">
            <form method="post" action="registracija.php" name="registracija_korisnika">

                <label for="firstname">Ime:</label>
                <input type="text" name="firstname" id="firstname" required/>
                <span id="porukaIme" class="error"></span>

                <label for="lastname">Prezime:</label>
                <input type="text" name="lastname" id="lastname" required/>
                <span id="porukaPrezime" class="error"></span>

                <label for="password1">Lozinka:</label>
                <input type="password" name="password1" id="password1" required/>
                <span id="porukaPass1" class="error"></span>

                <label for="password2">Ponovite lozinku:</label>
                <input type="password" name="password2" id="password2" required/>
                <span id="porukaPass2" class="error"></span>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required/>
                <span id="porukaEmail" class="error"></span>

                <input type="submit" value="Registriraj se" id="submit_registracija" name="submit">
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p>Dobrodošli! Uspješno ste se registrirali na franceinfo portal.<br>
                            Zatvorite ovaj prozor i nastavite sa prijavom.</p>
                    </div>

                </div>
               <script type="text/javascript" src="form-validation.js"></script>

            </form>
        </div>
    </section>

</main>
<?php print "
<footer>
    <div class='footer-text'><p class='prazan_p'></p><p>Copyright &copy" . date('Y') . " Kristijan Kerhin</p><span class='span_footer'>france.tv</span></div>
</footer>";
?>
</body>
</html>

<?php

if(isset($_POST['firstname']) && isset($_POST['lastname']) &&
    isset($_POST['password1']) && isset($_POST['email'])){

    $dbc = mysqli_connect('localhost:3307','root','','projekt')
            or die('Konekcija na bazu nije uspjela' . mysqli_connect_error());
    $provjeri_email = $_POST['email'];
    $upit = "SELECT * FROM korisnik WHERE email='".$provjeri_email."'";
    $result = mysqli_query($dbc,$upit);
    if(($num_rows = mysqli_num_rows($result)) > 0){
        print "<p class='postojeci_email'>Email se već koristi! Unesite neki drugi email!</p>";
    }
    else{

    $ime_korisnika = $_POST['firstname'];
    $prezime_korisnika = $_POST['lastname'];
    $lozinka_korisnika = $_POST['password1'];
    $email_korisnika = $_POST['email'];

    $datum_vrijeme_registracije_korisnika = date("Y.m.d H:i:s");

    $hashedPassword = password_hash($lozinka_korisnika, CRYPT_BLOWFISH);
/*---------Sql injection-------*/
    $sql="INSERT INTO korisnik(ime,prezime,lozinka,email,datumVrijeme_registracije) values (?,?,?,?,?)";

    $stmt=mysqli_stmt_init($dbc);

    if (mysqli_stmt_prepare($stmt, $sql)){

        mysqli_stmt_bind_param($stmt,'sssss',$ime_korisnika,$prezime_korisnika,$hashedPassword,$email_korisnika,$datum_vrijeme_registracije_korisnika);

        mysqli_stmt_execute($stmt);
    }
    /*------------------------------------*/
    print '
    <script type="text/javascript">
    // Get the modal
        var modal = document.getElementById("myModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        modal.style.display = "block";
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
            document.location.href="index.php";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                document.location.href="index.php";
            }
        }
    </script>';
    }
    mysqli_close($dbc);
}

?>