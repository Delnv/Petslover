function check(input) {
    if (input.value != document.getElementById('tsenha').value) {
        input.setCustomValidity('A senha não confere!');
    } else {
        // input is valid -- reset the error message
        input.setCustomValidity('');
    }
}

function formata(mascara, documento) {
    var i = documento.value.length;
    var saida = mascara.substring(0, 1);
    var texto = mascara.substring(i)

    if (texto.substring(0, 1) != saida) {
        documento.value += texto.substring(0, 1);
    }
}
function btFarejar() {
  if (document.busca.selraca.value == "" && document.busca.sexo.value == "") {
        header("Location: lista_completa.php");

     }
}

function btCadastrar() {
    /*if (document.cadastro.tnmpet.value == "") {
       alert('Campo Nome Obrigatório!');
       cadastro.tnmpet.focus();
       return false;
   }
    if (document.cadastro.selraca.value == "" && document.cadastro.traca.value == "") {
        alert('Selecione uma Raça ou Digite Outra Raça!');
        cadastro.selraca.focus();
        return false;
    }
    if (document.cadastro.selraca.value != "" && document.cadastro.traca.value != "") {
        alert('Preencha 1 das 2 opções!!');
        cadastro.selraca.focus();
        return false;
    } */

    escolherTipo = -1;
    for (x = cadastro.tipo.length - 1; x > -1; x--) {
        if (cadastro.tipo[x].checked) {
            escolherTipo = x;
        }
    }
    if (escolherTipo == -1) {
        alert("Por favor, escolha o tipo do animal!");
        cadastro.tipo[0].focus();
        return false;
    }

    escolherSexo = -1;
    for (x = cadastro.sexo.length - 1; x > -1; x--) {
        if (cadastro.sexo[x].checked) {
            escolherSexo = x;
        }
    }
    if (escolherSexo == -1) {
        alert("Informe o Sexo!");
        cadastro.sexo[0].focus();
        return false;
    }

    if (document.cadastro.selporte.value == "") {
        alert('Campo Porte Obrigatório!');
        cadastro.selporte.focus();
        return false;
    }

    if (document.cadastro.dtnasc.value == "") {
        alert('Campo Faixa Etária Obrigatório!');
        cadastro.dtnasc.focus();
        return false;
    }
    /*
    if (document.cadastro.tcor.value == "") {
        alert('Campo Cor Obrigatório!');
        cadastro.tcor.focus();
        return false;
    }*/
           

    if (document.cadastro.tnmprot.value == "") {
        alert('Campo Protetor Obrigatório!');
        cadastro.tnmprot.focus();
        return false;
    }
   /*
    if (document.cadastro.tcep.value == "") {
        alert('Campo Cep Obrigatório!');
        cadastro.tcep.focus();
        return false;
    } */

    if (document.cadastro.temail.value == "") {
        alert('Campo E-mail Obrigatório!');
        cadastro.temail.focus();
        return false;
    }

    if (document.cadastro.tsenha.value == "") {
        alert('Campo Senha Obrigatório!');
        cadastro.tsenha.focus();
        return false;
    }

    if (tsenha.value.length < 6||tsenha.value.length >20) {
        alert('Para sua Segurança digite uma senha com no mínimo 6 caracteres!');
        cadastro.tsenha.focus();
        return false;
    }
    
    if (document.cadastro.tconfsenha.value == "") {
        alert('Confirme a Senha!');
        cadastro.tconfsenha.focus();
        return false;
    }

    if (tconfsenha.value.length < 6||tconfsenha.value.length >20) {
        alert('Senha não confere!');
        cadastro.tsenha.focus();
        return false;
    }    


    if (document.cadastro.termos.checked == false) {
        alert('Você precisa estar de acordo com os termos de uso!');
        cadastro.termos.focus();
        return false;
    }

    return true;
}

