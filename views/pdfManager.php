<?php
session_start();
if (!isset($_SESSION["username"])) {

    header("Location: ../");
}
?>


<div class="profilebuttonscontainer">
    <a href="" id="modifyProfile" ><button class="modify-button">Profile data modify</button></a>
    <a href="" id="modifyPassword" ><button class="change-button">Change password</button></a>
    <a href="" id="deleteProfile" ><button class="delete-button">Delete Profile</button></a>
</div>