<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <!-- Status -->
        <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>

      <!-- Optionally, you can add icons to the links -->
      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
      <a href="<?php echo base_url('Home'); ?>">
        <i class="fa fa-home"></i>
        <span>Home</span>
      </a>
    </li>

      <li class="treeview">
                            <a href="#">
                                <i class="fa fa-files-o"></i>
                                <span>Master</span>
                                <span class="pull-right-container">
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?php if ($page == 'jenis_usaha') {echo 'class="active"';} ?>><a href="<?php echo base_url('JenisUsaha'); ?>"><i class="fa fa-circle-o"></i> Master Jenis Usaha</a></li>
                                <li <?php if ($page == 'kota') {echo 'class="active"';} ?>><a href="<?php echo base_url('Kota'); ?>"><i class="fa fa-circle-o"></i> Master Kota</a></li>
                                <li <?php if ($page == 'gudang') {echo 'class="active"';} ?>><a href="<?php echo base_url('Gudang'); ?>"><i class="fa fa-circle-o"></i> Master Gudang</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                                              <a href="#">
                                                  <i class="fa fa-credit-card"></i>
                                                  <span>Transaksi</span>
                                                  <span class="pull-right-container">
                                                  </span>
                                              </a>
                                              <ul class="treeview-menu">
                                                  <li <?php if ($page == 'pembelian') {echo 'class="active"';} ?>><a href="<?php echo base_url('Pembelian'); ?>"><i class="fa fa-circle-o"></i> Pembelian</a></li>
                                                  <li <?php if ($page == 'pembayaran_hutang_pembelian') {echo 'class="active"';} ?>><a href="<?php echo base_url('PembayaranHutangPembelian'); ?>"><i class="fa fa-circle-o"></i> Pembayaran Hutang Beli</a></li>
                                                  <li <?php if ($page == 'testing') {echo 'class="active"';} ?>><a href="<?php echo base_url('Testing'); ?>"><i class="fa fa-circle-o"></i> Testing</a></li>
                                                  <li <?php if ($page == 'penjualan') {echo 'class="active"';} ?>><a href="<?php echo base_url('Penjualan'); ?>"><i class="fa fa-circle-o"></i> Penjualan</a></li>
                                                  <li <?php if ($page == 'loading_barang') {echo 'class="active"';} ?>><a href="<?php echo base_url('LoadingBarang'); ?>"><i class="fa fa-circle-o"></i> Loading Barang</a></li>
                                                  <li <?php if ($page == 'konfirmasi_faktur_kembali') {echo 'class="active"';} ?>><a href="<?php echo base_url('KonfirmasiFakturKembali'); ?>"><i class="fa fa-circle-o"></i> Konfirmasi Faktur Kembali</a></li>
                                                  <li <?php if ($page == 'retur_pembelian') {echo 'class="active"';} ?>><a href="<?php echo base_url('ReturPembelian'); ?>"><i class="fa fa-circle-o"></i> Retur Pembelian</a></li>
                                                  <li <?php if ($page == 'retur_penjualan') {echo 'class="active"';} ?>><a href="<?php echo base_url('ReturPenjualan'); ?>"><i class="fa fa-circle-o"></i> Retur Penjualan</a></li>
                                                  <li <?php if ($page == 'mutasi_stock') {echo 'class="active"';} ?>><a href="<?php echo base_url('MutasiStock'); ?>"><i class="fa fa-circle-o"></i> Mutasi Stock</a></li>
                                                  <li <?php if ($page == 'giro_cair') {echo 'class="active"';} ?>><a href="<?php echo base_url('GiroCair'); ?>"><i class="fa fa-circle-o"></i> Giro Cair</a></li>
                                                  <li <?php if ($page == 'pinjaman_supplier') {echo 'class="active"';} ?>><a href="<?php echo base_url('PinjamanSupplier'); ?>"><i class="fa fa-circle-o"></i> Pinjaman Supplier</a></li>
                                                  <li <?php if ($page == 'piutang_karyawan') {echo 'class="active"';} ?>><a href="<?php echo base_url('PiutangKaryawan'); ?>"><i class="fa fa-circle-o"></i> Piutang Karyawan</a></li>
                                                  <li <?php if ($page == 'jurnal_harian') {echo 'class="active"';} ?>><a href="<?php echo base_url('JurnalHarian'); ?>"><i class="fa fa-circle-o"></i> Jurnal Harian</a></li>
                                              </ul>
                                          </li>

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
