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

![bandicam 2024-06-14 09-20-34-938](https://github.com/enescivelek0/kullanici_kayit_sistemi/assets/60387787/163e6e71-5350-46fc-b258-4e763ed75962)
![bandicam 2024-06-14 09-23-03-058](https://github.com/enescivelek0/kullanici_kayit_sistemi/assets/60387787/6d114012-8404-479c-bb71-836991ad14ab)
![bandicam 2024-06-14 09-23-08-881](https://github.com/enescivelek0/kullanici_kayit_sistemi/assets/60387787/51db3956-000e-4343-8f52-d532051bbf67)
![bandicam 2024-06-14 09-22-06-889](https://github.com/enescivelek0/kullanici_kayit_sistemi/assets/60387787/5e302aff-8fd2-4058-9fb5-a786711e167e)

