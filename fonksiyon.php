<?php 
require_once("ayarlar/ayar.php");


function harfKarakterTemizle($deger) {
	$temizle = preg_replace("/[^0-9]/", "", $deger);
	return $temizle;
}

function guvenlik($deger) {
	$boslukTemizle 		= trim($deger);
	$taglariSil    		= strip_tags($boslukTemizle);
	$tirnaklariTemizle 	= htmlspecialchars($taglariSil, ENT_QUOTES);
	$sonuc 				= $tirnaklariTemizle;
	return $sonuc;
}


//home.php sayfasında kullanıldı
function toplamAdetBulma($tableName="", $whereKosullar="", $whereKosulDegerleri="") {

	global $db;

	$sql = "SELECT * FROM " . $tableName;
	if (!empty($whereKosullar) && !empty($whereKosulDegerleri)) {
		$sql 			.= " WHERE " . $whereKosullar;

		$sorgu 			= $db->prepare($sql);
		$calistir   	= $sorgu->execute($whereKosulDegerleri);
		$sorguSonucu 	= $sorgu->rowCount();
		return $sorguSonucu;

	}
	

}


class mkTimeZamanDilimineCevir {

	public $yil;
	public $ay ;
	public $gun;

	public function __construct($deger) {
		$parcalaYil = explode("-", $deger);
		$this->yil = $parcalaYil[0];

		$parcalaAy = explode("-", $deger);
		$this->ay = $parcalaAy[1];

		$parcalaGun = explode("-", $deger);
		$this->gun = $parcalaGun[2];
	}

}


function tarihDuzeltme($deger) {

	$tarih = explode("-", $deger);
	return $tarih[2] . "/" . $tarih[1] . "/" . $tarih[0];

}










?>