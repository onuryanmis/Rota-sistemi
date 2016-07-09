Php rota sistemi
================

Php ile hazırlanmış kullanılması kolay rota sistemi.

Kurulum
=======
İlk olarak sınıfı sayfamıza dahil ediyoruz.

``` php
require_once "Route.class.php";

```
Şimdi bir tane .htaccess dosyası oluşturalım. İçerisine aşağıdaki kodları ekleyelim.

``` htaccess
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*?)(/?)$ index.php/$1 [QSA,L]

```

Kurulum işlemi bu kadar.


Kullanımı
=========

**Parametresiz kullanım**
İlk olarak bir tane örnek bir rota oluşturalım.

``` php
Route::GET("/",function(){ 
	echo "Burası anasayfa";
});

Route::GET("giris",function(){
	echo "Burası giriş sayfası"; // site.com/giris şeklinde ulaşılıyor.
});

Route::POST("giris",function(){
	echo "Burası giriş sayfası"; // Sayfa post edilmişse site.com/giris şeklinde ulaşılıyor.
});

```
Parametresiz haliyle kullanımı bu şekilde.

**Parametreli kullanım**
``` php
Route::GET("uye/(\d+)/(.*?)",function($id, $kadi){
	echo "Id değeri : ".$id;
	echo "Kullanıcı adı değeri : ".$kadi;
});

```

**Parametre sayı ise** => (\d+) şeklinde yazıyoruz.
**Parametre normal karakter ise** => (.*?) şeklinde yazıyoruz.

Rotaya dışarıdan fonksiyon ekleme
=================================

Rota sistemimizde 2.parametre olarak fonksiyon yolluyoruz. Sınıftaki özellik sayesinde oluşturduğumuz bir fonksiyonu Rotamıza parametre olarak yollayabiliyoruz.

``` php
function giris_fonksiyon()
{
	echo "Burası giriş sayfası";
}

Route::GET("giris","giris_fonksiyon"); // site.com/giris şeklinde ulaşılıyor.

```

Rotaya Class içersindeki metodu ekleme
======================================

Rota sistemize 2.parametre olarak class içerisindeki bir metodu gönderebiliriz.
(İlk class ismini yazıyoruz @ işaretini yazıp ardından classımızın içersindeki metodumuzu yazıyoruz)

``` php
Route::GET("giris","uyelik@giris_yap"); // site.com/giris şeklinde ulaşılıyor.

class uyelik
{
	public function giris_yap()
	{
		echo "Burası giriş sayfası";
	}
}

```
Rota sistemi ayarlar
====================

Rota sistemimize uzantı ekleyebiliriz. **Bu kodu rota sistemimizin en üstüne ekliyoruz**

``` php
Route::CONFIG(array(
	"extension"=>"html"   // site.com/rota.html şeklinde ulaşılıyor.
	));

```

Extension(uzantı) => Kısmına uzantıyı yazıyoruz.

Rota sistemi hata yakalama
==========================

Eğer rota yoksa burası çalışacak. (Bu metod rota sisteminin en sonuna yazılacak)

``` php
Route::ERROR(function(){ // Rota yoksa burası çalışacak (Bu metod en son yazılacak)
	echo "<h4>404 not found</h4>";
	echo "<p>Aradığınız sayfa bulunamadı</p>";
});

```

**Yazar**
[Onur yanmış](http://www.webderslerim.com/)
