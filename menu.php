<?php

print "<head>
 <meta charset='UTF-8'>
 <link rel='stylesheet' type='text/css' href='style.css'>
</head>";

print "<a href='index.php?menu=1'>početna</a>
      <a href='kategorija.php?kategorija=politika'>politika</a>
      <a href='kategorija.php?kategorija=sport'>sport</a>
      <div class='dropdown'>
        <p class='dropbtn'>kategorija</p>
        <div class='dropdown-content'>";

$dbc = mysqli_connect('localhost:3307','root','','projekt')
or die('Konekcija na bazu nije uspjela' . mysqli_connect_error());
mysqli_set_charset($dbc, "utf8");

$upit = "SELECT * FROM kategorija";

$result = mysqli_query($dbc,$upit) or die('upit za dohvat kategorija nije uspio! provjerite upit!');

if($result) {
    while ($row = mysqli_fetch_array($result)) {
        print "<a href='kategorija.php?kategorija=".$row['naziv_kategorija']."' >".$row['naziv_kategorija']."</a></br>";
    }
}

mysqli_close($dbc);

        print"
        </div>
        </div>";
    if(isset($_SESSION['email'])){
        if($_SESSION['email'] == 'nouser'){
            print "<a href='registracija.php'>registracija</a>";
            print "<a href='login.php'>prijava</a>";
        }
        else{
            if(isset($_SESSION['administrator'])){
                if($_SESSION['administrator'] == 1){
                    print "<a href='administracija.php'>administracija</a>";
                }
            }
            print "<a href='skripta.php?odjava=1'>odjava</a>";
        }
    }
    else{
        print "<a href='registracija.php'>registracija</a>";
        print "<a href='login.php'>prijava</a>";
    }

?>