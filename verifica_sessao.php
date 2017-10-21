<?php
session_start();
if(isset($_SESSION['logado']) && $_SESSION['logado'] == 'NAO'):
    header("Location: index.php");
endif;
