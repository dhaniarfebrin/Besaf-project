$(document).ready(function () {
	$('#example').DataTable();
	$('#TabAdmin').DataTable();
	bsCustomFileInput.init();
});

// progress bar saat pindah halaman
window.addEventListener("beforeunload", function (e) {
	document.body.className = "loading-halaman";
}, false)

function closeNav() {
	//	document.getElementById('sidebar').style.width = "0px";
	document.getElementById('sidebar').style.marginLeft = '-250px';
	document.getElementById('main').style.marginLeft = "0px";
}

function openNav() {
	document.getElementById('sidebar').style.marginLeft = "0px";
	document.getElementById('main').style.marginLeft = "250px";
}

function addRole() {
	var li = document.createElement('li');
	//	var input = (document.createElement('input'));
	var inputValue = document.getElementById('role').value;
	var value = document.createTextNode(inputValue);

	li.appendChild(value);
	//	li.setAttribute('disabled', '');
	li.setAttribute('name', 'role[]');
	li.className = "role d-block w-75 mx-auto bg-transparent pd-0";

	if (inputValue === '') {
		// Swal.fire({
		// 	icon: 'warning',
		// 	title: 'Please type something',
		// 	themes: 'dark'
		// })
	} else {
		var role = document.getElementById('roleList');
		role.appendChild(li);
	}
	var role = document.getElementById('roleList');
	document.getElementById('role').value = "";

	var span = document.createElement('span');
	var iconClose = document.createTextNode("x");

	span.className = "close text-white my-auto";
	span.appendChild(iconClose);
	li.appendChild(span);

	var close = document.getElementsByClassName('close');
	for (i = 0; i < close.length; i++) {
		close[i].onclick = function () {
			var parent = this.parentElement;
			parent.className = "d-none";
		}
	}
}

function changeTab(tab) {
	var x = document.getElementsByClassName("single-tab");
	for (var i = 0; i < x.length; i++) {
		x[i].style.display = "none";
	}
	document.getElementById(tab).style.display = "block";

	var header = document.getElementById("header");
	var btns = header.getElementsByClassName("btn");

	for (var i = 0; i < btns.length; i++) {
		btns[i].addEventListener('click', function () {
			var current = document.getElementsByClassName('active');
			current[0].className = current[0].className.replace(" active", "");
			this.className += " active";
		});
	}
}