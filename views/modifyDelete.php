<?php
session_start();
if (!isset($_SESSION["username"])) {

    header("Location: ../");
}
?>





  <div class="delete-container">
  <form action="../models/deleteprofile.php" method="post" class="one"> 
  <span>Are you sure to delete your profile?</span>
    <input type="submit" name="delete" value="Yes" id="yesbtn">
    <input type="submit" name="delete" value="No"  id="nobtn">
  </form>

</div>