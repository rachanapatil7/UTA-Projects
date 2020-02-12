
function validate()
{
  var a= document.forms["isform"]["fname"].value;
  var b= document.forms["isform"]["lname"].value;
  var c= document.forms["isform"]["mail"].value;
  var d= document.forms["isform"]["topic"].value;
  var e= document.forms["isform"]["message"].value;
  
  var mailregex = /^[A-Za-z0-9]+@[A-Za-z0-9]+$/;
  
  
  if(a == ""||a==null)
  {
    alert("First Name must not be empty");
    return false;
  }
  if(a.length <2)
  {
    alert("First Name must not be short");
    return false;
  }
  if(b == ""||b==null)
  {
    alert("Last Name must not be empty");
    return false;
  }
  if(b.length <2)
  {
    alert("Last Name must not be short");
    return false;
  }


  if(c == ""||c==null)
  {
    alert("EMail must not be empty");
    return false;
  }

  if (!mailregex.test(c)) {
        alert("Please enter mail in proper format");
          return false;
    }

 if(d == ""||d==null)
  {
    alert("Topic must not be empty");
    return false;
  }


  
 
  if(e == ""||e==null)
  {
    alert("Message must not be empty");
    return false;
  }
   
  return true;
  
}