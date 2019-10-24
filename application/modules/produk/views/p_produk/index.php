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
            <h3>Daftar Produk</h3>
            <?php if (empty($produk)) : ?>
                <div class="alert alert-danger" role="alert">
                data produk tidak ditemukan.
                </div>
            <?php endif; ?>
            <ul class="list-group">
            <?php foreach ($produk as $pdk) : ?>
                <li class="list-group-item">
                    <?= $pdk['nama']; ?>
                     <a href="<?= base_url(); ?>produk/detail/<?= $pdk['id_produk']; ?>"
                        class="badge badge-primary float-right">detail</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>