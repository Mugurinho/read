function validate() //registration
{
	var username=document.getElementById("username").value;
	var password=document.getElementById("password").value;
	var email=document.getElementById("email").value;
	if (username != '' && password != '' && email != ''){
		if(username.length >=6 && password.length >=6){
			return true;
		}
		else{
			alert("<h6 id='red'>Username and/or Password too short!</h6>");
			return false;
		}
	} 
	else{
	alert("All fields are required!");
	return false;
	}
}

function validate_books() //upload books
{
	var title=document.getElementById("title").value;
	var author=document.getElementById("author").value;
	var description=document.getElementById("description").value;
	var genre=document.getElementById("genre").value;
	var pdf_file=document.getElementById("pdf_file").value;
	if(title != '' && author != '' && description != '' && genre != '' && pdf_file != ''){
		return true;
	}
	else {
		alert("<h6 id='red'>All fields are required!</h6>");
		return false;
	}
}

