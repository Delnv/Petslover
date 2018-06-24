<!DOCTYPE html>
<html>
<head>
	<title>Perfil cão</title>
</head>
<body>
	<div id="container">
			<div class="top">
				<h2><?php echo e($petData->nmPet); ?></h2>
			</div>
			<div class="left">
				<img src="<?php echo e(asset('/image/pet/photo_padrao.png')); ?>" width="150px" height="150px">
			</div>
			<div class="right">
				<table>
					<tr>
						<td><label>Nome: </label></td>
						<td><?php echo e($petData->nmPet); ?></td>
					</tr>
					<tr>
						<td><label>Tipo: </label></td>
						<td><?php echo e($petData->nmTipoPet); ?></td>
					</tr>
					<tr>
						<td><label>Sexo: </label></td>
						<td><?php echo e($petData->icSexoPet); ?></td>
					</tr><tr>
						<td><label>Faixa Etaria: </label></td>
						<td><?php echo e($petData->nmFaixaEtariaPet); ?></td>
					</tr><tr>
						<td><label>Tratador: </label></td>
						<td>Receber</td>
					</tr><tr>
						<td><label>Detalhes: </label></td>
						<td><?php echo e($petData->descPet); ?></td>
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