<div class="container">
    <div class="row mt-3">
        <div class="col-md-6"> 

            <div class="card">
                <div class="card-header">
                    Detail Data Mahasiswa
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $santri['nama']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $santri['deskripsi']; ?></h6>
                    <p class="card-text"><?= $santri['harga']; ?></p>
                    <a href="<?= base_url(); ?>santri" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>