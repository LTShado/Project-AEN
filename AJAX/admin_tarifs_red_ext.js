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
  const ht = document.getElementById(nb+'_HT').value;
  const tva = document.getElementById(nb+'_TVA').value;
  const ttc = document.getElementById(nb+'_TTC').value;

  const txt_HT = document.getElementById(nb+'_txt_HT');
  const txt_TVA= document.getElementById(nb+'_txt_TVA');
  const txt_TTC = document.getElementById(nb+'_txt_TTC');

  const request = new XMLHttpRequest();

  request.open("POST","verif/verif_admin_red_ext.php");

  request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  request.onreadystatechange=function(){
    if (request.readyState===4 && request.status===200) {
      if(request.responseText=="ok"){

        txt_HT.innerHTML=ht;
        txt_TVA.innerHTML=tva;
        txt_TTC.innerHTML=ttc;

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
  request.send("HT="+ht+"&TVA="+tva+"&TTC="+ttc+"&id="+id);
}

function error(msg){
  const error = document.getElementById('error');

  error.style.display="block";

  error.innerHTML = msg;
}
