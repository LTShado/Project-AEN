function add(){
  const nom = document.getElementById('nom').value;
  const prenom = document.getElementById('prenom').value;
  const email = document.getElementById('email').value;
  const mdp1 = document.getElementById('mdp1').value;
  const mdp2 = document.getElementById('mdp2').value;
  const postal = document.getElementById('postal').value;
  const birth = document.getElementById('birth').value;
  const tel = document.getElementById('tel').value;

  const request = new XMLHttpRequest();

  request.open("POST","verif/verif_inscription.php");

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

  request.send("nom="+nom+"&prenom="+prenom+"&email="+email+"&mdp1="+mdp1+"&mdp2="+mdp2+
  "&postal="+postal+"&birth="+birth+"&tel="+tel);
}

function error(msg){
  const error = document.getElementById('error');

  error.style.display="block";

  error.innerHTML = msg;
}
