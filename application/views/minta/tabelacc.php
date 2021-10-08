<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Permohonan ACC
                </h4>
            </div>
            
            
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Tanggal Mohon</th>
                    <th>Pemohon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($pacc) :
                    foreach ($pacc as $b) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $b['tgl_minta']; ?></td>
                            <td><?= $b['pemohon']; ?></td>
                            <td>
                               <a href="<?= base_url('Mintabarang/update_status/') . $b['id_minta_barang'] ?>" class="btn btn-danger btn-sm">Terima</a>
                               <a href="<?= base_url('Mintabarang/lihat/') . $b['id_minta_barang'] ?>" class="btn btn-danger btn-sm" target="__blank">Lihat</a>
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
        </table>
    </div>
</div>