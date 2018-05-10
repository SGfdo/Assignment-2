<?php

session_start();

setcookie("session", "", time() - 3600); //send browser command remove session-id from cookie
setcookie("csrf", "", time() - 3600);

session_destroy(); //remove session-id-login from server storage
session_write_close();

header('Location: ./index.php');

?>