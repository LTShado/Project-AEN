function add(){
  const service = document.getElementById('service').value;
  const service_index = document.getElementById("service").selectedIndex;
  const statut_site = document.getElementById('statut_site').value;

  var nom;
  var date;
  var debut;
  var fin;
  var nom_avitaillement;
  var date_avitaillement;
  var debut_avitaillement;
  var fin_avitaillement;
  var emplacement;

  if(statut_site==0){
    var emplacement_select = document.getElementsByName('emplacement');

    for (var i = 0, length = emplacement_select.length; i < length; i++) {
      if (emplacement_select[i].checked) {
        // do whatever you want with the checked radio
        emplacement = emplacement_select[i].value;
        // only one radio can be logically checked, don't check the rest
        break;
      }
    }
    nom = document.getElementById('nom_stationnement').value;
    date = document.getElementById('date_stationnement').value;
    debut = document.getElementById('debut_stationnement').value;
    fin = document.getElementById('fin_stationnement').value;

    nom_avitaillement = document.getElementById('nom_avitaillement').value;
    date_avitaillement = document.getElementById('date_avitaillement').value;
    debut_avitaillement = document.getElementById('debut_avitaillement').value;
    fin_avitaillement = document.getElementById('fin_avitaillement').value;
  }


  if(statut_site==1){
    nom = document.getElementById('nom_nettoyage').value;
    date = document.getElementById('date_nettoyage').value;
    debut = document.getElementById('debut_nettoyage').value;
    fin = document.getElementById('fin_nettoyage').value;

    /*const date_avitaillement_dispo = document.getElementById('date_avitaillement_dispo').value;
    const debut_avitaillement_dispo = document.getElementById('debut_avitaillement_dispo').value;
    const fin_avitaillement_dispo = document.getElementById('fin_avitaillement_dispo').value;*/
  }

  const request = new XMLHttpRequest();

  request.open("POST","verif/verif_service_pilote_ajout.php");

  request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  request.onreadystatechange=function(){
    if (request.readyState===4 && request.status===200) {
      if(request.responseText=="ok"){
        document.location.href="reservation.php?service=service_pilote&success=1";
      }
      else {
        error(request.responseText);
      }
    }
  }
  if(service_index==1){
    request.send("service="+service_index+"&emplacement="+emplacement+"&nom_stationnement="+nom+
    "&date_stationnement="+date+"&debut_stationnement="+debut+"&fin_stationnement="+fin);
  }
  if(service_index==2){
    request.send("service="+service_index+"&nom_avitaillement="+nom_avitaillement+
    "&date_avitaillement="+date_avitaillement+"&debut_avitaillement="+debut_avitaillement+"&fin_avitaillement="+fin_avitaillement);
  }
  if(service_index==3){
    request.send("service="+service_index+"&nom_nettoyage="+nom+
    "&date_nettoyage="+date+"&debut_nettoyage="+debut+"&fin_nettoyage="+fin);
  }

}

function error(msg){
  const error = document.getElementById('error');

  error.style.display="block";

  error.innerHTML = msg;
}

function add_row_service_pilote(){
  const input_stationnement = document.getElementsByClassName('input_stationnement');
  const input_avitaillement = document.getElementsByClassName('input_avitaillement');
  const input_nettoyage = document.getElementsByClassName('input_nettoyage');
  const service = document.getElementById("service").selectedIndex;

  if(service==1){
    for(var i = 0;i<input_stationnement.length;i++){
      input_stationnement[i].style.display="block";
    }
  }
  if(service==2 || service==3){
    for(var i = 0;i<input_stationnement.length;i++){
      input_stationnement[i].style.display="none";
    }
  }

  if(service==2){
    for(var i = 0;i<input_avitaillement.length;i++){
      input_avitaillement[i].style.display="block";
    }
  }
  if(service==1 || service==3){
    for(var i = 0;i<input_avitaillement.length;i++){
      input_avitaillement[i].style.display="none";
    }
  }

  if(service==3){
    for(var i = 0;i<input_nettoyage.length;i++){
      input_nettoyage[i].style.display="block";
    }
  }
  if(service==1 || service==2){
    for(var i = 0;i<input_nettoyage.length;i++){
      input_nettoyage[i].style.display="none";
    }
  }

}
