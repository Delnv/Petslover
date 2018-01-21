<!DOCTYPE html>
<html>
<head>
	<title>Galeria</title>
</head>
<body>
<h1>Galeria</h1>
Aqui fica a galeria</br>
@if (count($imgsPet) != 0)
	<a href="#">Existem imagens</a>
@else
	Não há nenhuma imagem.
@endif
</body>
</html>