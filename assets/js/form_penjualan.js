$('#tanggal').datepicker({
	format: 'yyyy/mm/dd',
	todayHighlight: true,
});
$(".readonly").on('keydown paste', function(e){
	e.preventDefault();
});

function hitung() {
	var q = $('#q').val();
	var hpp = $('#hpp').val();
	var invoice = $('#invoice').val();
	setDeklarasi(q, hpp, invoice);
	$('#q, #hpp, #invoice').on('input change paste keypress', function() 
	{
		q = $('#q').val();
		hpp = $('#hpp').val();
		invoice = $('#invoice').val();
		setDeklarasi(q, hpp, invoice)
	});
}

function parseAngka(element) {
	var hasil;
	var result = element.match(/^[0-9]+([,.][0-9]+)?$/g);
	if (!result) {
		hasil = 0;
	}
	else {
		hasil = result;
	}
	return hasil;
}
function Rumus(q, hpp, invoice, fee, persen) {
	var nta = parseInt(parseInt(hpp) * parseFloat(persen));
	var harga_jual = parseInt(hpp) + parseInt(nta);
	var up_salling = parseInt(invoice) - parseInt(harga_jual);
	var profit_1 = parseInt(nta) + parseInt(up_salling);
	var adm_fee = parseInt(fee) * parseInt(q);
	var profit_2 = parseInt(profit_1) - parseInt(adm_fee);
	var jumlah = parseInt(hpp) + parseInt(adm_fee);
	setInformasi(nta, harga_jual, up_salling, profit_1, adm_fee, profit_2, jumlah);
}
function setInformasi(nta, harga_jual, up_salling, profit_1, adm_fee, profit_2, jumlah) {
	$('#nta').val(nta);
	$('#harga_jual').val(harga_jual);
	$('#up_salling').val(up_salling);
	$('#profit_1').val(profit_1);
	$('#adm_fee').val(adm_fee);
	$('#profit_2').val(profit_2);
	$('#jumlah').val(jumlah);
}
function setDeklarasi(q, hpp, invoice) {
	var q = parseAngka(q);
	var hpp = parseAngka(hpp);
	var invoice = parseAngka(invoice);
	var fee = parseAngka($('#fee').val());
	var persen = parseFloat(parseAngka($('#persen').val()) / 100 );
	Rumus(q, hpp, invoice, fee, persen);
}
function showDuplicate() {
	$.notify({
		// options
		message: 'Booking Code Sudah Ada Di Database' 
	},
	{
		// settings
		type: 'danger',
		delay: 3000
	});
}
function showSuccess() {
	$.notify({
		// options
		message: 'Berhasil Menambah Data Penjualan' 
	},
	{
		// settings
		type: 'success',
		delay: 2000
	});
}

