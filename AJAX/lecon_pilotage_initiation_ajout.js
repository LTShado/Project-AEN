function add(){

  const nom = document.getElementById('nom').value;
  const date = document.getElementById('date').value;
  const creneau = document.getElementById('creneau').value;

  const request = new XMLHttpRequest();

  request.open("POST","verif/verif_lecon_pilotage_initiation_ajout.php");

  request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  request.onreadystatechange=function(){
    if (request.readyState===4 && request.status===200) {
      if(request.responseText=="ok"){
        document.location.href="reservation.php?service=lecon_pilotage&success=1";
      }
      else {
        error(request.responseText);
      }
    }
  }

  request.send("nom="+nom+"&date="+date+"&creneau="+creneau);

}

function error(msg){
  const error = document.getElementById('error');

  error.style.display="block";

  error.innerHTML = msg;
}
