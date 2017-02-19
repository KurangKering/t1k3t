// $('#hpp').on('input', function() { 

// 	var hpp = $(this).val();
// 	var persen = parseFloat(document.getElementById('persen').value) / 100;

// 	var nta = hpp * persen;
// 	document.getElementById('nta').value = nta;

// 	var harga_jual = parseInt(nta) + parseInt(hpp);
// 	document.getElementById('harga_jual').value = harga_jual;

// });

// $('#q').on('input', function() {

// 	var q = $(this).val();
// 	var fee = parseFloat(document.getElementById('fee').value);

// 	var adm_fee = q * fee;

// 	document.getElementById('adm_fee').value = adm_fee;
// });


// $('#invoice').on('input', function() {
// 	var invoice = $(this).val();
// 	var harga_jual = parseInt(document.getElementById('harga_jual').value);


// 	var up_salling = invoice - harga_jual;
// 	document.getElementById('up_salling').value = up_salling;

// 	var nta = parseInt(document.getElementById('nta').value);

// 	var profit_1 = nta + up_salling;
// 	document.getElementById('profit_1').value = profit_1;

// 	adm_fee = document.getElementById('adm_fee').value;
// 	var profit_2 = profit_1 - adm_fee;
// 	document.getElementById('profit_2').value = profit_2	;


// 	var hpp = document.getElementById('hpp').value;

// 	var jumlah = parseInt(hpp) + parseInt(adm_fee);
// 	document.getElementById('jumlah').value = jumlah;


// });
var persen = $('$persen');
var q = $('#q');
var hpp = $('#hpp');
var invoice = $('#invoice');
var nta = $('#nta');
var harga_jual = $('#harga_jual');
var up_salling = $('#up_salling');
var profit_1 = $('#profit_1');
var fee = $('#fee');
var adm_fee = $('#adm_fee');
var profit_2 = $('#profit_2');
var jumlah = $('#jumlah');
function setInformasi() {

$('#q').val();
}