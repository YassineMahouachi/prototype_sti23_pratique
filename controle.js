function uniquementLettres(ch) {
    let i = -1;
    let valid = true;
    let loop = true;
    while (loop) {
        i = i + 1;
        if (!(ch.charAt(i).toUpperCase() >= "A" && ch.charAt(i).toUpperCase() <= "Z")) {
            valid = false;
        }
        if (!valid || i == ch.length - 1) {
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
            console.log(ch1, ch2, !isNaN(ch1), !isNaN(ch2));
            return !isNaN(ch1) && !isNaN(ch2);
        }else {
            return false;
        }
    } else {
        return false;
    }
}
function verif1() {
    let nom = document.getElementById("nom").value;
    let prenom = document.getElementById("prenom").value;
    let permis = document.getElementById("permis").value;
    let F = document.getElementById("F").checked;
    let M = document.getElementById("M").checked;
    let ville = document.getElementById("villes");
    
    if (!(verifPermis(permis))) {
        alert("verifiez le permis!");
        return false;
    }
    if (!(uniquementLettres(nom) && nom.length >= 3 && nom.length <= 20)) {
        alert("verifiez le nom!");
        return false;
    }
    if (!(uniquementLettres(prenom) && prenom.length >= 3 && prenom.length <= 20)) {
        alert("verifiez le prenom!");
        return false;
    }
    if (!(M || F)) {
        alert("selectionez un genre!");
        return false;
    }
    if (!(ville.selectedIndex > 0)) {
        alert("selectionez une ville!");
        return false;
    }

}
function verif2() {
    let permis = document.getElementById("permis").value;
    let cars = document.getElementById("cars");
    let secu = document.getElementById("secu").value;
    let cond = document.getElementById("cond").value;
    let conf = document.getElementById("conf").value;
    let robot = document.getElementById("robot").checked;
    
    if (!(verifPermis(permis))) {
        alert("verifiez le permis!");
        return false;
    }
    if (!(cars.selectedIndex > 0)) {
        alert("selectionez une voiture!");
        return false;
    }
    if (isNaN(secu) || !(Number(secu) >= 1 && Number(secu) <= 5)) {
        alert("verifiez la note du securité!");
        return false;
    }
    if (isNaN(cond) || !(Number(cond) >= 1 && Number(cond) <= 5)) {
        alert("verifiez la note du conduite!");
        return false;
    }
    if (isNaN(conf) || !(Number(conf) >= 1 && Number(conf) <= 5)) {
        alert("verifiez la note du confort!");
        return false;
    }
    if (!robot) {
        alert("cochez sur je suis pas un robot!");
        return false;
    }
}