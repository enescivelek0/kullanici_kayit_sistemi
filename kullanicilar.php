<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıtlı Kullanıcılar</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Kayıtlı Kullanıcılar</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kullanici_veritabani";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT isim, soyisim, email FROM kullanicilar");
            $stmt->execute();

            echo "<table class='table table-bordered'>";
            echo "<thead class='thead-dark'><tr><th>İsim</th><th>Soyisim</th><th>E-posta</th></tr></thead>";
            echo "<tbody>";
            while ($row = $stmt->fetch()) {
                echo "<tr><td>" . htmlspecialchars($row['isim']) . "</td><td>" . htmlspecialchars($row['soyisim']) . "</td><td>" . htmlspecialchars($row['email']) . "</td></tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } catch (PDOException $e) {
            echo "Bağlantı hatası: " . $e->getMessage();
        }

        $conn = null;
        ?>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"></script>
</body>
</html>
