function search(){

  const ville = document.getElementById('ville').value;

  const request = new XMLHttpRequest();
  request.open("POST","verif/verif_meteo.php");
  request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");


  request.onreadystatechange=function(){
    if (request.readyState===4 && request.status===200) {
      if(request.responseText=="ok"){
          infos_meteo.style.display="none";
        }
        else {
          infos_meteo(request.responseText);
        }
      }
      if (request.readyState===4 && request.status===500) {
        infos_meteo("<p class=\"error_meteo\">ville inconnue</p>");
      }
    }
    request.send("ville="+ville);
}

function infos_meteo(msg){
  const infos_meteo = document.getElementById('infos_meteo');

  infos_meteo.style.display="block";
  infos_meteo.innerHTML = msg;
}
