
function imgChenger({inputTagID, imgTagID}){
   const inputValue =  document.getElementById(inputTagID).value;;
   document.getElementById(imgTagID).src=inputValue;
}