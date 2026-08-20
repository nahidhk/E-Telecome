function logout() {
    window.location.href = "logout.php"
}



function sideBarTogelMenu(){
  const sidebarMenu = document.getElementById("sideBar");
  sidebarMenu.style.display="block";
}
function popupOpen({id , style}){
  document.getElementById(id).style.display=style;
}
function popupClose(data){
  document.getElementById(data).style.display="none";
}
function callBack(){
  window.history.back()
}