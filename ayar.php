<?php 
session_start();
ob_start();

try {
	$db = new PDO("mysql:host=localhost;dbname=sozlesme;charset=UTF8", "root", "53102329");
	//print 'Bağlantı Başarılı';
} catch (PDOException $error) {
	print "Bağlantı Başarısız: " . $error->getMessage();
}

$ayarlarSorgu 		= $db->prepare("SELECT * FROM ayarlar LIMIT 1");
$ayarlarSorgu->execute();
$ayarlarDonenDeger  = $ayarlarSorgu->rowCount();
$sonuc 				= $ayarlarSorgu->fetch(PDO::FETCH_ASSOC);

if ($ayarlarDonenDeger > 0) {
	$siteAdi = $sonuc['siteAdi'];
	$siteTitle = $sonuc['siteTitle'];
	$siteDescription = $sonuc['siteDescription'];
	$siteKeywords = $sonuc['siteKeywords'];
	$siteLogosu = $sonuc['siteLogosu'];
}


if (isset($_SESSION['userMail'])) {
	$kullaniciSorgu 		= $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciMail=? LIMIT 1");
	$kullaniciSorgu->execute(array($_SESSION['userMail']));
	$kullaniciDonenDeger  = $kullaniciSorgu->rowCount();
	$sonuc 				= $kullaniciSorgu->fetch(PDO::FETCH_ASSOC);

	if ($kullaniciDonenDeger > 0) {
		$kullaniciId = $sonuc['id'];
		$kullaniciAdSoyad = $sonuc['kullaniciAdSoyad'];
		$kullaniciResim = $sonuc['kullaniciResim'];
		$kullaniciMail = $sonuc['kullaniciMail'];
		$kullaniciKayitTarihi = $sonuc['kullaniciKayitTarihi'];
		$kullaniciYetki = $sonuc['kullaniciYetki'];
		$kullaniciDurum = $sonuc['kullaniciDurum'];
	}
}




?>