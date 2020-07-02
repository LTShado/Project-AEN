function connect(){
  const email = document.getElementById('email').value;
  const mdp = document.getElementById('mdp').value;

  const request = new XMLHttpRequest();

  request.open("POST","verif/verif_connexion.php");

  request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  request.onreadystatechange=function(){
    if (request.readyState===4 && request.status===200) {
      if(request.responseText=="ok"){
        document.location.href="index.php";
      }
      else {
        error(request.responseText);
      }
    }
  }

  request.send("email="+email+"&mdp="+mdp);
}

function error(msg){
  const error = document.getElementById('error');

  error.style.display="block";

  error.innerHTML = msg;
}
