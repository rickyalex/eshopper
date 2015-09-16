<html>
<head>
<link href="templates/__master/Styles/styles.css?1" type="text/css" rel="stylesheet" /><link href="templates/Cosmetics/Styles/styles.css?1" media="all" type="text/css" rel="stylesheet" />
<link href="templates/Cosmetics/Styles/iselector.css?1" media="all" type="text/css" rel="stylesheet" />
<link href="templates/Cosmetics/Styles/palegreen.css?1" media="all" type="text/css" rel="stylesheet" />

<script type="text/javascript">
function getKabupaten(provinceId) {
	if (provinceId < 0) {
		return;
	}
	document.getElementById('cmbKabupaten').disabled = true;
	
	var xmlhttp = new XMLHttpRequest();
	var url = "http://www.auroraku.com/util.ongkir.php?ajax=1&action=getKabupaten&id="+provinceId;    
	xmlhttp.onreadystatechange = function(){
		 if(xmlhttp.readyState==4)
		 {	 
		    var contentElement = document.getElementById("divKabupaten");
		    contentElement.innerHTML = xmlhttp.responseText;	
		 }
	}
    xmlhttp.open("GET",url,false); 
    xmlhttp.send(null);
}

function getKecamatan(kabId) {
	if (kabId < 0) {
		return;
	}
	document.getElementById('cmbKecamatan').disabled = true;
	var xmlhttp = new XMLHttpRequest();
	var url = "http://www.auroraku.com/util.ongkir.php?ajax=1&action=getKecamatan&id="+kabId;    
	xmlhttp.onreadystatechange = function(){
		 if(xmlhttp.readyState==4)
		 {	 
		    var contentElement = document.getElementById("divKecamatan");
		    contentElement.innerHTML = xmlhttp.responseText;	
		 }
	}
    xmlhttp.open("GET",url,false); 
    xmlhttp.send(null);
}

function getOngkir(kecId) {
	if (kecId < 0) {
		return;
	}
	var xmlhttp = new XMLHttpRequest();
	var url = "http://www.auroraku.com/util.ongkir.php?ajax=1&action=getOngkir&id="+kecId;    
	xmlhttp.onreadystatechange = function(){
		 if(xmlhttp.readyState==4)
		 {	 
		    var contentElement = document.getElementById("divOngkir");
		    contentElement.innerHTML = xmlhttp.responseText;	
		 }
	}
    xmlhttp.open("GET",url,false); 
    xmlhttp.send(null);
}

</script>

</head>
<body style="background:none">
<p>Silahkan pilih <strong>Provinsi</strong>, <strong>Kabupaten/Kota</strong> dan <strong>Kecamatan</strong> untuk mengetahui estimasi biaya dan waktu pengiriman.</p>
<table style="font-size:13px" cellspacing="10">
<tr>
	<td align="right"><strong>Provinsi:</strong></td>
	<td><select name="cmbProvince" id="cmbProvince" onChange="getKabupaten(this.value)">
	<option value="-1">-- Pilih Provinsi --</option>
<option value="242">Bali</option><option value="244">Banten</option><option value="245">Bengkulu</option><option value="246">D.I. Aceh</option><option value="256">D.I. Yogyakarta</option><option value="247">DKI Jakarta</option><option value="273">Gorontalo</option><option value="251">Jambi</option><option value="254">Jawa Barat</option><option value="255">Jawa Tengah</option><option value="257">Jawa Timur</option><option value="258">Kalimantan Barat</option><option value="261">Kalimantan Selatan</option><option value="259">Kalimantan Tengah</option><option value="260">Kalimantan Timur</option><option value="243">Kep. Bangka Belitung</option><option value="274">Kep. Riau</option><option value="253">Lampung</option><option value="268">Maluku</option><option value="269">Maluku Utara</option><option value="262">Nusa Tenggara Barat</option><option value="263">Nusa Tenggara Timur</option><option value="271">Papua</option><option value="272">Papua Barat</option><option value="250">Riau</option><option value="270">Sulawesi Barat</option><option value="264">Sulawesi Selatan</option><option value="265">Sulawesi Tengah</option><option value="267">Sulawesi Tenggara</option><option value="266">Sulawesi Utara</option><option value="249">Sumatera Barat</option><option value="252">Sumatera Selatan</option><option value="248">Sumatera Utara</option></select>
	</td>
</tr>
<tr>
	<td align="right"><strong>Kabupaten/Kota:</strong></td>
	<td>
		<div style="margin:none;padding:none" id="divKabupaten" name="divKabupaten">
			<select name="cmbKabupaten" id="cmbKabupaten"><option>-- Pilih Kabupaten/Kota --</option></select>
		</div>
	</td>
</tr>
<tr>
	<td align="right"><strong>Kecamatan:</strong></td>
	<td>
		<div style="margin:none;padding:none" id="divKecamatan" name="divKecamatan">
			<select name="cmbKecamatan" id="cmbKecamatan"><option>-- Pilih Kecamatan --</option></select>
		</div>
	</td>
</tr>
<tr valign="top">
	<td align="right"><strong>Ongkir:</strong></td>
	<td>
		<div style="margin:none;padding:none" id="divOngkir" name="divOngkir">
		-
		</div>
	</td>
</tr>
</table>
<br>
<p><strong>Note:</strong><br>1. Ongkir dihitung per 1 kg, untuk 1 kg bisa muat 6 potong kaos atau 3 potong jumpsuit<br>2. Pengiriman hanya bisa menggunakan JNE (www.jne.co.id), tidak bisa melalui Kantor POS, Tiki atau jasa lainnya.<br>3. Pengiriman dilakukan dari Tangerang, kami tidak memiliki showroom, hanya melakukan penjualan secara online.</p>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26986154-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>