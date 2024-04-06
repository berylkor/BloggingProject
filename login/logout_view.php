<?php
session_start();

// end the previous session
session_unset();
session_destroy();

// redirect to the login page
header ('Location: ../login/login_view.php');
exit();
?>