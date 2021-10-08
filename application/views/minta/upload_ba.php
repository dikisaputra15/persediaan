<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
<div class="card-body">
<?php
$id = $this->uri->segment(3);
?>
                 <form action="<?= base_url('Mintabarang/prosesba/') . $id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_barang">Upload BA</label>
                        <div class="col-md-9">
                            <input type="file" name="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6 offset-md-3">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
</div>

<div class="table-responsive">
<h3>File Berita Acara</h3>
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pemohon</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>

            <?php 
                  $no = 1;
                foreach ($tampilba as $b) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $b['pemohon']; ?></td>
                    <td><a href="<?= base_url('uploads/') . $b['file']; ?>" target="__blank">File BA</a></td>
                </tr>
            <?php } ?>
                
            </tbody>
        </table>
    </div>
</div>