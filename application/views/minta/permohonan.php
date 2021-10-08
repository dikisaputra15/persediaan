<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Permohonan Barang
                </h4>
            </div>
            <?php if($this->session->userdata('login_session')['role']=="pegawai"){ ?>
            <div class="col-auto">
                <a href="<?= base_url('Mintabarang') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Minta Barang
                    </span>
                </a>
            </div>
            <?php } ?>
            
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Tgl Minta</th>
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
                if ($permohonan) :
                    foreach ($permohonan as $b) :
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
                                <!-- <a href="<?= base_url('Mintabarang/lihat/') . $b['id_minta_barang'] ?>" class="btn btn-danger btn-sm" target="__blank">Lihat</a> -->
                                <?php if($this->session->userdata('login_session')['role']=="kabid"){ ?> 
                                <a href="<?= base_url('Mintabarang/kabid/') . $b['id_minta_barang'] ?>" class="btn btn-danger btn-sm">Kabid</a>
                                <?php } ?>

                                <?php if($this->session->userdata('login_session')['role']=="kabu"){ ?> 
                                <a href="<?= base_url('Mintabarang/kabu/') . $b['id_minta_barang'] ?>" class="btn btn-danger btn-sm">Kabu</a>
                                <?php } ?>

                                <?php if($this->session->userdata('login_session')['role']=="pptk"){ ?> 
                                <a href="<?= base_url('Mintabarang/pptk/') . $b['id_minta_barang'] ?>" class="btn btn-danger btn-sm">PPTK</a>
                                <?php } ?>
                                
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