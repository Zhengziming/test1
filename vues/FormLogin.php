
<?php
    if(!isset($_SESSION["UserID"]))
    {
?>
  
	<div id='loginAccount'>	
    <h1>Login</h1>
		<form method="POST">
			<label for='usager'>Nom d'usager : </label>
			<input type="text" id="username" name="username"/><br>
			<label for='password'>Mot de passe : </label>
			<input type="password" name="mdp"/><br>

            <!-- <input type="password" name="nom"/> préférable pour un mot de passe -->
            <input type="hidden" name="requete" value="login"/>
			<input type="button" value="Login" onclick="Login()"/>
		</form>		
		<div id="errMessage"></div>
		</div>
<?php
    }

?>
<script>
function Login(){
	var username = document.querySelector('input[name="username"]').value;
	var password = document.querySelector('input[name="mdp"]').value;
	
	var err_message = "";
	if(username == ''){
		
		err_message += "Username est NULL!<br>";
		
	}
	if(password == ""){
		
		err_message += "Password est NULL!<br>";
		
	}

	if(err_message != ""){
		

		showMessage(err_message);

	}else{
		
		ajaxLoginFunction();
	}

}
function showMessage(message){

	var showMessage = document.getElementById('errMessage');
	showMessage.innerHTML = message;


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
 
 
      count(100);

}

function ajaxLoginFunction(){
   var ajaxRequest;  // La variable pour Ajax 
  
   ajaxRequest = new XMLHttpRequest();
  
   // Créer une fonction qui recevra les données 
   // envoyées par le serveur et mettra à jour 
   // la div dans la page.
   ajaxRequest.onreadystatechange = function(){
   
      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById('errMessage');
          //ajaxDisplay.innerHTML = ajaxRequest.responseText;
		  var temp = trim(ajaxRequest.responseText);
		 
		  if(temp != '"true"'){
			showMessage(ajaxRequest.responseText);
		  }else{
			  location.href = "./index.php";
			 // FormModifyAccount(username);
		  }
          
      }
   }
   
   // On récupère les valeurs pour les 
   // transmettre au script serveur.
	var username = document.querySelector('input[name="username"]').value;
	var password = document.querySelector('input[name="mdp"]').value;
   
   var queryString = "?requete=login&username=" + username ;
   
   queryString +=  "&password=" + password;
   ajaxRequest.open("GET", "./index.php" + queryString, true);
   ajaxRequest.send(null); 
}

function FormModifyAccount(username){
	var account = document.querySelector('#loginAccount');
	var stringHTML = `
	<div id="loginAccount">
	<h1>My Account</h1>
		<form method="POST">
			<label for='usager'>Nom d'usager : <b> <em> ` + username + ` </b></em></label><br>
			
			<label for='password'>Nouveau Mot de passe : </label>
			<input type="password" name="mdp"/><br>
			<label for='password'>Répéter Mot de passe : </label>
			<input type="password" name="mdp2"/><br>

			<input type="button" value="Modify" onclick='UpdateAccount("` + username +`")'/>
			<input type="button" value="Cancle" onclick="QuitUpdate()"/><br>
		</form>		
		<div id="errMessage"></div>
		</div>`;
	account.innerHTML = stringHTML;
}

function trim(str){ 
　　     return str.replace(/(^\s*)|(\s*$)/g, "");
　　 }

function UpdateAccount(username){

	var password = document.querySelector('input[name="mdp"]').value;
	var password2 = document.querySelector('input[name="mdp2"]').value;
	
	var err_message = "";

	if(password == ""){
		
		err_message += "Password est NULL!<br>";
		
	}
	if(password != password2){
		
		err_message += "Password est différent!<br>"
	}
	
	if(err_message != ""){

		showMessage(err_message);
		
	}else{
		
		ajaxUpdateUserFunction(username);
	}
}

function ajaxUpdateUserFunction(username){
   var ajaxRequest;  // La variable pour Ajax 
  
   ajaxRequest = new XMLHttpRequest();
  
   // Créer une fonction qui recevra les données 
   // envoyées par le serveur et mettra à jour 
   // la div dans la page.
   ajaxRequest.onreadystatechange = function(){
   
      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById('errMessage');
          //ajaxDisplay.innerHTML = ajaxRequest.responseText;
		  var temp = trim(ajaxRequest.responseText);
		 
		  if(temp != '"true"'){
					showMessage(ajaxRequest.responseText);
		  }else{
			  showMessage('Update Success!');
			 
		  }
          
      }
   }
   
   // On récupère les valeurs pour les 
   // transmettre au script serveur.

	var password = document.querySelector('input[name="mdp"]').value;
   
   var queryString = "?requete=updateUser&username=" + username ;
   
   queryString +=  "&password=" + password;
   ajaxRequest.open("GET", "./index.php" + queryString, true);
   ajaxRequest.send(null); 
}

function QuitUpdate(){
	location.href = "./index.php";
}


</script>					

