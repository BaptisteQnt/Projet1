<?php
// Permet la déconnexion de l'utilisateur en mettant fin a sa session.
    session_destroy();
    header('location: index.php?home');
    exit();
?>