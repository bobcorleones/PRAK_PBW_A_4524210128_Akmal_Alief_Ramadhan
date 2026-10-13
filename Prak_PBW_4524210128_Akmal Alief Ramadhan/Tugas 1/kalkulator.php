<?php
// Inisialisasi variabel biar nggak muncul error 'undefined variable' saat web pertama kali dibuka
$hasil = null;
$pesan = '';

// Mengecek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $operator = $_POST['operator'];

    // Modifikasi 2: Validasi pembagian dengan nol
    if ($operator == '/' && $b == 0) {
        $pesan = "Error: Tidak bisa membagi dengan nol!";
    } else {
        // Logika perhitungan
        switch ($operator) {
            case '+': $hasil = $a + $b; break;
            case '-': $hasil = $a - $b; break;
            case '*': $hasil = $a * $b; break;
            case '/': $hasil = $a / $b; break;
        }
    }
}
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Kalkulator</title>
    <!-- Modifikasi 1: Tambahan CSS biar rapi -->
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; padding-top: 50px; }
        .kalkulator-box { background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 100%; max-width: 300px; }
        h1 { text-align: center; font-size: 24px; color: #333; }
        input, select, button { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        button { background-color: #28a745; color: white; border: none; cursor: pointer; font-weight: bold; }
        button:hover { background-color: #218838; }
        .error { color: red; font-weight: bold; text-align: center; }
        .hasil { color: #28a745; font-size: 18px; font-weight: bold; text-align: center; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="kalkulator-box">
        <h1>Kalkulator</h1>
        <form method="post">
            <input type="number" step="any" name="a" placeholder="Angka pertama" required>
            <select name="operator">
                <option value="+">Tambah (+)</option>
                <option value="-">Kurang (-)</option>
                <option value="*">Kali (*)</option>
                <option value="/">Bagi (/)</option>
            </select>
            <input type="number" step="any" name="b" placeholder="Angka kedua" required>
            <button type="submit">Hitung</button>
        </form>

        <?php if ($pesan): ?>
            <p class="error"><?= htmlspecialchars($pesan) ?></p>
        <?php elseif ($hasil !== null): ?>
            <div class="hasil">Hasil: <?= htmlspecialchars((string)$hasil) ?></div>
        <?php endif; ?>
    </div>
</body>
</html>