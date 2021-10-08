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

<h5>OPD : DINAS PERUMAHAN KAWASAN PERMUKIMAN DAN TATA BANGUNAN</h5>
<center><h3>BUKTI PENGAMBILAN BARANG DARI GUDANG</h3></center>

<table border="1">
    <tr>
        <td>Tanggal Permohonan</td>
        <td>Barang Diterima Dari</td>
        <td>Barang Diterima Dari</td>
        <td>Nama / Kode Barang</td>
        <td>Jumlah</td>
    </tr>

    <?php foreach ($ba as $m) { ?>
        <tr>
            <td><?= $m['tgl_minta']; ?></td>
            <td><?= $m['dari']; ?></td>
            <td><?= $m['kepada']; ?></td>
            <td><?= $m['nama_barang']; ?></td>
            <td><?= $m['qty']; ?></td>
        </tr>
    <?php } ?>
    
</table><br>

<table width="100%">
    <tr>
        <td>
            <center> Unit Kerja Penerima <br> </center>
            <center> Yang Menerima <br><br><br> </center>
            <center> Tanda Tangan <br> </center>
            <center> Nama <?= $m['pemohon']; ?></center>
            <center> Jabatan Pegawai</center>
        </td>
        <td>
            <center> Dibuat di <br> </center>
            <center> yang menyerahkan <br><br><br> </center>
            <center> Tanda Tangan <br> </center>
            <center> Nama Mochamad Nirwan Hakim S.E</center>
            <center> Jabatan Pengurus Barang </center>
        </td>
    </tr>
</table><br>
<table width="100%">
<tr>
    <td>
        <center>Mengetahui, </center><br>
        <center>a.n Pengguna/kuasa pengguna </center> <br>
        <center>sekretaris</center><br><br>
        <center>Tanda Tangan</center><br>
        <center>Nama H. Suherlan, ST. M.si</center>
        <center>Jabatan Sekretaris</center>
    </td>
</tr>
</table>