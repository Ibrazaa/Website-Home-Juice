<?php
// Langkah 1: Terhubung ke database (misalnya menggunakan PDO)
$host = 'localhost';
$dbname = 'db_homejuice';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Langkah 2: Ambil data dari database
$stmt = $conn->prepare("SELECT * FROM juice");
$stmt->execute();
$slides = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Langkah 3: Tampilkan konten slider
foreach ($slides as $sl): ?>
<div class="swiper-slide box">
    <img src="<?php echo $sl['gambar']; ?>" alt="Slide Image" />
    <div class="content">
        <h3><?php echo $sl['nama']; ?></h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        </div>
        <div class="price"><?php echo $sl['harga']; ?></div>
        <a href="#" class="btn">check out</a>
    </div>
</div>
<?php endforeach; ?>

?>
