
<?php
    if(isset($_SESSION["UserID"])){

?>
  
	<div id="loginAccount">
	<h1>My Account</h1>
		<form method="POST">
			<label for='usager'>Nom d'usager : <b> <em> <?php echo $UserID ?>   </b></em></label><br>
			
			<label for='password'>Nouveau Mot de passe : </label>
			<input type="password" name="mdp"/><br>
			<label for='password'>Répéter Mot de passe : </label>
			<input type="password" name="mdp2"/><br>

			<input type="button" value="Modify" onclick='UpdateAccount("<?php echo $UserID ?>")'/>
			<input type="button" value="Cancle" onclick="QuitUpdate()"/><br>
		</form>		
		<div id="errMessage"></div>
		</div>
<?php
    }

?>
<script>

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

