var input = document.getElementById('pwd'),
    icon = document.getElementById('icon');

   icon.onclick = function () {

    if (input.type === "password"){
        input.type = 'text'
        icon.className = 'fa fa-eye';
    }
    else {
        input.type = 'password';
        icon.className = 'fa fa-eye-slash';
    }

}

var konfig = document.getElementById('konfig'),
    eye = document.getElementById('eye');

   eye.onclick = function () {

    if (konfig.type === "password"){
        konfig.type = 'text'
        eye.className = 'fa fa-eye';
    }
    else {
        konfig.type = 'password';
        eye.className = 'fa fa-eye-slash';
    }

}

var baru = document.getElementById('baru'),
    see = document.getElementById('see');

   see.onclick = function () {

    if (baru.type === "password"){
        baru.type = 'text'
        see.className = 'fa fa-eye';
    }
    else {
        baru.type = 'password';
        see.className = 'fa fa-eye-slash';
    }

}
