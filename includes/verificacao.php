<?php

// Página de resposta
    $q = $_GET["q"];
    if(!filter_var($q, FILTER_VALIDATE_EMAIL)){
        echo "2";
        exit();
    }
    
    //$con = mysqli_connect("186.202.152.176","helme_petslover","pets1954pg","helme_petslover");--Utilizado no servidor
    $con = mysqli_connect("localhost","root","","petslo71_db_petslover");
    if(!$con){
        die("Connection failure: ".mysqli_error($con));
    }
    $query = "SELECT cdUsuario FROM LOGIN WHERE emailUsuario = '".$q."'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result)<= 0){
        echo "1";
    }else{
        echo "0";
    }
    mysqli_close($con);
    
