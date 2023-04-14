<?php
session_start();
if (!isset($_SESSION["username"])) {

    header("Location: ../");
}
?>


<div class="form-container">
    <form action="../models/upload.php" method="post" enctype="multipart/form-data" class="two">

        <div id="div_file">
            <p id="texto">Add file (up to 25 Mb )</p>
            <input type="file" name="archivo" id="btn_enviar" accept="application/pdf" maxlength="26214400" required>
        </div>

        <input type="submit" name="submitted" value="Submit File" id="btn_charge">
    </form>
</div>

