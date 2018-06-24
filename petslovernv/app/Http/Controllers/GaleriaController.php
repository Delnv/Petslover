<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImagemPet;
use App\Models\Pet;
use App\Models\Usuario;

class GaleriaController extends Controller
{
    /**
    	Retorna para a view um array contendo o 
    	codigo do pet e o nome da imagem
    */
	public function index(ImagemPet $imagemPet)
	{
		$imgsPet = $imagemPet->listarImagemPet();

		return view('galeria', ['imgsPet' => $imgsPet]);
	}

	/**
		Exibe as informações do pet de acordo com 
		o código enviado através do parametro
	*/
	public function show($cdPet)
	{
		$pet = new Pet;
		$petData = $pet->selecionarPet($cdPet);

		return view('perfil-cao', ['petData' => $petData]);
	}
}