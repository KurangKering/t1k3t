//$(this).attr("id").match(/\d+/)


function parseAngka(element) {
	var hasil;
	var result = element.match(/\d+/);
	if (!result) {
		hasil = 0;
	}
	else {
		hasil = result;
	}
	return hasil;
}


function Rumus(q, hpp, invoice, fee, persen) {

	var nta = parseInt(hpp) * parseFloat(persen);
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

$('#q, #hpp, #invoice').on('input', function() 
{
	var q = parseAngka($('#q').val());
	var hpp = parseAngka($('#hpp').val());
	var invoice = parseAngka($('#invoice').val());
	var fee = parseAngka($('#fee').val());
	var persen = parseFloat(parseAngka($('#persen').val()) / 100);

	Rumus(q, hpp, invoice, fee, persen);

	
	
});
