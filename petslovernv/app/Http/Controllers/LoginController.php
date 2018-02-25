<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Usuario;

class LoginController extends Controller
{
    //

    public function index(Request $request, Usuario $user)
    {
    	$login = new Login;

    	$nmEmail = $_POST['email'];
    	$nmSenha = $_POST['senha'];

    	$cdUsuario = $login->logar($nmEmail, $nmSenha);

    	if ($cdUsuario == 0){
    		return "Usuário ou senha incorretos.";
    	}

        $usuario = $user->selecionarUsuario($cdUsuario);

        $request->session()->put('usuario', $usuario);

    	return redirect('/perfil');
    }
}
