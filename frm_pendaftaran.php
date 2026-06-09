<form method="POST" action="sv_pendaftaran.php">
    <label>Nama Lengkap</label>
    <input type="text" name="nama" placeholder="Masukkan nama lengkap">

    <label>Email</label>
    <input type="email" name="email" placeholder="contoh@email.com">

    <label>Nomor WhatsApp</label>
    <input type="text" name="wa" placeholder="08123456789">

    <label>Pilih Kelas</label>
    <select name="kelas">
        <option value="">-- Pilih Kelas --</option>
        <?php foreach ($kelasList as $namaKelas => $harga): ?>
            <option value="<?= htmlspecialchars($namaKelas) ?>">
                <?= htmlspecialchars($namaKelas) ?> - Rp<?= number_format($harga, 0, ',', '.') ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Jumlah Peserta</label>
    <input type="number" name="jumlah" min="1" value="1">

    <button type="submit" name="daftar">Daftar Sekarang</button>
</form>