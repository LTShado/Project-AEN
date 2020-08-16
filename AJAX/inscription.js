function add(){
  const nom = document.getElementById('nom').value;
  const prenom = document.getElementById('prenom').value;
  const email = document.getElementById('email').value;
  const mdp1 = document.getElementById('mdp1').value;
  const mdp2 = document.getElementById('mdp2').value;
  const postal = document.getElementById('postal').value;
  const birth = document.getElementById('birth').value;
  const tel = document.getElementById('tel').value;
  const nom_avion = document.getElementById('nom_avion').value;
  const marque_avion = document.getElementById('marque_avion').value;
  const type_avion = document.getElementById('type_avion').value;
  const masse = document.getElementById('masse').value;
  const longueur = document.getElementById('longueur').value;
  const envergure = document.getElementById('envergure').value;
  const grp_acoustique = document.getElementById('grp_acoustique').value;

  var gender;
  var gender_select = document.getElementsByName('gender');

  for (var i = 0, length = gender_select.length; i < length; i++) {
    if (gender_select[i].checked) {
      // do whatever you want with the checked radio
      gender = gender_select[i].value;
      // only one radio can be logically checked, don't check the rest
      break;
    }
  }

  var check = document.getElementById('check');
  var statut_check;

  if(check.checked){
      statut_check = 1;
  }
  else{
      alert('Checkbox non coché !');
  }

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
  "&postal="+postal+"&birth="+birth+"&tel="+tel+"&gender="+gender+"&statut_check="+statut_check+
  "&nom_avion="+nom_avion+"&type_avion="+type_avion+"&marque_avion="+marque_avion+"&masse="+masse+
  "&longueur="+longueur+"&envergure="+envergure+"&grp_acoustique="+grp_acoustique);
}

function error(msg){
  const error = document.getElementById('error');

  error.style.display="block";

  error.innerHTML = msg;
}

function add_row_avion(){
  var check = document.getElementById('check');
  const input_avion = document.getElementsByClassName('input');

  if(check.checked){
      for(var i = 0;i<input_avion.length;i++){
        input_avion[i].style.display="block";
      }
  }
  if(!check.checked){
      for(var i = 0;i<input_avion.length;i++){
        input_avion[i].style.display="none";
      }
  }
}
