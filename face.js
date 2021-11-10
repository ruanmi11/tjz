(function(){
	var img1=document.getElementById("img1");
	var face=document.getElementById("face");
	addEvent(face,"change",function(){
		img1.src="images/face/"+face.value;
	})
})();