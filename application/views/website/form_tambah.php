<h2>Tambah Website</h2>
<form method="post" action="<?= site_url('website/simpan') ?>">
    Nama Rental: <input type="text" name="nama_rental"><br>
    Lokasi Rental: <input type="text" name="lokasi_rental"><br>
    PS3 / Jam: <input type="number" name="ps3_perjam"><br>
    PS4 / Jam: <input type="number" name="ps4_perjam"><br>
    <button type="submit">Simpan</button>
</form>
