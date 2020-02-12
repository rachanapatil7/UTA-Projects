<!DOCTYPE html></!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/leanevent.css">
	<title>modal</title>
	
</head>
<body>
<button id="modalBtn" class="button">Como individual</button>

		
		<div id="simpleModal" class="modal">
	<div class="modal-content">
		<span class="close">&times;</span>
		<p>Hello..I am a model</p>
	</div>
</div>
<script type="text/javascript">
		var modal=document.getElementById('simpleModal');
		var modalBtn=document.getElementById('modalBtn');
		var closeBtn=document.getElementsByClassName('close')[0];

		modalBtn.addEventListener('click',openModal);

		closeBtn.addEventListener('click',closeModal);

		window.addEventListener('click',outsideClick);
		
		function openModal() {
  		modal.style.display = "block";
		}

		function closeModal(){
			modal.style.display='none';
		}

		function outsideClick(e){
			if(e.target==modal){
				modal.style.display='none';
			}
		}
</script>
</body>
</html>