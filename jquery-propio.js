$(document).ready(function(){
   $("a").mouseover(function(event){
      $("#capa").addClass("active");
   });
   $("a").mouseout(function(event){
      $("#capa").removeClass("active");
   });
});