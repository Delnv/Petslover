var inputFile = document.getElementById("imagemSub");
var inputFile2 = document.getElementById("imgG2");
var inputFile3 = document.getElementById("imgG3");
var inputFile4 = document.getElementById("imgG4");
var inputFile5 = document.getElementById("imgG5");
var inputFile6 = document.getElementById("imgG6");
var foto = document.getElementById("foto");
var foto2 = document.getElementById("foto2");
var foto3 = document.getElementById("foto3");
var foto4 = document.getElementById("foto4");
var foto5 = document.getElementById("foto5");
var foto6 = document.getElementById("foto6");
if(inputFile.addEventListener){
    inputFile.addEventListener("change", function(){loadFoto(this, foto);});
    inputFile2.addEventListener("change", function(){loadFoto(this, foto2);});
    inputFile3.addEventListener("change", function(){loadFoto(this, foto3);});
    inputFile4.addEventListener("change", function(){loadFoto(this, foto4);});
    inputFile5.addEventListener("change", function(){loadFoto(this, foto5);});
    inputFile6.addEventListener("change", function(){loadFoto(this, foto6);});
}else if(inputFile.attachEvent){
    inputFile.attachEvent("onchange", function(){loadFoto(this, foto);});
    inputFile2.attachEvent("onchange", function(){loadFoto(this, foto2);});
    inputFile3.attachEvent("onchange", function(){loadFoto(this, foto3);});
    inputFile4.attachEvent("onchange", function(){loadFoto(this, foto4);});
    inputFile5.attachEvent("onchange", function(){loadFoto(this, foto5);});
    inputFile6.attachEvent("onchange", function(){loadFoto(this, foto6);});
}

function loadFoto(file, img){
    if(file.files && file.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            img.src = e.target.result;
        };
        reader.readAsDataURL(file.files[0]);
    }
}