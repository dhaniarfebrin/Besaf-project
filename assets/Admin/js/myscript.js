$(document).ready(function () {
	$('#example').DataTable();
	$('#TabAdmin').DataTable();
	bsCustomFileInput.init();
});

// progress bar saat pindah halaman
window.addEventListener("beforeunload", function (e) {
	document.body.className = "loading-halaman";
}, false)

//shortcut keyboard
document.onkeydown = function (teziger) {
	switch (teziger.keyCode) {
		case 9: // tombol tab
			openNav();
			break;
	
		// default:
		// 	closeNav();
		// 	break;
	}
	// teziger.preventDefault(); // menghapus fungsi default tombol
}

function closeNav() {
	//	document.getElementById('sidebar').style.width = "0px";
	document.getElementById('sidebar').classList.remove('sidebar-open');
	document.getElementById('main').classList.remove('main-open');
}

function openNav() {
	document.getElementById('sidebar').classList.add('sidebar-open');
	document.getElementById('main').classList.add('main-open');
}

function addRole() {
	// var li = document.createElement('input');
	var input = (document.createElement('input'));
	var inputValue = document.getElementById('role').value;
	// var value = document.createTextNode(inputValue);

	input.setAttribute('value', inputValue)
	//	li.setAttribute('disabled', '');
	input.setAttribute('name', 'role[]');
	input.setAttribute('id', 'role-list')
	input.className = "role d-block w-75 mx-auto bg-transparent pd-0 text-white";

	if (inputValue === '') {
		// Swal.fire({
		// 	icon: 'warning',
		// 	title: 'Please type something',
		// 	themes: 'dark'
		// })
	} else {
		var role = document.getElementById('roleList');
		role.appendChild(input);
	}
	var role = document.getElementById('roleList');
	document.getElementById('role').value = "";

	// var span = document.createElement('span');
	// var iconClose = document.createTextNode("x");

	// span.className = "close text-white my-auto";
	// span.appendChild(iconClose);
	// input.appendChild(span);
	// var close = document.getElementsByClassName('close');
	// for (i = 0; i < close.length; i++) {
	// 	close[i].onclick = function () {
	// 		var parent = this.parentElement;
	// 		parent.className = "d-none";
	// 	}
	// }
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

$(document).ready(function () {
	function clock() {
		var now = new Date();
		var secs = ('0' + now.getSeconds()).slice(-2);
		var mins = ('0' + now.getMinutes()).slice(-2);
		var hours = now.getHours();
		var watch = hours + ":" + mins + ":" + secs;

		document.getElementById("watch").innerHTML = watch;
		requestAnimationFrame(clock);
	}
	requestAnimationFrame(clock);
});