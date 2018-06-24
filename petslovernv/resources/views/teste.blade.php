<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="/testeup" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="file" name="userFile[]">
	<br>
	<input type="file" name="userFile[]">
	<br>
	<input type="file" name="userFile[]">
	<br>
	<input type="submit" name="Enviar">
</form>
</body>
</html>