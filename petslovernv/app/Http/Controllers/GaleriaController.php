<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImagemPet;

class GaleriaController extends Controller
{
    //
	public function index(ImagemPet $imagemPet)
	{
		$imgsPet = $imagemPet->listarImagemPet();

		return view('galeria', ['imgsPet' => $imgsPet]);
	}
}
