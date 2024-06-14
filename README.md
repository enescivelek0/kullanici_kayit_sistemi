# Kullanıcı Kayıt Sistemi

Bu proje, PHP ve MySQL ve Bootstrap CSS kullanarak bir kullanıcı kayıt formu oluşturmayı amaçlamaktadır.

## Dosyalar

- **form.html:** Kullanıcı kayıt formunu içeren HTML dosyası.
- **islem.php:** Formdan gelen verilerin işlendiği PHP dosyası.
- **kullanicilar.php:** Veritabanında kayıtlı kullanıcıları listeleyen PHP dosyası.

## Kurulum

1. `form.html` dosyasını tarayıcıda açarak formu doldurun.
2. Veritabanı ve tabloyu oluşturmak için aşağıdaki SQL komutlarını çalıştırın:

    ```sql
    CREATE DATABASE kullanici_veritabani;
    USE kullanici_veritabani;
    CREATE TABLE kullanicilar (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        isim VARCHAR(30) NOT NULL,
        soyisim VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL UNIQUE,
        sifre VARCHAR(255) NOT NULL,
        dogum_tarihi DATE NOT NULL,
        cinsiyet VARCHAR(10) NOT NULL,
        kayit_tarihi TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
    ```

3. `islem.php` dosyasını sunucuya yükleyin ve formun action özelliğinde doğru yolu belirleyin.
4. `kullanicilar.php` dosyasını tarayıcıda açarak kayıtlı kullanıcıları görüntüleyin.

## Kullanım

1. `form.html` dosyasını tarayıcıda açarak formu doldurun ve gönderin.
2. Kayıt başarılı olduğunda, veritabanına kayıt eklenmiş olacaktır.
3. `kullanicilar.php` dosyasını tarayıcıda açarak kayıtlı kullanıcıları görüntüleyin.

http://localhost/kullanici_kayit_sistemi/form.html sayfasına gidin.