function is_img(id) {
    var path = document.getElementById(id).value;
    var ext = path.split('.').pop();
    var extension = ext.toLowerCase();
    if (extension === "jpg" || extension === "png"
            || extension === "jpeg" || extension === "gif") {
        image_Size(id);
    } else {
        confirm("O arquivo não é válido, por favor, carregue outra imagem");
        clearFileInput(id);
    }
}

function image_Size(id) {
    var img = new Image();
    img.src = document.getElementById(id).value;
    if (img.fileSize > 5000000) {
        confirm("O arquivo é muito grande, por favor, carregue outra imagem");
        clearFileInput(id);
    }
}

function clearFileInput(id)
{
    var oldInput = document.getElementById(id);

    var newInput = document.createElement("input");

    newInput.type = "file";
    newInput.id = oldInput.id;
    newInput.name = oldInput.name;
    newInput.className = oldInput.className;
    newInput.style.cssText = oldInput.style.cssText;

    oldInput.parentNode.replaceChild(newInput, oldInput);
}

function getEmail(str) {
    var xhttp;
    if (str === "") {
        document.getElementById("showHint").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            verifyEmail(xhttp.responseText);
        }
    };
    xhttp.open("GET", "includes/verificacao.php?q=" + str, true);
    xhttp.send();
}

function verifyEmail(bool) {
    if (bool === "1") {
        document.getElementById("showHint").innerHTML = "<strong><p style='color: green; font-size: 1.2em'>E-mail válido</p></strong>";
    } else if (bool === "0") {
        document.getElementById("showHint").innerHTML = "<strong><p style='color: red; font-size: 1.2em'>E-mail já cadastrado</p></strong>";
        return false;
    } else if(bool === "2"){
        document.getElementById("showHint").innerHTML = "<strong><p style='color: red; font-size: 1.2em'>Formato inválido de e-mail</p><strong/>";
    }
    else {
        document.getElementById("showHint").innerHTML = "";
    }
}


/*
     function ocultarLogin(obj){
       document.getElementById('logar').style.display="none";
       switch(obj.id){
        case 'div2':
        document.getElementById('logar').style.display="block";
        document.getElementById('div2').style.display="none";
        break;
        case 'btlogin':
        document.getElementById('logar').style.display="none";
        document.getElementById('div2').style.display="block";
        break;
       }
     } */
     
     /*função usada na página de perguntas,esconde div com a resposta e 
     na pag. perfil para esconder os campos na divesq*/ 
 window.onload=function(){
  var alinks=document.getElementById("todas").getElementsByTagName("a")
   for(var x=0; x<alinks.length; x++){
     alinks[x].show=0
     alinks[x].onclick=function(){
          if(this.show==0){
          this.parentNode.getElementsByTagName("span")[0].style.display="block"
          this.show=1
          }
          else{
          this.parentNode.getElementsByTagName("span")[0].style.display="none"
          this.show=0
          }
      return false
    }
 }
}

    //função utilizada para diminuir o header
	$(function(){
			var nav = $('#headernav');
			$(window).scroll(function () {
				if ($(this).scrollTop() > 150) {
					nav.addClass("menuDim");
				} else {
					nav.removeClass("menuDim");
				}
			});
		});
    
      
  /* Ocultar Div com os botoes (login e cadastro) na pag. Pet*/
function ocultarDiv(obj){
       document.getElementById('continuar').style.display="none";
       switch(obj.id){
        case 'div1':
        document.getElementById('continuar').style.display="block";
        document.getElementById('div1').style.display="none";
        break;
        case 'sair':
        document.getElementById('continuar').style.display="none";
        document.getElementById('div1').style.display="block";
        break;
       }
     }
      //funcao para esconder as divs da pag de perfil e menssagem
        function esconderPerfilMensagem(obj){
            document.getElementById('mensagem').style.display="none";
                        
            switch(obj.id){
             case 'msg':
             document.getElementById('mensagem').style.display="block";
             document.getElementById('perfil').style.display="none";
             break;
             case 'perf':
             document.getElementById('mensagem').style.display="none";
             document.getElementById('perfil').style.display="block"; 
             break;
            }
          }