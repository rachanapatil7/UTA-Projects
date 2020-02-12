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




function validate()
{
  var a= document.forms["isform"]["mail"].value;
  var b= document.forms["isform"]["pass"].value;
  var c= document.forms["isform"]["fname"].value;
  var d= document.forms["isform"]["lname"].value;
  var e= document.forms["isform"]["address"].value;
  var f= document.forms["isform"]["city"].value;
  var g= document.forms["isform"]["postal"].value;
  var mailregex = /^[A-Za-z0-9]+@[A-Za-z0-9]+$/;
  var h= document.getElementById("states").value;
 
    
  if(a == ""||a==null)
  {
    alert("EMail must not be empty");
    return false;
  }

  if (!mailregex.test(a)) {
        alert("Please enter mail in proper format");
          return false;
    }
  if(b == ""||b==null)
  {
    alert("Password must not be empty");
    return false;
  }
  if(b.length<8){
    alert("Password should be minimum 8 characters")
    return false;
  }
  if(c == ""||c==null)
  {
    alert("First Name must not be empty");
    return false;
  }
  if(c.length <2)
  {
    alert("First Name must not be short");
    return false;
  }
  if(d == ""||d==null)
  {
    alert("Last Name must not be empty");
    return false;
  }
  if(d.length <2)
  {
    alert("Last Name must not be short");
    return false;
  }
  if(e == ""||e==null)
  {
    alert("Address must not be empty");
    return false;
  }
  if(f == ""||f==null)
  {
    alert("City must not be empty");
    return false;
  }
   if(g == ""||g==null)
  {
    alert("Postal must not be empty");
    return false;
  }

  if(h=="state")
  {
    alert("Please select state");
    return false;
  }

  return true;
  
}

function validate2()
{
    var a= document.forms["isform2"]["mail"].value;
  var b= document.forms["isform2"]["pass"].value;
  var c= document.forms["isform2"]["fname"].value;
  var d= document.forms["isform2"]["lname"].value;
  var e= document.forms["isform2"]["address"].value;
  var f= document.forms["isform2"]["city"].value;
  var g= document.forms["isform2"]["postal"].value;
  var mailregex = /^[A-Za-z0-9]+@[A-Za-z0-9]+$/;
  var h= document.getElementById("states").value;
 
    
  if(a == ""||a==null)
  {
    alert("EMail must not be empty");
    return false;
  }

  if (!mailregex.test(a)) {
        alert("Please enter mail in proper format");
          return false;
    }
  if(b == ""||b==null)
  {
    alert("Password must not be empty");
    return false;
  }
  if(b.length<8){
    alert("Password should be minimum 8 characters")
    return false;
  }
  if(c == ""||c==null)
  {
    alert("First Name must not be empty");
    return false;
  }
  if(c.length <2)
  {
    alert("First Name must not be short");
    return false;
  }
  if(d == ""||d==null)
  {
    alert("Last Name must not be empty");
    return false;
  }
  if(d.length <2)
  {
    alert("Last Name must not be short");
    return false;
  }
  if(e == ""||e==null)
  {
    alert("Address must not be empty");
    return false;
  }
  if(f == ""||f==null)
  {
    alert("City must not be empty");
    return false;
  }
  
   if(g == ""||g==null)
  {
    alert("Postal must not be empty");
    return false;
  }

 

  return true;
  
}

function validate3()
{
   var a= document.forms["isform3"]["mail"].value;
  var b= document.forms["isform3"]["pass"].value;
  var c= document.forms["isform3"]["fname"].value;
  var d= document.forms["isform3"]["lname"].value;
  var e= document.forms["isform3"]["address"].value;
  var f= document.forms["isform3"]["city"].value;
  var g= document.forms["isform3"]["postal"].value;
  var mailregex = /^[A-Za-z0-9]+@[A-Za-z0-9]+$/;
  var h= document.getElementById("states").value;
 
    
  if(a == ""||a==null)
  {
    alert("EMail must not be empty");
    return false;
  }

  if (!mailregex.test(a)) {
        alert("Please enter mail in proper format");
          return false;
    }
  if(b == ""||b==null)
  {
    alert("Password must not be empty");
    return false;
  }
  if(b.length<8){
    alert("Password should be minimum 8 characters")
    return false;
  }
  if(c == ""||c==null)
  {
    alert("First Name must not be empty");
    return false;
  }
  if(c.length <2)
  {
    alert("First Name must not be short");
    return false;
  }
  if(d == ""||d==null)
  {
    alert("Last Name must not be empty");
    return false;
  }
  if(d.length <2)
  {
    alert("Last Name must not be short");
    return false;
  }
  if(e == ""||e==null)
  {
    alert("Address must not be empty");
    return false;
  }
  if(f == ""||f==null)
  {
    alert("City must not be empty");
    return false;
  }
  
   if(g == ""||g==null)
  {
    alert("Postal must not be empty");
    return false;
  }

 

  return true;
}

