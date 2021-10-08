<H3>HI, <?= userdata('nama'); ?></H3>
<H5>SISTEM INFORMASI PENGADAAN ALAT TULIS KANTOR DPKPTB KABUPATEN SERANG</H5><br>

<div class="row">
<div class="col-xl-4 col-md-6 mb-4">
        <a href="<?= base_url('barang'); ?>">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <h3>Master Barang</h3>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>

<div class="col-xl-4 col-md-6 mb-4">
     <a href="<?= base_url('Mintabarang/tabelminta'); ?>">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <h3>Form Minta Barang</h3>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
        </a>
</div>

<?php if($this->session->userdata('login_session')['role']!="pegawai"){ ?> 
<div class="col-xl-4 col-md-6 mb-4">
    <a href="<?= base_url('laporan'); ?>">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                      <h3>Laporan</h3>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
    </a>
</div>
<?php } ?>

<!-- <?php if($this->session->userdata('login_session')['role']=="pegawai"){ ?> 
<div class="col-xl-4 col-md-6 mb-4">
     <a href="<?= base_url('beritaacara/tabelacc'); ?>">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <h3>Permohonan ACC</h3>
                      <h3 style="color: red; text-align: center;"><b><?php echo $acc; ?></b></h3>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
        </a>
</div>
<?php } ?> -->

</div>