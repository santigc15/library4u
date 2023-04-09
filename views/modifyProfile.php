<?php
session_start();
if (!isset($_SESSION["username"])) {

    header("Location: ../");
}
?>


<div class="form-container">
    <form action="../models/updateuser.php" method="post">

        <label for="username">Username:</label>
        <input type="text" pattern="^[a-zA-Z0-9]+$" name="username" title="Up to 20 mixed alphabetic and numeric characters" maxlength="20" required value="<?php echo $_SESSION["username"] ?>">

        <label for="email">Email:</label>
        <input type="email" name="email" required value="<?php echo $_SESSION["email"] ?>">

        <label for="telefono">Phone number:</label>
        <input type="text" name="telefono" pattern="^[+]?[0-9]{9,13}$" required value="<?php echo $_SESSION["telefono"] ?>">

        <input type="submit" name="modify" value="Modify">
    </form>
</div>