<?php
$NASLOV = "franceinfo";
if(isset($_SESSION['email'])){
if($_SESSION['email'] == 'nouser'){
    print "<span class='porukaKorisniku'></span>";
}
else{
    print "<span class='porukaKorisniku'>Dobrodošli ".$_SESSION['name']."</span>";
}
}

echo "<h1>$NASLOV<span>:</span></h1>";

echo "
    <nav>
        <div class='navigation_style'>";
            include('menu.php');
echo "
        </div>
    </nav>";
?>