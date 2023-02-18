function uniquementLettres(ch) {
    let i = -1;
    let valid = true;
    let loop = true;
    while (loop) {
        i = i + 1;
        if (!(ch.charAt(i).toUpperCase() >= "A" && ch.charAt(i).toUpperCase() <= "Z")) {
            valid = false;
        }
        if (!valid || i == ch.length-1) {
            loop = false
        }
    }
    return valid
}
function verifPermis(ch) {
    if (ch.length == 8) {
        let pos = ch.indexOf("/");
        if (pos == 2) {
            let ch1 = ch.substr(0, 2);
            let ch2 = ch.substr(3, 7);
            console.log(ch1, ch2, isNaN(ch1), isNaN(ch2));
            if (isNaN(ch1) && isNaN(ch2)) {
                return false;
            }else {
                return true
            }
        }else {
            return false;
        }
    }else {
        return false;
    }
}
function verif1() {
    /* Getting values */
    let nom = document.getElementById("nom").value;
    let prenom = document.getElementById("prenom").value;
    let permis = document.getElementById("permis").value;
    let F = document.getElementById("F").checked;
    let M = document.getElementById("M").checked;
    let ville = document.getElementById("villes");
    /* Tests */
    let nomTest = uniquementLettres(nom) && (nom.length >= 3 && nom.length <= 20);
    let prenomTest = uniquementLettres(prenom) && (prenom.length >= 3 && prenom.length <= 20);
    let genreTest = M || F;
    let permisTest = verifPermis(permis);
    let villeSelectione = ville.value != "non";
    let verif = permisTest && nomTest && prenomTest && genreTest && villeSelectione;
    if (verif) {
        return true;
    }else {
        if (!permisTest) {
            alert("verifier le permis!");
            return false;
        }
        if (!nomTest) {
            alert("verifier le nom!");
            return false;
        }
        if (!prenomTest) {
            alert("verifier le prenom!");
            return false;
        }
        if (!genreTest) {
            alert("selectioner un genre!");
            return false;
        }
        if (!villeSelectione) {
            alert("selectioner une ville!");
            return false
        }
    } 
}
function verif2() {
    /* Getting Values */
    let permis = document.getElementById("permis").value;
    let cars = document.getElementById("cars");
    let secu = document.getElementById("secu").value;
    let cond = document.getElementById("cond").value;
    let conf = document.getElementById("conf").value;
    let robot = document.getElementById("robot").checked;
    /* Tests */
    let permisTest = verifPermis(permis);
    let voitureSelectione = cars.value != "non";
    let condTest = cond >= 1;
    let confTest = conf >= 1;
    let secuTest = secu >= 1;
    let verif = permisTest && voitureSelectione && condTest && confTest && secuTest && robot;
    if (verif) {
        return true;
    }else {
        if (!permisTest) {
            alert("verifier le permis");
            return false;
        }
        if (!voitureSelectione) {
            alert("selectioner une voiture");
            return false;
        }
        if (!condTest) {
            alert("verifier securite!");
            return false;
        }
        if (!confTest) {
            alert("verifier confort!");
            return false;
        }
        if (!condTest) {
            alert("verifier conduite!");
            return false;
        }
        if (!robot) {
            alert("cocher sur robot");
            return false;
        }
    }
}