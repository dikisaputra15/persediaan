<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form minta barang
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('Mintabarang') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                 <form action="<?= base_url('Mintabarang/addproses'); ?>" method="POST">
                    <div class="row form-group">
                        <label class="col-md-12" for="nama_pemohon">Nama Pemohon</label>
                        <div class="col-md-12">
                            <input name="nama_pemohon" id="nama_pemohon" type="text" class="form-control" placeholder="Nama pemohon...">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-12" for="barang">barang yang diminta</label>
                        <div class="col-md-12">
                         <?php foreach ($barang as $dat) { ?>
                         <input type="checkbox" name="id_barang[]" value="<?= $dat['id_barang']; ?>"><?= $dat['nama_barang']; ?>
                         <br>
                          <?php } ?>

                          </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>