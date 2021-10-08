<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Permohonan Barang
                </h4>
            </div>
            
            
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Tgl Persetujuan</th>
                    <th>Pemohon</th>
                    <th>Kepada</th>
                    <th>Dari</th>
                    <th>Sifat</th>
                    <th>Prihal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($listaprove) :
                    foreach ($listaprove as $b) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $b['tgl_minta']; ?></td>
                            <td><?= $b['pemohon']; ?></td>
                            <td><?= $b['kepada']; ?></td>
                            <td><?= $b['dari']; ?></td>
                            <td><?= $b['sifat']; ?></td>
                            <td><?= $b['prihal']; ?></td>
                            <td><?= $b['status']; ?></td>
                            <td>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('Mintabarang/hapuspermohonan/') . $b['id_minta_barang'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                               <a href="<?= base_url('Mintabarang/lihat/') . $b['id_minta_barang'] ?>" class="btn btn-danger btn-sm" target="__blank">Lihat</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="9" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>