(function(){
	var $={};
   function addEvent(elem,eventType,func){
   try{
	   if(!elem && typeof elem === "object"){
		   if(window.addEventListener){
				elem.addEventListener(eventType,func);  
			}else{
				elem.attachEvent("on"+eventType,func);
			} 
		 }else{
			 throw new Error("不是对象或对象为空"); 
		  }  
	 }catch(error){
     }	
  }	
  $.addEvent=addEvent;
  window.$=$;
})();