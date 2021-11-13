(function(){
	var $={};
   function addEvent(elem,eventType,func){
   try{
	   if(!elem && typeof elem === "object"){
		   if(window.addEventListener){
			    //IE9+
				elem.addEventListener(eventType,func);  
			}else{
				//IE6-8
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