<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
    	//Enviar para a página principal
    	return view('welcome');
    }

    public function teste()
    {
    	return view('teste');
    }

    public function testeUpload(Request $request)
    {
    	$destinationPath = 'C:\wamp64\www\Delnv5\image-server\NovoPets\pets';
    	if($request->hasFile('userFile')){
    		$userFile = $request->file('userFile');
    		foreach($userFile as $file){
    			//$filename = $file->getClientOriginalName();
    			//$file->move($destinationPath, $filename);
    			echo "Nome: ".$file->getClientOriginalName();
    			echo "Tipo Mime: ".$file->getMimeType()."<br>";
    		}
    	}else{
    		echo "NOp ";
    	}
    }
}
