<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../");
}
?>


<div class="form-container">
    <form action="../models/updatepassword.php" method="post">


        <label>Password:</label>
        <input type="password" name="newpassword" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,12}" title="At least:1 uppercase, 1 lowercase, 1 number. Length between 8 and 12 characters"  minlength="8" maxlength="12" required placeholder="Type your new password ...">

        <input type="submit" name="modify" value="Modify">
    </form>
</div>