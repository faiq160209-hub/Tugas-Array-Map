<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if (isset($_POST['submitt'])) {
    $jumlah = (int)$_POST['jumlah'];
    if ($jumlah > 0) {
?>
    <fieldset>
        <legend><h3>Input Data Siswa</h3></legend>
        <form action="Biodata1.php" method="post">
            <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
            <?php
            for ($i = 1; $i <= $jumlah; $i++) {
                echo "<h4>Siswa $i</h4>";
                echo "Nama Panggilan: <input type='text' name='nama_panggilan[]'><br>";
                echo "Nama Lengkap: <input type='text' name='nama_lengkap[]' required><br>";
                echo "Umur: <input type='number' name='umur[]' required><br><br>";
            }
            ?>
            <input type="submit" value="Simpan" name="submi">
            <input type="reset" value="Reset">
        </form>
    </fieldset>
<?php
    } else {
        echo "<p>Silakan masukkan jumlah siswa yang valid (lebih dari 0).</p>";
    }
} 
elseif (isset($_POST['submi'])) {
    $jumlah = (int)$_POST['jumlah'];
    $nama_panggilan = $_POST['nama_panggilan'] ?? [];
    $nama_lengkap   = $_POST['nama_lengkap'] ?? [];
    $umur           = $_POST['umur'] ?? [];

    $dataSiswa = [];
    for ($i = 0; $i < $jumlah; $i++) {
        $dataSiswa[] = array(
            "nama_panggilan" => $nama_panggilan[$i],
            "nama_lengkap"   => $nama_lengkap[$i],
            "umur"           => $umur[$i]
        );
    }
?>
    <fieldset>
        <legend><h3>Data Siswa yang Telah Diinput</h3></legend>
        <h3>Jumlah siswa: <?php echo htmlspecialchars($jumlah); ?></h3>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Nama Panggilan</th>
                <th>Nama Lengkap</th>
                <th>Umur</th>
            </tr>
            <?php
            foreach ($dataSiswa as $siswa) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($siswa["nama_panggilan"]) . "</td>";
                echo "<td>" . htmlspecialchars($siswa["nama_lengkap"]) . "</td>";
                echo "<td>" . htmlspecialchars($siswa["umur"]) . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <a href="Biodata1.php">Input Ulang</a>
    </fieldset>
<?php
} 
else {
?>
    <form action="Biodata1.php" method="post">
        <h3>Jumlah siswa yang akan diinput:</h3>
        <input type="number" name="jumlah" placeholder="jumlah" required><br><br>
        <input type="submit" value="Submit" name="submitt">
        <input type="reset" value="Reset">
    </form>
<?php
}
?>

</body>
</html>
