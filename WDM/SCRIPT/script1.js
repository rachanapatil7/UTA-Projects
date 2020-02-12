
      
	 function validateForm(){ 

	 	var a= document.forms["isform"]["mail"].value;
	  var b= document.forms["isform"]["pass"].value;
	  var c= document.forms["isform"]["fname"].value;
	  var d= document.forms["isform"]["lname"].value;
	  var e= document.forms["isform"]["address"].value;
	  var f= document.forms["isform"]["city"].value;
	  var g= document.forms["isform"]["postal"].value;
	  var a1=document.getElementById('i1').value;
	  var mailregex = /^[A-Za-z0-9]+@[A-Za-z0-9]+$/;

 		if(a==null||a==""){
 			document.getElementById('error-mail').innerHTML="Mail field canot be empty *";
 			return false;
 		}


	 	
	 			 if (!mailregex.test(a)) {
        document.getElementById('error-mail').innerHTML = "Mail is wrong *";
        	return false;
	 	}
	 	else{
	 		document.getElementById('error-mail').innerHTML = "Mail is correct *";
	 		return false;
	 	}

	  if (b == ""||b==null) {
        document.getElementById('error-pass').innerHTML = "Password field cannot be empty *";
        return false;
    }

     if (c == ""||c==null) {
        document.getElementById('error-fname').innerHTML = "First Name field cannot be empty *";
        return false;
    }

     if (d == ""||d==null) {
        document.getElementById('error-lname').innerHTML = " Last Name field cannot be empty *";
        return false;
    }

     if (e == ""||e==null) {
        document.getElementById('error-address').innerHTML = "Address field cannot be empty *";
        return false;
    }

     if (f == ""||f==null) {
        document.getElementById('error-city').innerHTML = "City field cannot be empty *";
        return false;
    }

     if (g == ""||g==null) {
        document.getElementById('error-postal').innerHTML = "Postal field cannot be empty *";
        return false;
    }

   	return true;
           
}

