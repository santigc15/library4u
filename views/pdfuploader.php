<?php
session_start();
if (!isset($_SESSION["username"])) {

    header("Location: ../");
}
?>


<div class="form-container">
    <form action="upload.php" method="post" enctype="multipart/form-data" class="two">

        <div id="div_file">
            <p id="texto">Add file</p>
            <input type="file" id="btn_enviar" required>
        </div>

        <input type="submit" value="Submit File" id="btn_charge">
    </form>
</div>

