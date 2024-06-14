<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isim = $_POST['isim'];
    $soyisim = $_POST['soyisim'];
    $email = $_POST['email'];
    $sifre = $_POST['sifre'];
    $sifreTekrar = $_POST['sifreTekrar'];
    $dogumTarihi = $_POST['dogumTarihi'];
    $cinsiyet = $_POST['cinsiyet'];

    // Sunucu tarafında validasyon
    if (empty($isim) || empty($soyisim) || empty($email) || empty($sifre) || empty($sifreTekrar) || empty($dogumTarihi) || empty($cinsiyet)) {
        die("Tüm alanlar doldurulmalıdır.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Geçersiz e-posta adresi.");
    }

    if ($sifre !== $sifreTekrar) {
        die("Şifreler eşleşmiyor.");
    }

    if (strlen($sifre) < 6) {
        die("Şifre en az 6 karakter olmalı.");
    }

    // Veritabanı bağlantısı
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kullanici_veritabani";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // E-posta benzersizliği kontrolü
        $stmt = $conn->prepare("SELECT COUNT(*) FROM kullanicilar WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->fetchColumn() > 0) {
            die("Bu e-posta adresi zaten kayıtlı.");
        }

        // Veritabanına ekleme
        $stmt = $conn->prepare("INSERT INTO kullanicilar (isim, soyisim, email, sifre, dogum_tarihi, cinsiyet) VALUES (:isim, :soyisim, :email, :sifre, :dogumTarihi, :cinsiyet)");
        $stmt->bindParam(':isim', $isim);
        $stmt->bindParam(':soyisim', $soyisim);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':sifre', password_hash($sifre, PASSWORD_DEFAULT));
        $stmt->bindParam(':dogumTarihi', $dogumTarihi);
        $stmt->bindParam(':cinsiyet', $cinsiyet);
        $stmt->execute();

        // Başarılı kayıt sonrası yönlendirme
        header("Location: tesekkurler.php");
        exit;
    } catch (PDOException $e) {
        echo "Bağlantı hatası: " . $e->getMessage();
    }

    $conn = null;
}
?>
