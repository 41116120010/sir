<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Website</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Website</h6>
                </div>
                <div class="card-body">
                        <form class="user" method="post" action="<?= site_url('website/update/' . $website->id) ?>">
                            <div class="form-group">
            <label>Nama Rental</label>
            <input type="text" class="form-control" name="nama_rental" value="<?= $website->nama_rental ?>" required>
        </div>

        <div class="form-group">
            <label>Lokasi Rental</label>
            <input type="text" class="form-control" name="domain_website" value="<?= $website->lokasi_rental ?>" required>
        </div>

        <div class="form-group">
            <label>Harga PS 3 / Jam</label>
            <input type="number" class="form-control" name="ps3_perjam" value="<?= $website->ps3_perjam ?>" required>
        </div>

        <div class="form-group">
            <label>Harga PS 4 / Jam</label>
            <input type="number" class="form-control" name="ps4_perjam" value="<?= $website->ps4_perjam ?>" required>
        </div>

                            <button type="submit" class="btn btn-warning btn-user btn-block">
                                Edit
                            </button>
                            <a href="<?= site_url('website') ?>" class="btn btn-success btn-user btn-block">
                                Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>