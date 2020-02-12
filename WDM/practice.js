var modal=document.getElementById('simpleModal');
var modalBtn=document.getElementById('modalBtn');
var closeBtn=document.getElementsByClassName('close')[0];

if(modalBtn){
		modalBtn.addEventListener('click',openModal);
  }

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

    var modal2=document.getElementById('simpleModal2');
var modalBtn2=document.getElementById('modalBtn2');
var closeBtn2=document.getElementsByClassName('close2')[0];

if(modalBtn2){
    modalBtn2.addEventListener('click',openModal2);
  }

    closeBtn2.addEventListener('click',closeModal2);

    window.addEventListener('click',outsideClick2);
    
    function openModal2() {
      modal2.style.display = "block";
    }

    function closeModal2(){
      modal2.style.display='none';
    }

    function outsideClick2(e2){
      if(e2.target==modal2){
        modal2.style.display='none';
      }
    }


var modal3=document.getElementById('simpleModal3');
var modalBtn3=document.getElementById('modalBtn3');
var closeBtn3=document.getElementsByClassName('close3')[0];

if(modalBtn3){
    modalBtn3.addEventListener('click',openModal3);
  }

    closeBtn3.addEventListener('click',closeModal3);

    window.addEventListener('click',outsideClick3);
    
    function openModal3() {
      modal3.style.display = "block";
    }

    function closeModal3(){
      modal3.style.display='none';
    }

    function outsideClick3(e3){
      if(e3.target==modal3){
        modal3.style.display='none';
      }
    }




   

