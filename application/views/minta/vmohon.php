
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Barang yang diminta
                </h4>
            </div>
        </div>
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

    <div class="table-responsive">
    	<h5 style="text-align: center;">List Barang yang diminta</h5>
    	
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama Barang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                    foreach ($vmohon as $m) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $m['nama_barang']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                
            </tbody>
        </table><br>
<?php 
	$id = $this->uri->segment(3);
?>
        <a href="<?= base_url('Mintabarang/terima/') . $id; ?>" class="btn btn-primary">Terima</a>
        <a href="<?= base_url('Mintabarang/formtolak/') . $id; ?>" class="btn btn-danger" style="float: right;">Tolak</a>

    </div>
</div>