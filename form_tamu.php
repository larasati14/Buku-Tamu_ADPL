<div class="form-container">
    <form method="POST" action="index.php">
        <div>
            <label>Nama Lengkap:</label>
            <input type="text" name="nama" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Nomor Telepon:</label>
            <input type="tel" name="no_telepon" required>
        </div>
        <div>
            <label>Alamat:</label>
            <textarea name="alamat" required></textarea>
        </div>
        <div>
            <label>Keperluan:</label>
            <input type="text" name="keperluan" required>
        </div>
        <button type="submit" name="submit_tamu">Kirim</button>
    </form>
</div>