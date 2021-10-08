<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Permohonan Barang
                </h4>
            </div>
            
        </div>
    </div><br>
     
    <table class="table">
    	<tr>
    		<td>Tanggal Minta</td>
    		<td>:</td>
    		<td><?= $kabid['tgl_minta']; ?></td>
    	</tr>
    	<tr>
    		<td>Pemohon</td>
    		<td>:</td>
    		<td><?= $kabid['pemohon']; ?></td>
    	</tr>
    	<tr>
    		<td>Kepada</td>
    		<td>:</td>
    		<td><?= $kabid['kepada']; ?></td>
    	</tr>
    	<tr>
    		<td>Dari</td>
    		<td>:</td>
    		<td><?= $kabid['dari']; ?></td>
    	</tr>
    	<tr>
    		<td>Sifat</td>
    		<td>:</td>
    		<td><?= $kabid['sifat']; ?></td>
    	</tr>
    	<tr>
    		<td>Prihal</td>
    		<td>:</td>
    		<td><?= $kabid['prihal']; ?></td>
    	</tr>
    </table>

<h5>Rincian Barang</h5>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama barang</th>
                    <th>jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                	$no=1;
                ?>
                <?php foreach ($listbarang as $m) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $m['nama_barang']; ?></td>
                            <td><?= $m['qty']; ?></td>
                        </tr>
                 <?php } ?>
            </tbody>
        </table><br>

        <a href="<?= base_url('Mintabarang/setujukabid/kabid/') . $m['id_minta_barang']; ?>" class="btn btn-primary">Setujui</a>
        <a href="<?= base_url('Mintabarang/tolakkabid/') . $m['id_minta_barang']; ?>" class="btn btn-primary" style="float: right;">Tolak</a>

    </div>
   
</div>