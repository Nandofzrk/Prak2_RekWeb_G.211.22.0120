<?php
// Fungsi untuk mengambil data menggunakan cURL
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

// Alamat localhost untuk file getwisata.php, ambil hasil export JSON
$send = curl("http://localhost/RekWeb/Prak2/getwisata.php");

// Mengubah JSON menjadi PHP Array
$data = json_decode($send, TRUE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Wisata</title>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        hr {
            margin: 0;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Daftar Wisata dan Tarif</h2>

<table>
    <tr>
        <th>ID Wisata</th>
        <th>Kota</th>
        <th>Landmark</th>
        <th>Tarif</th>
    </tr>
    <?php 
    // Tampilkan data dalam tabel HTML
    foreach($data as $row): ?>
    <tr>
        <td><?php echo $row["id_wisata"]; ?></td>
        <td><?php echo $row["kota"]; ?></td>
        <td><?php echo $row["landmark"]; ?></td>
        <td><?php echo $row["tarif"]; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>