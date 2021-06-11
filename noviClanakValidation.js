document.getElementById("slanje").onclick = function(event) {

    var slanjeForme = true;

    // Naslov vjesti (5-80 znakova)
    var poljeTitle = document.getElementById("naslov");
    var title = document.getElementById("naslov").value;
    if (title.length < 5 || title.length > 80) {
        slanjeForme = false;
        poljeTitle.style.border="1px dashed red";
        document.getElementById("porukaTitle").innerHTML="Naslov vjesti mora imati između 5 i 80 znakova!";
    } else {
        poljeTitle.style.border="1px solid green";
        document.getElementById("porukaTitle").innerHTML="";
    }

    // Kratki sadržaj (10-150 znakova)
    var poljeAbout = document.getElementById("sazetak_vijesti");
    var about = document.getElementById("sazetak_vijesti").value;
    if (about.length < 10 || about.length > 150) {
        slanjeForme = false;
        poljeAbout.style.border="1px dashed red";
        document.getElementById("porukaSazetak").innerHTML="Kratki sadržaj mora imati između 10 i 150 znakova!";
    } else {
        poljeAbout.style.border="1px solid green";
        document.getElementById("porukaSazetak").innerHTML="";
    }
    // Sadržaj mora biti unesen
    var poljeContent = document.getElementById("sadrzaj");
    var content = document.getElementById("sadrzaj").value;
    if (content.length == 0) {
        slanjeForme = false;
        poljeContent.style.border="1px dashed red";
        document.getElementById("porukaSadrzaj").innerHTML="Sadržaj mora biti unesen!";
    } else {
        poljeContent.style.border="1px solid green";10
        document.getElementById("porukaSadrzaj").innerHTML="";
    }
    // Slika mora biti unesena
    var poljeSlika = document.getElementById("slika");
    var pphoto = document.getElementById("slika").value;
    if (pphoto.length == 0) {
        slanjeForme = false;
        poljeSlika.style.border="1px dashed red";
        document.getElementById("porukaSlika").innerHTML="Morate postaviti sliku!";
    } else {
        poljeSlika.style.border="1px solid green";
        document.getElementById("porukaSlika").innerHTML="";
    }
    // Kategorija mora biti odabrana
    var poljeCategory = document.getElementById("kategorija");
    if(document.getElementById("kategorija").selectedIndex == 0) {
        slanjeForme = false;
        poljeCategory.style.border="1px dashed red";
        document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!";
    } else {
        poljeCategory.style.border="1px solid green";
        document.getElementById("porukaKategorija").innerHTML="";
    }

    if (slanjeForme != true) {
        event.preventDefault();
    }

};