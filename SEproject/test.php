<html lang="zh-TW">
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<script>
	function init() {
		var es = new EventSource('check.php?player=1');
		es.addEventListener('message', function(e) {
			var str =  e.data ;
			// (str === 2323){
				document.getElementById('msg1').innerHTML = str;
			// }
		}, false);
	}
</script>


<h1 id="msg1" class="msg"></h1>


<script>
init();
</script>