window.onload = function () {

    pdfAdmin();

    function pdfAdmin() {
        fetch('pdfAdmin.php')
            .then(response => response.text())
            .then(data => {
                var contenido = document.getElementById('profile');
                contenido.innerHTML = data;



                var miUpload = document.getElementById('pdfupload');
                miUpload.onclick = function (event) {
                    event.preventDefault();
                    pdfupload();
                }


            });
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
                //------eliminar perfil
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



    var miHome = document.getElementById('home');
    miHome.onclick = function (event) {
        event.preventDefault();
        pdfAdmin();
    }



    function pdfupload() {

        //------subir pdf-----              
        fetch('pdfuploader.php')
            .then(response => response.text())
            .then(data => {
                var contenido = document.getElementById('profile');
                contenido.innerHTML = "";
                contenido.innerHTML = data;

                var miBtn = document.getElementById('btn_enviar');
                miBtn.onchange = function (event) {
                    mifichero = document.getElementById('btn_enviar').files[0].name;
                    miTexto = document.getElementById('texto');
                    miTexto.innerText = "File: " + mifichero;
                    sendForm();
                }


            })

    }




    function sendForm() {
        var formulario = document.getElementById('formulario');
        formulario.addEventListener('submit', function (e) {
            e.preventDefault();
            console.log("aqui estamos");

            var datos = new FormData(formulario);
            console.log(datos.get('archivo'));
            console.log(datos.get('submitted'))

            fetch('../models/upload.php', {
                method: 'POST',
                body: datos
            })
                .then(res => res.json())
                .then(data => {

                    if (data == "error") {
                        alert("TAMANO EXCESIVO");
                        pdfupload();
                    } else {
                        alert("TODO OK");
                        pdfAdmin();
                    }

                })

        })

    }


}


