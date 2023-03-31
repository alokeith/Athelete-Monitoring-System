function _(x){
	return document.getElementById(x);
}

////////////////////////////////////////FUNCTION 1
function setInitial(setnumber) {
	var number = _(setnumber).value;
	if (number != ""){
		var ajax = new XMLHttpRequest();
		ajax.open('GET','php/admin-parser.php?setnumber='+number,true);
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.onreadystatechange=function(){
			if (ajax.readyState == 4 && ajax.status == 200){
				if (ajax.responseText.replace(/^\s+|\s+$/g, "") == "success-setting"){
					_('set-success').innerHTML = "Setting Success.";
					$('#set-success-modal').openModal();
					setTimeout('closeModalSuccess()','1000');
				}else{
					_('set-success').innerHTML = ajax.responseText;
					$('#set-success-modal').openModal();
					setTimeout('closeModalSuccess()','1000');
				}				
			}
		}
		ajax.send();
	}else{
		_('set-success').innerHTML = "<span class='red-text'>Please input field!</span>";
		$('#set-success-modal').openModal();
		setTimeout('closeModalSuccess()','1000');
	}
}




function closeModalSuccess() {
	$('#set-success-modal').closeModal();
}


////////////////////////////////////////FUNCTION 1



////////////////////////////////////////FUNCTION 2

function searchEmp(data) {
	var data = _(data).value;
	
	var wrapper = _('result-wrapper');
	if (data != ""){
		var ajax = new XMLHttpRequest();
		ajax.open('GET','php/admin-parser.php?searchemployee='+data,true);
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.onreadystatechange=function(){
			if (ajax.readyState == 4 && ajax.status == 200){
				wrapper.innerHTML = ajax.responseText;			
			}
		}
		ajax.send();
		wrapper.innerHTML = "<a class='collection-item'><div class='preloader-wrapper small active'><div class='spinner-layer spinner-blue-only'><div class='circle-clipper left'><div class='circle'></div></div><div class='gap-patch'><div class='circle'></div></div><div class='circle-clipper right'><div class='circle'></div></div></div></div></a>";
	}else{
		wrapper.innerHTML = "";
	}
}

function setid(id,name){
	var empID = _('emp-id');
	var empName = _('emp-name');
	var name = _(name).value;
	var wrapper = _('result-wrapper');
	var field = _('search-person-data');
	empID.value = id;
	empName.style.display = "block";
	empName.value = name;
	wrapper.innerHTML = "";
	field.value = "";
}

////////////////////////////////////////FUNCTION 2



////////////////////////////////////////FUNCTION 3

function generateReport() {
	//SET VARIABLES
	var status = _('report-status');
	var status2 = _('report-status-2');
	var id = _('emp-id').value;
	var startdate = _('start-date').value;
	var enddate = _('end-date').value;

	if (id == "" || startdate == "" || enddate == ""){
		status.innerHTML = "<span class='red-text'><b>Oops! don't forget to select an employee and filling out the start date and end date.</b></span>";
	}else{
		var ajax = new XMLHttpRequest();
		ajax.open('POST','php/admin-parser.php',true);
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.onreadystatechange=function(){
			if (ajax.readyState == 4 && ajax.status == 200){
				status2.innerHTML = ajax.responseText;
				status.innerHTML = "";
			}
		}
		ajax.send("empid="+id+"&startdate="+startdate+"&enddate="+enddate+"&generatereport=report");
		status.innerHTML = "<a class='collection-item'><div class='preloader-wrapper small active'><div class='spinner-layer spinner-blue-only'><div class='circle-clipper left'><div class='circle'></div></div><div class='gap-patch'><div class='circle'></div></div><div class='circle-clipper right'><div class='circle'></div></div></div></div></a>";
		status2.innerHTML = "<a class='collection-item'><div class='preloader-wrapper small active'><div class='spinner-layer spinner-blue-only'><div class='circle-clipper left'><div class='circle'></div></div><div class='gap-patch'><div class='circle'></div></div><div class='circle-clipper right'><div class='circle'></div></div></div></div></a>";
	}

}

////////////////////////////////////////FUNCTION 3


function printReport() {
	var report = _("report-status-2");
	_("admin-body").style.background = "none";
	window.print();
}

//FUNC. 4 // ADD PURPOSE
function addpurpose() {
	var purpose = _('purp-desc').value;
	var stat = _('add-purp-stat');
	if (purpose == ""){
		stat.innerHTML = "<b class='red-text'>Do not leave the field blank.</b>";
	}else{
		var ajax = new XMLHttpRequest();
		ajax.open('POST','php/admin-parser.php',true);
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.onreadystatechange=function(){
			if (ajax.readyState == 4 && ajax.status == 200){				
				if (ajax.responseText.replace(/^\s+|\s+$/g, "") == "add-purp-success") {
					$('#set-success-modal').openModal();
					_('set-success-modal').innerHTML = "<h5 class='green-text'>New purpose has been added.</h5>";
					stat.innerHTML = "";
					_('purp-desc').value = "";
					purposeList();
					setTimeout('modalclose()','1000');
				}else if (ajax.responseText.replace(/^\s+|\s+$/g, "") == "add-purp-fail"){
					$('#set-success-modal').openModal();
					_('set-success-modal').innerHTML = "<h5 class='red-text'>Adding fail.</h5>";
					stat.innerHTML = "";
				}else{
					stat.innerHTML = ajax.responseText;
				}
			}
		}
		ajax.send("purpose="+purpose+"&addpurpose=purpose");
		stat.innerHTML = "<span class='blue-text'>Please wait...</span>";
	}
}

function modalclose(){
	$('#set-success-modal').closeModal();
}



//FUNC. 5 // PURPOSE LIST

function purposeList() {
	var listcont = _('purpose-list');
	var ajax = new XMLHttpRequest();
		ajax.open('GET','php/admin-parser.php?purplist=purpose',true);
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.onreadystatechange=function(){
			if (ajax.readyState == 4 && ajax.status == 200){
				listcont.innerHTML = ajax.responseText;			
			}
		}
		ajax.send();
		listcont.innerHTML = ' <div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>';
}

//FUNC. 5 // PURPOSE LIST


//FUNC. 6 // PURPOSE DELETE

function deletePurp(purp,id) {
	var loader = _('del-loader');
	var msg = _('delete-msg');
	var ajax = new XMLHttpRequest();
		ajax.open('GET','php/admin-parser.php?purposedel='+purp+'&iddel='+id,true);
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.onreadystatechange=function(){
			if (ajax.readyState == 4 && ajax.status == 200){
				if (ajax.responseText.replace(/^\s+|\s+$/g, "") == "success-delete") {
					$('#delete-modal').openModal();
					loader.innerHTML = '';
					msg.innerHTML = purp+" has been deleted!";
					setTimeout("closeDelModal()","1000");
				}else{
					$('#delete-modal').openModal();
					msg.innerHTML = "Something is wrong with deleting "+purp+"!";
				}
			}
		}
		ajax.send();
		loader.innerHTML = ' <div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>';
}

function closeDelModal(){
	$('#delete-modal').closeModal();
	purposeList();
}