window.onload = function () {
    var miEnlace = document.getElementById('enlace');
    miEnlace.onclick = function (event) {
        event.preventDefault();
        fetch('profile.php')
            .then(response => response.text())
            .then(data => {
                var contenido = document.getElementById('profile');
                contenido.innerHTML = data;
                //------modificar perfil
                var miPerfil = document.getElementById('modifyProfile');
                miPerfil.onclick = function (event) {
                    event.preventDefault();
                    contenido.innerHTML = "";
                }
            });


    }

    var miHome = document.getElementById('home');
    miHome.onclick = function (event) {
        event.preventDefault();
        var contenido = document.getElementById('profile');
        contenido.innerHTML = "";
    }



}


