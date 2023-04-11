window.onload = function () {

    fetch('pdfAdmin.php')
        .then(response => response.text())
        .then(data => {
            var contenido = document.getElementById('profile');
            contenido.innerHTML = data;
        });


    var miHome = document.getElementById('home');
    console.log(miHome);
    miHome.onclick = function (event) {
        event.preventDefault();
        fetch('pdfAdmin.php')
            .then(response => response.text())
            .then(data => {

                var contenido = document.getElementById('profile');
                contenido.innerHTML = "";
                contenido.innerHTML = data;
            })
    }



    var miEnlace = document.getElementById('enlace');
    miEnlace.onclick = function (event) {
        event.preventDefault();
        fetch('profile.php')
            .then(response => response.text())
            .then(data => {

                var contenido = document.getElementById('profile');
                contenido.innerHTML = "";
                contenido.innerHTML = data;
                //------modificar perfil
                var miPerfil = document.getElementById('modifyProfile');
                miPerfil.onclick = function (event) {
                    event.preventDefault();
                    fetch('modifyProfile.php')
                        .then(response => response.text())
                        .then(data => {
                            contenido.innerHTML = data;

                        })
                }
                //------modificar password
                var miPassword = document.getElementById('modifyPassword');
                miPassword.onclick = function (event) {
                    event.preventDefault();
                    fetch('modifyPassword.php')
                        .then(response => response.text())
                        .then(data => {
                            contenido.innerHTML = data;

                        })
                }
                //------modificar password
                var miDelete = document.getElementById('deleteProfile');
                miDelete.onclick = function (event) {
                    event.preventDefault();
                    fetch('modifyDelete.php')
                        .then(response => response.text())
                        .then(data => {
                            contenido.innerHTML = data;
                        })
                }



            });


    }





}


