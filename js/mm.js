window.onload=function(){
				var pwd=document.getElementById("pwd");
				var yz=document.getElementById("yz");
				var ruo=document.getElementById("ruo");
				var zh=document.getElementById("zh");
				var gao=document.getElementById("gao");
				var div1=document.getElementById("div1");
				
				var regStr=/[a-zA-Z]/;
				var regNum=/[0-9]/;
				var fStrNum=/\W/;
				
				pwd.onkeyup=function(){
					if(pwd.value.length<=16){
						yz.style.display="block";
						div1.style.display="none";
						if((pwd.value.length>=6 && regNum.test(pwd.value)) || (pwd.value.length>=6 && regStr.test(pwd.value))){
							ruo.style.display="inline-block";
							ruo.style.background="red";
							ruo.innerHTML="弱";
						}else if(pwd.value.length<6){
							ruo.style.display="none";
							zh.style.display="none";
							gao.style.display="none";
						}
						
						if(pwd.value.length>=6 && regNum.test(pwd.value) && regStr.test(pwd.value)){
							zh.style.display="inline-block";
							zh.style.background="yellowgreen";
							ruo.style.background="yellowgreen";
							ruo.style.display="inline-block";
							ruo.innerHTML="&nbsp;";
						}else if(pwd.value.length>=6 && regStr.test(pwd.value)){
							zh.style.display="none";
							ruo.innerHTML="弱";
						}
						
						if(pwd.value.length>=6 && regStr.test(pwd.value) && regNum.test(pwd.value) && fStrNum.test(pwd.value)){
							gao.style.cssText="display: inline-block;background: green;";
							zh.style.cssText="display: inline-block;background: green;";
							ruo.style.cssText="display: inline-block;background: green;";
							zh.innerHTML="&nbsp;";
							ruo.innerHTML="&nbsp;";
						}else if((pwd.value.length>=6 && regNum.test(pwd.value) && regStr.test(pwd.value)) || (pwd.value.length>=6 && regNum.test(pwd.value) && fStrNum.test(pwd.value)) || (pwd.value.length>=6 && fStrNum.test(pwd.value) && regStr.test(pwd.value))){
							zh.style.cssText="display: inline-block;background: yellowgreen;";
							ruo.style.cssText="display: inline-block;background: yellowgreen;";
							gao.style.display="none";
							zh.innerHTML="中";
							ruo.innerHTML="&nbsp;";
						}
					}else{
						yz.style.display="none";
						div1.style.display="block";
					}
				}
			}