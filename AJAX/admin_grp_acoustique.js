function modify(nb){
  const infos = document.getElementsByClassName(nb);
  const btn_modify = document.getElementById(nb+'_btn_modify');
  const infos_input = document.getElementsByClassName(nb+'_input');
  const btn_enregistrer = document.getElementById(nb+'_btn_enregistrer');

  for(var i = 0;i<infos.length;i++){
    infos[i].style.display="none";
  }

  btn_modify.style.display="none";

  for(var i = 0;i<infos_input.length;i++){
    infos_input[i].style.display="block";
  }

  btn_enregistrer.style.display ="block";

}

function enregistrer(id,nb){
  const grp_acoustique = document.getElementById(nb+'_grp_acoustique').value;
  const coeff_jour = document.getElementById(nb+'_coeff_jour').value;
  const coeff_nuit = document.getElementById(nb+'_coeff_nuit').value;

  const txt_grp_acoustique = document.getElementById(nb+'_txt_grp_acoustique');
  const txt_coeff_jour= document.getElementById(nb+'_txt_coeff_jour');
  const txt_coeff_nuit = document.getElementById(nb+'_txt_coeff_nuit');

  const request = new XMLHttpRequest();

  request.open("POST","verif/verif_admin_grp_acoustique.php");

  request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  request.onreadystatechange=function(){
    if (request.readyState===4 && request.status===200) {
      if(request.responseText=="ok"){

        txt_grp_acoustique.innerHTML=grp_acoustique;
        txt_coeff_jour.innerHTML=coeff_jour;
        txt_coeff_nuit.innerHTML=coeff_nuit;

        const infos = document.getElementsByClassName(nb);
        const btn_modify = document.getElementById(nb+'_btn_modify');
        const infos_input = document.getElementsByClassName(nb+'_input');
        const btn_enregistrer = document.getElementById(nb+'_btn_enregistrer');
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
  request.send("grp_acoustique="+grp_acoustique+"&coeff_jour="+coeff_jour+"&coeff_nuit="+coeff_nuit+"&id="+id);
}

function error(msg){
  const error = document.getElementById('error');

  error.style.display="block";

  error.innerHTML = msg;
}
