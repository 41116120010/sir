<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Transaksi</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Transaksi</h6>
                </div>
                <div class="card-body">
                        <form class="user" method="POST" action="<?= site_url('pendapatan/update/' . $transaksi['id']) ?>">
                            <div class="form-group">
            <label>No Transaksi</label>
            <input type="text" name="no_trx" class="form-control" value="<?= $transaksi['no_trx'] ?>" readonly>
        </div>

        <div class="form-group">
            <label>Jenis Konsol</label>
            <input type="text" class="form-control" value="<?= $transaksi['jenis_konsol'] ?>" readonly>
            <input type="hidden" name="jenis_konsol" value="<?= $transaksi['jenis_konsol'] ?>">
        </div>

        <div class="form-group">
            <label>Kode Konsol</label>
            <input type="text" class="form-control" value="<?= $transaksi['kode_konsol'] ?>" readonly>
            <input type="hidden" name="kode_konsol" value="<?= $transaksi['kode_konsol'] ?>">
        </div>

        <div class="form-group">
            <label>Durasi Penyewaan</label>
            <select name="durasi_penyewaan" class="form-control" id="durasi_penyewaan" required>
                <?php foreach ($durasi_list as $durasi): ?>
                    <option value="<?= $durasi ?>" <?= $transaksi['durasi_penyewaan'] == $durasi ? 'selected' : '' ?>>
                        <?= $durasi ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
                            <div class="form-group">
                            <label>Pendapatan</label>
                            <input type="text" name="pendapatan" class="form-control" id="pendapatan" value="<?= $transaksi['pendapatan'] ?>" readonly>
                            </div>

                            <button type="submit" class="btn btn-warning btn-user btn-block">
                                Edit
                            </button>
                            <a href="<?= site_url('pendapatan') ?>" class="btn btn-success btn-user btn-block">
                                Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const durasiSelect = document.getElementById('durasi_penyewaan');
    const pendapatanInput = document.getElementById('pendapatan');
    const jenis = "<?= $transaksi['jenis_konsol'] ?>";

    durasiSelect.addEventListener('change', function() {
        const durasi = durasiSelect.value;
        fetch("<?= site_url('pendapatan/get_pendapatan') ?>", {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'jenis_konsol=' + jenis + '&durasi=' + durasi
        })
        .then(res => res.json())
        .then(data => {
            pendapatanInput.value = data.pendapatan ?? 0;
        });
    });
});
</script>