

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form minta barang
                        </h4>
<div class="card-body">
                 <form action="<?= base_url('Mintabarang/addproses'); ?>" method="POST">
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_barang">Pilih Barang</label>
                        <div class="col-md-9">
                            <select name="id_barang" id="barang_id" class="custom-select">
                                <option value="" selected disabled>Pilih Barang</option>
                                <?php foreach ($barang as $b) : ?>
                                    <option <?= $this->uri->segment(3) == $b['id_barang'] ? 'selected' : '';  ?> <?= set_select('barang_id', $b['id_barang']) ?> value="<?= $b['id_barang'] ?>"><?= $b['id_barang'] . ' | ' . $b['nama_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="stok">Stok</label>
                        <div class="col-md-9">
                            <input readonly="readonly" name="stok" id="stok" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_barang">Jumlah</label>
                        <div class="col-md-9">
                            <input type="text" name="qty" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6 offset-md-3">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
</div>
</div>
</div>
</div>
<br><br>


<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    List Permintaan barang
                </h4>
            </div>
            
        </div>
    </div><br>
<form action="<?= base_url('Mintabarang/proses_permohonan'); ?>" method="POST">
    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_barang">Kepada</label>
                        <div class="col-md-9">
                            <input type="text" name="kepada" class="form-control" required>
                        </div>
    </div>

    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_barang">Dari / Bidang Unit</label>
                        <div class="col-md-9">
                            <input type="text" name="dari" class="form-control" required>
                        </div>
    </div>

    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_barang">Sifat</label>
                        <div class="col-md-9">
                            <input type="text" name="sifat" class="form-control" required>
                        </div>
    </div>

     <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_barang">Prihal</label>
                        <div class="col-md-9">
                            <input type="text" name="prihal" class="form-control" required>
                        </div>
    </div>

    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_barang">Pembuat</label>
                        <div class="col-md-9">
                            <input type="text" name="pembuat" class="form-control" required>
                        </div>
    </div>

     <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_barang">Tanggal Permintaan</label>
                        <div class="col-md-9">
                            <input type="date" name="tgl_permintaan" class="form-control" required>
                        </div>
    </div><br>

<h5>Rincian Barang</h5>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama barang</th>
                    <th>jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($minta) :
                    foreach ($minta as $m) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $m['nama_barang']; ?></td>
                            <td><?= $m['qty']; ?></td>
                            <td>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('Mintabarang/delete/') . $m['id_tmp'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table><br>

        <input type="submit" name="simpan" value="simpan" class="btn btn-primary">

    </div>
    </form>
</div>