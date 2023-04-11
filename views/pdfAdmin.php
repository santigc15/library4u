<?php
session_start();
if (!isset($_SESSION["username"])) {

    header("Location: ../");
}
?>


<div class="pdfbuttonscontainer">
    <a href="" id="pdfview" ><button class="modify-button">View the full library</button></a>
    <a href="" id="pdfupload" ><button class="change-button">Upload your pdf</button></a>
    <a href="" id="pdfmanage" ><button class="delete-button">Manage your uploads</button></a>
</div>