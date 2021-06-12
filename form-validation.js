document.getElementById('submit_registracija').onclick = function(event){
    var slanjeFormeRegistracija = true;

    var poljeIme = document.getElementById('firstname');
    var ime = document.getElementById('firstname').value;
    if(ime.length == 0){
        slanjeFormeRegistracija = false;
        poljeIme.style.border = "1px dashed red";
        document.getElementById('porukaIme').innerHTML = "Ime ne smije biti prazno!";
    }
    else{
        poljeIme.style.border="1px solid green";
        document.getElementById("porukaIme").innerHTML="";
    }

    var poljePrezime = document.getElementById('lastname');
    var prezime = document.getElementById('lastname').value;
    if(prezime.length == 0){
        slanjeFormeRegistracija = false;
        poljePrezime.style.border = "1px dashed red";
        document.getElementById('porukaPrezime').innerHTML = "Prezime ne smije biti prazno!";
    }
    else{
        poljePrezime.style.border="1px solid green";
        document.getElementById("porukaPrezime").innerHTML="";
    }

    var poljePass1 = document.getElementById('password1');
    var pass1 = document.getElementById('password1').value;
    if(pass1.length == 0){
        slanjeFormeRegistracija = false;
        poljePass1.style.border = "1px dashed red";
        document.getElementById('porukaPass1').innerHTML = "Morate unjeti lozinku!";
    }
    else{
        poljePass1.style.border = "1px solid green";
        document.getElementById('porukaPass1').innerHTML = "";
    }

    var poljePass2  = document.getElementById('password2');
    var pass2 = document.getElementById('password2').value;
    if(pass1.length > 0 && pass2.length == 0){
        slanjeFormeRegistracija = false;
        poljePass2.style.border = "1px dashed red";
        document.getElementById('porukaPass2').innerHTML = "Morate ponoviti lozinku!";
    }
    else if(pass1 != pass2){
        slanjeFormeRegistracija = false;
        poljePass2.style.border = "1px dashed red";
        document.getElementById('porukaPass2').innerHTML = "Lozinke moraju biti iste!";
    }
    else{
        poljePass2.style.border = "1px solid green";
        document.getElementById('porukaPass2').innerHTML = "";
    }

    var poljeEmail = document.getElementById('email');
    var email = document.getElementById('email').value;
    if(email.length == 0){
        slanjeFormeRegistracija = false;
        poljeEmail.style.border = "1px dashed red";
        document.getElementById('porukaEmail').innerHTML = "Email ne smije biti prazan!";
    }

    if (slanjeFormeRegistracija != true) {
        event.preventDefault();
    }

}