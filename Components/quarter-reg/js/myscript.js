function _(x){
	return document.getElementById(x);
}


//FUNC-1 // REGISTER
function regEmp(){
	var fname = _('fname').value;
	var mname = _('mname').value;
	var lname = _('lname').value;
	var gender = _('gender').value;
	var bdate = _('bdate').value;
	var address = _('address').value;
	var positionid = _('position-id').value;
	var schoolid = _('school-id').value;
	var empid = _('emp-id').value;
	var regstat = _('reg-stat');
	var regbtn = _('reg-btn');
	var regsuccess = _('register-success');
	if (fname == '' || lname == '' || gender == '' || bdate == '' || address == '' || schoolid == '' || empid == '' || positionid == ''){
		regstat.innerHTML = "<span class='red-text'><b>Fill out all field!</b></span>";
	}else{	
		var ajax = new XMLHttpRequest();
		ajax.open('POST','php/parser.php',true);
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.onreadystatechange=function(){
			if (ajax.readyState == 4 && ajax.status == 200){				
				if (ajax.responseText.replace(/^\s+|\s+$/g, "") == "register-success") {
					window.location = "index.php";
				}else{
					regstat.innerHTML = ajax.responseText;
					//regbtn.style.opacity = "0.3";
					//regbtn.setAttribute('disabled','disabled');
				}
			}
		}
		ajax.send("fname="+fname+"&mname="+mname+"&lname="+lname+"&gender="+gender+"&bdate="+bdate+"&address="+address+"&positionid="+positionid+"&schoolid="+schoolid+"&empid="+empid+"&register-employee=signup");
		regstat.innerHTML = '<div class="preloader-wrapper small active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div><br><span class="blue-text">Please wait...</span>';
		
	}
}




//FUNC-2 // SIGN IN

function preLoginEmp(code) {
	var barcode = _(code).value;
	if (barcode == ""){
		$('#input-empty').openModal();
		setTimeout('closeModal()','1000');
	}else if (barcode == "25221311" || barcode == "00000"){
		window.location = "admin.php";
	}else if (barcode == "1234678"){
		$('#prompt-login').openModal();
	}else{
		var ajax = new XMLHttpRequest();
		ajax.open('POST','php/parser.php',true);
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.onreadystatechange=function(){
			if (ajax.readyState == 4 && ajax.status == 200){				
				if (ajax.responseText.replace(/^\s+|\s+$/g, "") == "log") {
					loginEmp(code);
				}else if (ajax.responseText.replace(/^\s+|\s+$/g, "") == "register"){
					$('#prompt-reg').openModal();
				}else{
					_('loginsuccess').innerHTML = ajax.responseText;
					$('#prompt-login').openModal();
				}
			}
		}
		ajax.send("code="+barcode+"&preLog=log");
	}
}

//FUNC-2.1 // SIGN IN
function loginEmp(code){
		
	var barcode = _(code).value;
	if (barcode == ""){
		$('#input-empty').openModal();
		setTimeout('closeModal()','1000');
	}else if (barcode == "252213"){
		window.location = "admin.php";
	}else{
		var ajax = new XMLHttpRequest();
		ajax.open('POST','php/parser.php',true);
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.onreadystatechange=function(){
			if (ajax.readyState == 4 && ajax.status == 200){				
				if (ajax.responseText.replace(/^\s+|\s+$/g, "") == "invalid-code") {
					$('#prompt-reg').openModal();
				}else if (ajax.responseText.replace(/^\s+|\s+$/g, "") == "login-success"){
					getName(barcode);
				}else if (ajax.responseText.replace(/^\s+|\s+$/g, "") == "logout-success"){
					$('#prompt-logout').openModal();
					setTimeout('closeModallogout()','1000');
				}else{
					alert(ajax.responseText);
				}
			}
		}
		ajax.send("code="+barcode+"&log=log");
	}
}

//FUNC-2.2 // INSERT PURPOSE
function insertpurpose(){
	//var purpose = _('purpose').value;
	var logid = _('purpose-log-id').value;
	var stat = _('purpose-stat');
	var p = document.forms.purposeses.purposes;
	var purpose = [];
	var i;
	for (i = 0; i < p.length; i++) {
	  	if ((p[i].checked)? 1 : 0) {
	  		var checkcount=+(p[i].checked)? 1 : 0;
	    	purpose.push(p[i].value);
	 	}
	}
	if (checkcount != 1){
		stat.innerHTML = "<b>Please check at least one purpose.</b>";
	}else{
		var ajax = new XMLHttpRequest();
		ajax.open('POST','php/parser.php',true);
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.onreadystatechange=function(){
			if (ajax.readyState == 4 && ajax.status == 200){				
				if (ajax.responseText.replace(/^\s+|\s+$/g, "") == "insert-purpose") {
					$('#prompt-login').openModal();
					_('loginsuccess').innerHTML = "<h5 class='green-text' style='padding:7px;'><center>Thank you! Please enjoy your visit.</h5></center>";
					setTimeout('closeModallogin()','1000');
				}else{
					$('#prompt-login').openModal();
					_('loginsuccess').innerHTML = ajax.responseText;
				}
			}
		}
		ajax.send("logid="+logid+"&purpose="+purpose+"&insertpurpose=purpose");
	}
}

