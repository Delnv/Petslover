<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Usuário</title>
</head>
<body>
	<h3>Cadastro de doador</h3>
	<form method="POST" action="/cadastrar/usuario">
		{{csrf_field()}}
		<label>Nome do doador</label>
		<input type="text" name="nmUsuario">
		<br>
		<label>Cep</label>
		<input type="text" name="cdCep">
		<br>
		<label>Email:</label>
		<input type="email" name="nmEmail">
		<br>
		<label>Senha:</label>
		<input type="password" name="nmSenha">
		<br>

		<h3>Cadastro de Pet</h3>
		<br>
		<label>Nome do Pet</label>
		<input type="text" name="mnPet">
		<br>
		<label>Tipo do pet</label>
		<input type="text" name="tipoPet">
		<br>
		<label>IC sexo do Pet</label>
		<input type="text" name="sexoPet">
		<br>
		<label>Tamanho do pet</label>
		<input type="text" name="portePet">
		<br>
		<label>Faixa Etaria</label>
		<input type="text" name="faixaEtaria">
		<br>
		<label>Descrição</label>
		<textarea name="descPet">
		</textarea>
		<br>
		<input type="submit" name="Cadastrar">
	</form>
</body>
</html>