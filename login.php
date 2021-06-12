<?php
session_start();
?>
<!DOCTYPE html>
<html lang='hr'>
<head>
    <title>prijava</title>
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
    <span id="nesto"></span>
</header>
<main>
    <section class='registracija_login_section'>
        <div class="form_style">
            <form method="post" action="login.php">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br>
                <label for="pass">Password:</label><br>
                <input type="password" id="pass" name="pass" required><br>
                <input type="submit" value="login">
            </form>
        </div>
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

<?php
if(isset($_POST['email']) && isset($_POST['pass'])) {
    $dbc = mysqli_connect('localhost:3307','root','','projekt')
    or die('Konekcija na bazu nije uspjela' . mysqli_connect_error());
    mysqli_set_charset($dbc, "utf8");
    $email_korisnika = $_POST['email'];
    $lozinka_korisnika = $_POST['pass'];

    /*-----Prepared statement--------*/
    $sql="SELECT ime,lozinka,email,administrator FROM korisnik WHERE email=? LIMIT 1";

    $stmt=mysqli_stmt_init($dbc);

    if (mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt,'s',$email_korisnika);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }

    mysqli_stmt_bind_result($stmt, $a,$b,$c,$d);
    mysqli_stmt_fetch($stmt);
    /*---------------------------*/

    if (mysqli_stmt_num_rows($stmt)>0){
        $lozinkazaprovjeru = $b;
        $ime_korisnika = $a;
        if (password_verify($lozinka_korisnika, $lozinkazaprovjeru)){
            $_SESSION['email'] = "$email_korisnika";
            $_SESSION['name'] = "$ime_korisnika";
            $_SESSION['administrator'] = $d;
            if($d != 0){
                print"<script type='text/javascript'>
                   confirm('Prijavili ste se kao administrator. Zatvorite prozor za nastavak.');
                   document.location.href='index.php';
                  </script>";
            }
            else{
                header("Location: index.php");
            }


        }
        else {
            print "<p class='errorPassword'>Neispravni podaci! Pokušajte ponovno.</p>";
        }
    }
    else {
        print "<p class='errorPassword'>Neispravni podaci! Pokušajte ponovno.</p>";
    }
    mysqli_close($dbc);
}
?>