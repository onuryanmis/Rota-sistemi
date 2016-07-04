<?php 

require_once("route.class.php");


Route::CONFIG(array(
	"extension"=>"html"  //Rota uzantısı (rota.uzanti şeklinde)
));

// Get ile işlem yapma
Route::GET("/",function(){   
	echo "Burası anasayfa";
});

// Parametreli kullanım
Route::GET("uye/(\d+)/(.*?)",function($id, $kadi){
	echo "<strong>Id değeri</strong> : ".$id."<br>";
	echo "<strong>Kullanıcı adı değeri : </strong>".$kadi."<br>";
});

Route::GET("giris-yap",function(){
	echo '<form action="giris-yap.html" method="POST">
		<input type="text" name="kadi">
		<input type="password" name="sifre">
		<input type="submit" value="Giriş yap">
	</form>';
});

// Post ile işlem yapma
Route::POST("giris-yap",function(){
	echo $_POST["kadi"]."<br>";
	echo $_POST["sifre"];
});


// Rota yoksa burası çalışacak (Bu metod en son yazılacak)
Route::ERROR(function(){
	echo "<h4>404 not found</h4>";
	echo "<p>Aradığınız sayfa bulunamadı</p>";
});

?>