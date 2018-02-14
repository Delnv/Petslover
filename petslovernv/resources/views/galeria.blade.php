<!DOCTYPE html>
<html>
<head>
	<title>Galeria</title>
</head>
<body>
<h1>Galeria</h1>
<table>
@if (count($imgsPet) != 0)
	@foreach($imgsPet as $img)
		<tr>
			<td>
				<a href='/perfil-cao/{{ $img->cdPet }}'><img src="{{ asset($img->nmImgPet) }}"></a>
			</td>
		</tr>
	@endforeach
@else
	Não há nenhuma imagem.
@endif
</table>
</body>
</html>