<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>
    <div></div>


    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Mahasiswa</h3>
            <?php if (empty($santri)) : ?>
                <div class="alert alert-danger" role="alert">
                data Santri tidak ditemukan.
                </div>
            <?php endif; ?>
            <ul class="list-group">
            <?php foreach ($santri as $mhs) : ?>
                <li class="list-group-item">
                    <?= $mhs['id_produk'].', '; ?>
                    <?= $mhs['nama'].', '; ?>
                    <?= $mhs['deskripsi'].', '; ?>
                    <?= $mhs['harga']; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>