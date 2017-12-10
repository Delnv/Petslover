<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class LoginController extends Controller
{
    //

    public function index()
    {
    	$login = new Login;

    	$nmEmail = $_POST['nmEmail'];
    	$nmSenha = $_POST['nmSenha'];

    	$cdUsuario = $login->logar($nmEmail, $nmSenha);

    	if ($cdUsuario == 0){
    		return "Usuário ou senha incorretos.";
    	}

    	return $cdUsuario;
    }
}
