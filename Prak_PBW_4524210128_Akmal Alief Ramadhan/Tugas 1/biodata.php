<?php
// biodata.php

// Modifikasi 2: Menambah kondisi khusus untuk IPK sempurna
function statusKelulusan(float $ipk): string
{
    if ($ipk > 4.00) return 'Error: IPK tidak valid';
    if ($ipk == 4.00) return 'Cumlaude / Sempurna';
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

$mahasiswa = [
    'npm' => '45240128',
    'nama' => 'Bob',
    'prodi' => 'Teknik Informatika',
    'semester' => 1,
    'ipk' => 4.00
];
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Biodata Bob</title>
    <!-- Modifikasi 1: Tambahan CSS background Merah Putih -->
    <style>
        body {
            /* Membuat background terbagi 2: Merah di atas, Putih di bawah */
            background: linear-gradient(to bottom, #ce1126 50%, #f4f4f4 50%);
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
            border-top: 5px solid #ce1126;
            width: 100%;
            max-width: 350px;
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-top: 0;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            font-size: 16px;
            color: #555;
        }
        li strong {
            color: #222;
        }
        .predikat {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border-radius: 6px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Biodata Mahasiswa</h1>
        <ul>
            <?php foreach ($mahasiswa as $kunci => $nilai): ?>
                <?php 
                // Format agar kata "npm" atau "ipk" jadi huruf besar semua (NPM, IPK), sisanya huruf awal aja yang besar
                $label = (strtoupper($kunci) === 'NPM' || strtoupper($kunci) === 'IPK') ? strtoupper($kunci) : ucfirst($kunci);
                ?>
                <li><strong><?= $label ?>:</strong> <?= htmlspecialchars((string)$nilai) ?></li>
            <?php endforeach; ?>
        </ul>

        <div class="predikat">Predikat: <?= statusKelulusan($mahasiswa['ipk']) ?></div>
    </div>
</body>
</html>