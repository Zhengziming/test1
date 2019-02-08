
<?php
    if(!isset($_SESSION["UserID"]))
    {
?>
  
		
    <h1>SignUp</h1>
		<form method="POST">
			<label for='usager'>Nom d'usager : </label>
			<input type="text" id="username" name="username"/><br>
			<label for='password'>Mot de passe : </label>
			<input type="password" name="mdp"/><br>
			<label for='password'>Répéter mdp  : </label>
			<input type="password" name="mdp2"/><br>
            <!-- <input type="password" name="nom"/> préférable pour un mot de passe -->
            <input type="hidden" name="requete" value="signup"/>
			<input type="button" value="SignUp" onclick="Signup()"/>
		</form>		
		<div id="errMessage"></div>
<?php
    }

?>
<script>
function Signup(){
	var username = document.querySelector('input[name="username"]').value;
	var password = document.querySelector('input[name="mdp"]').value;
	var password2 = document.querySelector('input[name="mdp2"]').value;
	
	var err_message = "";
	if(username == ''){
		
		err_message += "Username est NULL!<br>";
		
	}
	if(password == ""){
		
		err_message += "Password est NULL!<br>";
		
	}
	if(password != password2){
		
		err_message += "Password est différent!<br>"
	}
	
	if(err_message != ""){
		
		//var showMessage = document.getElementById('errMessage');
		//showMessage.innerHTML = err_message;
		//document.getElementById('errMessage').innerHTML = err_message;
		showMessage(err_message);
		//alert(showMessage.textContent);
	}else{
		
		ajaxFunction();
	}
	//var showMessage = document.getElementById('errMessage');
		//console.log(showMessage);
}
function showMessage(message){

var showMessage = document.getElementById('errMessage');
showMessage.innerHTML = message;
//alert(showMessage.textContent);

      var count = (function() {
      var timer;
      var i = 0;
          function change(tar) {
              i++;
              console.log(i);
              console.log(showMessage.style.opacity);
              var num = 1-i/100;
              showMessage.style.opacity=num;
              if (i === tar) {
                  clearTimeout(timer);
                  return false;
              }
              timer = setTimeout(function() {
                  change(tar)
              }, 100)
 
 
          }
          return change;
      })()
 
 
      count(100)

}

function ajaxFunction(){
   var ajaxRequest;  // La variable pour Ajax 
  
   ajaxRequest = new XMLHttpRequest();
  
   // Créer une fonction qui recevra les données 
   // envoyées par le serveur et mettra à jour 
   // la div dans la page.
   ajaxRequest.onreadystatechange = function(){
   
      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById('errMessage');
          //ajaxDisplay.innerHTML = ajaxRequest.responseText;
          showMessage(ajaxRequest.responseText);
          
      }
   }
   
   // On récupère les valeurs pour les 
   // transmettre au script serveur.
	var username = document.querySelector('input[name="username"]').value;
	var password = document.querySelector('input[name="mdp"]').value;
   
   var queryString = "?requete=signup&username=" + username ;
   
   queryString +=  "&password=" + password;
   ajaxRequest.open("GET", "./index.php" + queryString, true);
   ajaxRequest.send(null); 
}

</script>					

