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
  const prix = document.getElementById('prix').value;
  const c_description = document.getElementById('c_description').value;
  const l_description = document.getElementById('l_description').value;
  //const surface = document.getElementById('surface').value;
  const img_emplacement = document.getElementById('img_emplacement').value;
  const duree = document.getElementById('duree').value;
  const statut_loisir = document.getElementById('loisir').value;
  const id = document.getElementById('id').value;

  const txt_nom = document.getElementById('txt_nom');
  const txt_prix = document.getElementById('txt_prix');
  const txt_c_description = document.getElementById('txt_c_description');
  const txt_l_description= document.getElementById('txt_l_description');
  //const txt_surface = document.getElementById('txt_surface');
  const txt_img_emplacement = document.getElementById('txt_img_emplacement');
  const txt_duree= document.getElementById('txt_duree');
  const txt_statut_loisir = document.getElementById('txt_loisir');

  const request = new XMLHttpRequest();

  request.open("POST","verif/verif_admin_services.php");

  request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  request.onreadystatechange=function(){
    if (request.readyState===4 && request.status===200) {
      if(request.responseText=="ok"){

        txt_nom.innerHTML=nom;
        txt_prix.innerHTML=prix;
        txt_c_description.innerHTML=c_description;
        txt_l_description.innerHTML=l_description;
        //txt_surface.innerHTML=birth;
        txt_img_emplacement.innerHTML=img_emplacement;
        txt_duree.innerHTML=duree;
        txt_statut_loisir.innerHTML=statut_loisir;

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
  request.send("nom="+nom+"&prix="+prix+"&c_description="+c_description+"&l_description="+l_description+"&img_emplacement="+img_emplacement+"&duree="+duree+"&statut_loisir="+statut_loisir+"&id="+id);
}

function error(msg){
  const error = document.getElementById('error');

  error.style.display="block";

  error.innerHTML = msg;
}
