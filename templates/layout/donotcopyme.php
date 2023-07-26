<!-- Prevent right-click -->
<script type="text/javascript">
	function clickIE() {
		if (document.all) {(message);return false;}
	}
	function clickNS(e) {
		if (document.layers||(document.getElementById&&!document.all)) {
			if (e.which==2||e.which==3) {return false;}}}
			if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;document.onselectstart=clickIE}document.oncontextmenu=new Function("return false")
		</script>
		<script type="text/javascript">
			function disableselect(e){
				return false 
			}
			function reEnable(){ 
				return true 
			} 
		//if IE4+
		document.onselectstart=new Function ("return false")
		//if NS6
		if (window.sidebar){
			document.onmousedown=disableselect 
			document.onclick=reEnable
		} 
</script>
<!-- Prevent right-click -->

<!-- Prevent f12 and ctrl+shift+i and ctrl+u -->
<script>
	$(document).keydown(function(event){
		if(event.keyCode==123){
			return false;
		}
		else if(event.ctrlKey && event.shiftKey && event.keyCode==73){        
		return false;  //Prevent from ctrl+shift+i
		}
		else if(event.ctrlKey && event.keyCode==85){        
		return false;  //Prevent from ctrl+u
		}
	});
</script>
<!-- Prevent f12 and ctrl+shift+i and ctrl+u -->
