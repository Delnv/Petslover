<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImagemPet;

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
}
