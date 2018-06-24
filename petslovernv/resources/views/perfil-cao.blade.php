<!DOCTYPE html>
<html>
<head>
	<title>Perfil cão</title>
</head>
<body>
	<div id="container">
			<div class="top">
				<h2>{{$petData->nmPet}}</h2>
			</div>
			<div class="left">
				<img src="{{asset('/image/pet/photo_padrao.png')}}" width="150px" height="150px">
			</div>
			<div class="right">
				<table>
					<tr>
						<td><label>Nome: </label></td>
						<td>{{$petData->nmPet}}</td>
					</tr>
					<tr>
						<td><label>Tipo: </label></td>
						<td>{{$petData->nmTipoPet}}</td>
					</tr>
					<tr>
						<td><label>Sexo: </label></td>
						<td>{{$petData->icSexoPet}}</td>
					</tr><tr>
						<td><label>Faixa Etaria: </label></td>
						<td>{{$petData->nmFaixaEtariaPet}}</td>
					</tr><tr>
						<td><label>Tratador: </label></td>
						<td>Receber</td>
					</tr><tr>
						<td><label>Detalhes: </label></td>
						<td>{{$petData->descPet}}</td>
					</tr>
				</table>
			</div>
			<hr>
			<div class="bottom">
				<label>Enviar mensagem:</label>
				<br>
				<textarea>
					
				</textarea>
				<br>
				<button>
					Enviar
				</button>
			</div>
	</div>
</body>
</html>