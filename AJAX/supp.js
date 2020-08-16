function supprimer(){
  const id = document.getElementById('id').value;
  const request = new XMLHttpRequest();

  request.open("POST","verif/supp_lecon.php");

  request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  request.onreadystatechange=function(){
    if (request.readyState===4 && request.status===200) {
      if(request.responseText=="ok"){
        document.location.href="reservation.php";
      }
    }
  }
  request.send("id="+id);

}