//FUNC-2.3 // INSERT PURPOSE
function insertpurposeII(){
	//var purpose = _('purpose').value;
	var logid = _('purpose-log-id').value;
	var stat = _('purpose-stat');
	var p = document.forms.purposeses.purposes;
	var purpose = [];
	var i;
	for (i = 0; i < p.length; i++) {
	  	if ((p[i].checked)? 1 : 0) {
	  		var checkcount=+(p[i].checked)? 1 : 0;
	    	purpose.push(p[i].value);
	 	}
	}
	if (checkcount != 1){
		stat.innerHTML = "<b>Please check at least one purpose.</b>";
	}else{
		var ajax = new XMLHttpRequest();
		ajax.open('POST','php/parser.php',true);
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.onreadystatechange=function(){
			if (ajax.readyState == 4 && ajax.status == 200){				
				if (ajax.responseText.replace(/^\s+|\s+$/g, "") == "insert-purpose") {
					loginEmp('code-input');
				}else{
					$('#prompt-login').openModal();
					_('loginsuccess').innerHTML = ajax.responseText;
				}
			}
		}
		ajax.send("logid="+logid+"&purpose="+purpose+"&insertpurpose=purpose");
	}
}

function iinsertpurposeII(){
	var p = _('purposeses').elements.namedItem('purposes');
	var purpose = [];
	var i;
	for (i = 0; i < p.length; i++) {
		
	  if ((p[i].checked)? 1 : 0) {
	  	var checkcount=+(p[i].checked)? 1 : 0;
	    purpose.push(p[i].value);
	  }
	}
	alert(checkcount);
}


function closeModal(){
	$('#input-empty').closeModal();
}
function closeModallogin(){
	$('#prompt-login').closeModal();
	window.location = "index.php";
}
function closeModallogout(){
	$('#prompt-logout').closeModal();
	$('#prompt-rate').openModal();
	//window.location = "certificate.php";
}



//FUNC-3 // GET NAME
function getName(barcode) {
	var ajax = new XMLHttpRequest();
	ajax.open('GET','php/parser.php?getnamecode='+barcode,true);
	ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	ajax.onreadystatechange=function(){
		if (ajax.readyState == 4 && ajax.status == 200){				
			_('loginsuccess').innerHTML = ajax.responseText;
			$('#prompt-login').openModal();
			//setTimeout('closeModallogin()','3000');
		}
	}
	ajax.send();
}

function addStation() {
	var station = _('add-station-name').value;
	var stat = _('add-station-stat');
	if (station == ""){
		stat.innerHTML = "<b class='red-text'>Please provide data.</b>";
	}else{
		var ajax = new XMLHttpRequest();
		ajax.open('POST','php/parser.php',true);
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.onreadystatechange=function(){
			if (ajax.readyState == 4 && ajax.status == 200){				
				if (ajax.responseText.replace(/^\s+|\s+$/g, "") != "add-station-fail") {
					stat.innerHTML = "<h6 class='green-text'>New station has been added.</h6>";
					setTimeout('reload()','1000');
				}else{
					stat.innerHTML = "<h5 class='red-text'>Adding Station fail.</h5>";
				}
			}
		}
		ajax.send("station-name="+station+"&addstation=station");
		stat.innerHTML = "<span class='blue-text'>Please wait...</span>";
	}
}

function reload(){
	window.location = "register.php";
}


function addPosition() {
	var position = _('add-position-name').value;
	var stat = _('add-position-stat');
	if (position == ""){
		stat.innerHTML = "<b class='red-text'>Please provide data.</b>";
	}else{
		var ajax = new XMLHttpRequest();
		ajax.open('POST','php/parser.php',true);
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.onreadystatechange=function(){
			if (ajax.readyState == 4 && ajax.status == 200){				
				if (ajax.responseText.replace(/^\s+|\s+$/g, "") == "add-position-success") {
					stat.innerHTML = "<h6 class='green-text'>New station has been added.</h6>";
					setTimeout('reload()','1000');
				}else{
					stat.innerHTML = "<h5 class='red-text'>Adding Station fail.</h5>";
				}
			}
		}
		ajax.send("position-name="+position+"&addposition=position");
		stat.innerHTML = "<span class='blue-text'>Please wait...</span>";
	}
}
