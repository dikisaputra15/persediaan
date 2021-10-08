
<div class="card shadow-sm border-bottom-primary">
    
<?php
    $png = file_get_contents("assets/img/kabserang.png");
    $pngbase64 = base64_encode($png);
?>

<table width="100%">
    <tr>
        <td><img src='data:image;base64,<?= $pngbase64;?>' style="width: 90px; height: 90px;"></td>
        <td>
            <ce<h3>PEMERINTAH KABUPATEN SERANG</h3>
            <h5>DINAS PERUMAHAN, KAWASAN PERMUKIMAN DAN TATA BANGUNAN</h5>
            <h7>Jl. Brigjen KH Sam'un No.7 Telp. (0254)200177 Serang</h7>
        </td>
    </tr>
</table>
<hr>

    <h5 align="center">PERMOHONAN BARANG</h5>
     
    <table>
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
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td><?= $kabid['status']; ?></td>
        </tr>
    </table>

<h5>Rincian Barang</h5>
    <div class="table-responsive">
        <table border="1">
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
        </table>

    </div>
   
</div>