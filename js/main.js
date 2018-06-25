$(document).ready(function(){
	$("#Entrar").click(function(){
		// alert("The paragraph was clicked.");
		$(".msgErro").html("");
		
		$("#nomeLabel").html("Nome");
		$("#emailLabel").html("Email");
		$("#data-nascimentoLabel").html("Data de Nascimento");
		$("#passwordLabel").html("Password");
	});
	


var images = [0, 1, 2, 3],
index = 0;


index = Math.floor(Math.random() * images.length);

$('#banner').css("background-image", "url('imagens/banner"+index+".jpg')");
if(index === 5) {
	document.getElementById("banner_destaque").innerHTML = "Banda Desenhada";
}
$('#banner').show();

});