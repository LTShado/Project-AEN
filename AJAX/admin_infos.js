function modify(){
  const infos = document.getElementsByClassName('text_infos');
  const btn_modify = document.getElementById('btn_modify');
  const infos_input = document.getElementsByClassName('input');
  const btn_enregistrer = document.getElementById('btn_enregistrer');

  for(var i = 0;i<infos.length;i++){
    infos[i].style.display="none";
  }

  btn_modify.style.display="none";

  for(var i = 0;i<infos_input.length;i++){
    infos_input[i].style.display="block";
  }

  btn_enregistrer.style.display ="block";
}

function enregistrer(){
  const nom = document.getElementById('nom').value;
  const prenom = document.getElementById('prenom').value;
  const email = document.getElementById('email').value;
  const postal = document.getElementById('postal').value;
  const tel = document.getElementById('tel').value;
  const birth = document.getElementById('birth').value;
  const statut_pilote = document.getElementById('statut_pilote').value;
  const id = document.getElementById('id').value;

  const txt_nom = document.getElementById('txt_nom');
  const txt_prenom = document.getElementById('txt_prenom');
  const txt_email = document.getElementById('txt_email');
  const txt_postal = document.getElementById('txt_postal');
  const txt_tel = document.getElementById('txt_tel');
  const txt_birth = document.getElementById('txt_birth');
  const txt_statut_pilote = document.getElementById('txt_statut_pilote');
  const txt_civ = document.getElementById('txt_civ');

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

  const request = new XMLHttpRequest();

  request.open("POST","verif/verif_admin_infosu.php");

  request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  request.onreadystatechange=function(){
    if (request.readyState===4 && request.status===200) {
      if(request.responseText=="ok"){

        txt_nom.innerHTML=nom;
        txt_prenom.innerHTML=prenom;
        txt_email.innerHTML=email;
        txt_postal.innerHTML=postal;
        txt_birth.innerHTML=birth;
        txt_tel.innerHTML=tel;
        txt_statut_pilote.innerHTML=statut_pilote;
        txt_civ.innerHTML=gender;

        const infos = document.getElementsByClassName('text_infos');
        const btn_modify = document.getElementById('btn_modify');
        const infos_input = document.getElementsByClassName('input');
        const btn_enregistrer = document.getElementById('btn_enregistrer');
        const error = document.getElementById('error');

        error.style.display="none";

        for(var i = 0;i<infos.length;i++){
          infos[i].style.display="block";
        }

        btn_modify.style.display="block";

        for(var i = 0;i<infos_input.length;i++){
          infos_input[i].style.display="none";
        }

        btn_enregistrer.style.display ="none";

      }
      else {
        error(request.responseText);
      }
    }
  }
  request.send("nom="+nom+"&prenom="+prenom+"&email="+email+"&postal="+postal+"&tel="+tel+"&birth="+birth+"&statut_pilote="+statut_pilote+"&id="+id+"&gender="+gender);
}

function error(msg){
  const error = document.getElementById('error');

  error.style.display="block";

  error.innerHTML = msg;
}
