var uang = document.getElementById("uang");
uang.addEventListener("keyup", function(ewhich) {
  uang.value = convertuang(this.value);
});
uang.addEventListener('keydown', function(event) {
	return isNumberKey(event.keyCode);
});


var uang2 = document.getElementById("uang2");
uang2.addEventListener("keyup", function(e) {
  uang2.value = convertuang(this.value, "Rp. ");
});
uang2.addEventListener('keydown', function(event) {
	return isNumberKey(event);
});
 
function convertuang(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split  = number_string.split(","),
    sisa   = split[0].length % 3,
    uang = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);
 
	if (ribuan) {
		separator = sisa ? "." : "";
		uang += separator + ribuan.join(".");
	}
 
	uang = split[1] != undefined ? uang + "," + split[1] : uang;
	return prefix == undefined ? uang : uang ? prefix + uang : "";
}
 
function isNumberKey(evt) {
    key = evt.which || evt.keyCode;
	if ( 	key != 188 // Comma
		 && key != 8 // Backspace
		 && key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
		 && (key < 48 || key > 57) // Non digit
		) 
	{
		evt.preventDefault();
		return;
	}
}

