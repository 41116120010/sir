<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Transaksi</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Transaksi</h6>
                </div>
                    <div class="card-body">
                        <form class="user" method="POST" action="<?= site_url('pendapatan/store') ?>">
                            <div class="form-group">
            <label>No Transaksi</label>
            <input type="text" name="no_trx" class="form-control" value="<?= $no_trx ?>" readonly>
        </div>

        <div class="form-group">
            <label>Jenis Konsol</label>
            <select name="jenis_konsol" class="form-control" id="jenis_konsol" required>
                <option value="">-- Pilih Jenis Konsol --</option>
                <option value="PS3">PS3</option>
                <option value="PS4">PS4</option>
            </select>
        </div>

        <div class="form-group">
            <label>Kode Konsol</label>
            <select name="kode_konsol" class="form-control" id="kode_konsol" required>
                <option value="">-- Pilih Kode Konsol --</option>
                <!-- Diisi via AJAX -->
            </select>
        </div>

        <div class="form-group">
            <label>Durasi Penyewaan</label>
            <select name="durasi_penyewaan" class="form-control" id="durasi_penyewaan" required>
                <option value="">-- Pilih Durasi --</option>
                <?php foreach ($durasi_list as $durasi): ?>
                    <option value="<?= $durasi ?>"><?= $durasi ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Pendapatan</label>
            <input type="text" name="pendapatan" class="form-control" id="pendapatan" readonly>
        </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Tambah
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

<script>
document.addEventListener("DOMContentLoaded", function() {
    const jenisSelect = document.getElementById('jenis_konsol');
    const kodeSelect = document.getElementById('kode_konsol');
    const durasiSelect = document.getElementById('durasi_penyewaan');
    const pendapatanInput = document.getElementById('pendapatan');

    jenisSelect.addEventListener('change', function() {
        fetch("<?= site_url('pendapatan/get_kode_konsol_by_jenis') ?>?jenis_konsol=" + jenisSelect.value)
            .then(res => res.json())
            .then(data => {
                kodeSelect.innerHTML = "<option value=''>-- Pilih Kode Konsol --</option>";
                data.forEach(item => {
                    kodeSelect.innerHTML += `<option value="${item.kode_konsol}">${item.kode_konsol}</option>`;
                });
            });
    });

    durasiSelect.addEventListener('change', hitungPendapatan);
    jenisSelect.addEventListener('change', hitungPendapatan);

    function hitungPendapatan() {
        const jenis = jenisSelect.value;
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
    }
});
</script>