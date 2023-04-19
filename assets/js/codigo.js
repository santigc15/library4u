window.onload = function () {

    pdfAdmin();

    function pdfAdmin() {
        fetch('pdfAdmin.php')
            .then(response => response.text())
            .then(data => {
                var contenido = document.getElementById('profile');
                contenido.innerHTML = data;



                var miView = document.getElementById('pdfview');
                miView.onclick = function (event) {
                    event.preventDefault();
                    pdfview();
                }





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


    function pdfview() {


        //------obtener todos los pdf-----              
        fetch('../models/getpdfs.php')
            .then(response => response.json())
            .then(data => {
                


                var contenido = document.getElementById('profile');
                contenido.innerHTML = `
                <div id="wrapper">
                  <div class="grid-container" id="grid-container">

                  </div>
                </div>`
                var contenido = document.getElementById('grid-container');
                for (let valor of data) {
                    noextensionname = (valor.filename).split('.');
                    noextensionname.pop();
                    contenido.innerHTML += `
                    <div class="grid-item">
                    <div class="filename">`+ noextensionname + `</div>
                    <div class="fileinfo">
                        <div class="filesize">Size: `+ ((valor.filesize / 1024) / 1024).toFixed(2) + ` Mb</div>
                        <div class="space"></div>
                        <div class="downloads">downloads: `+ valor.downloads + `</div>
                    </div>
                    <form action="../models/descargar.php" method="post" id="form2" class="none">
                    <input type="hidden" name="idlibro" value="`+ valor.id + `" id="miValueId" class="hiddenclass">
                    <button type="submit" class="botondown" id="down_botton">Download</button>
                    </form>
                    </div>`

                }


            })

    }






}


