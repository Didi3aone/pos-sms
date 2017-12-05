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
        <span class="label label-primary pull-right">7</span>
        </span>
        </a>
        <ul class="treeview-menu">
<li class="treeview">
<a href="#">
<i class="fa fa-files-o"></i>
<span>Rekanan</span>
<span class="pull-right-container">
<span class="label label-primary pull-right">5</span>
</span>
</a>
<ul class="treeview-menu">
          <li <?php if ($page == 'jenis_usaha') {echo 'class="active"';} ?>><a href="<?php echo base_url('JenisUsaha'); ?>"><i class="fa fa-circle-o"></i> Master Jenis Usaha</a></li>
          <li <?php if ($page == 'kota') {echo 'class="active"';} ?>><a href="<?php echo base_url('Kota'); ?>"><i class="fa fa-circle-o"></i> Master Kota</a></li>
          <li <?php if ($page == 'supplier') {echo 'class="active"';} ?>><a href="<?php echo base_url('Supplier'); ?>"><i class="fa fa-circle-o"></i> Master Supplier</a></li>
          <li <?php if ($page == 'customer') {echo 'class="active"';} ?>><a href="<?php echo base_url('Customer'); ?>"><i class="fa fa-circle-o"></i> Master Customer</a></li>
          <li <?php if ($page == 'top') {echo 'class="active"';} ?>><a href="<?php echo base_url('Top'); ?>"><i class="fa fa-circle-o"></i> Master T.O.P</a></li>
</ul>

<li class="treeview">
<a href="#">
<i class="fa fa-files-o"></i>
<span>Stock</span>
<span class="pull-right-container">
<span class="label label-primary pull-right">5</span>
</span>
</a>
<ul class="treeview-menu">
          <li <?php if ($page == 'brand') {echo 'class="active"';} ?>><a href="<?php echo base_url('Brand'); ?>"><i class="fa fa-circle-o"></i> Master Brand</a></li>
          <li <?php if ($page == 'stock') {echo 'class="active"';} ?>><a href="<?php echo base_url('Stock'); ?>"><i class="fa fa-circle-o"></i> Master Stock</a></li>
          <li <?php if ($page == 'saldoAwal') {echo 'class="active"';} ?>><a href="<?php echo base_url('SaldoAwal'); ?>"><i class="fa fa-circle-o"></i> Master Saldo Barang</a></li>
          <li <?php if ($page == 'hargaBeli') {echo 'class="active"';} ?>><a href="<?php echo base_url('HargaBeli'); ?>"><i class="fa fa-circle-o"></i> Master Harga Beli</a></li>
          <li <?php if ($page == 'hargaJual') {echo 'class="active"';} ?>><a href="<?php echo base_url('HargaJual'); ?>"><i class="fa fa-circle-o"></i> Master Harga Jual</a></li>
          <li <?php if ($page == 'satuan') {echo 'class="active"';} ?>><a href="<?php echo base_url('Satuan'); ?>"><i class="fa fa-circle-o"></i> Master Satuan</a></li>
</ul>

<li class="treeview">
<a href="#">
<i class="fa fa-files-o"></i>
<span>HRD</span>
<span class="pull-right-container">
<span class="label label-primary pull-right">4</span>
</span>
</a>
<ul class="treeview-menu">
          <li <?php if ($page == 'jabatan') {echo 'class="active"';} ?>><a href="<?php echo base_url('Jabatan'); ?>"><i class="fa fa-circle-o"></i> Master Jabatan</a></li>
          <li <?php if ($page == 'karyawan') {echo 'class="active"';} ?>><a href="<?php echo base_url('Karyawan'); ?>"><i class="fa fa-circle-o"></i> Master Karyawan</a></li>
          <li <?php if ($page == 'salesman') {echo 'class="active"';} ?>><a href="<?php echo base_url('Salesman'); ?>"><i class="fa fa-circle-o"></i> Master Salesman</a></li>
          <li <?php if ($page == 'potongan') {echo 'class="active"';} ?>><a href="<?php echo base_url('Potongan'); ?>"><i class="fa fa-circle-o"></i> Master Potongan</a></li>
</ul>

<li class="treeview">
<a href="#">
<i class="fa fa-files-o"></i>
<span>Inventaris</span>
<span class="pull-right-container">
<span class="label label-primary pull-right">2</span>
</span>
</a>
<ul class="treeview-menu">
          <li <?php if ($page == 'tanah') {echo 'class="active"';} ?>><a href="<?php echo base_url('Tanah'); ?>"><i class="fa fa-circle-o"></i> Master Tanah</a></li>
          <li <?php if ($page == 'bangunan') {echo 'class="active"';} ?>><a href="<?php echo base_url('Bangunan'); ?>"><i class="fa fa-circle-o"></i> Master Bangunan</a></li>
          <li <?php if ($page == 'kendaraan') {echo 'class="active"';} ?>><a href="<?php echo base_url('Kendaraan'); ?>"><i class="fa fa-circle-o"></i> Master Kendaraan</a></li>
          <li <?php if ($page == 'alatGudang') {echo 'class="active"';} ?>><a href="<?php echo base_url('AlatGudang'); ?>"><i class="fa fa-circle-o"></i> Master Alat Gudang</a></li>
          <li <?php if ($page == 'alatKantor') {echo 'class="active"';} ?>><a href="<?php echo base_url('AlatKantor'); ?>"><i class="fa fa-circle-o"></i> Master Alat Kantor</a></li>
</ul>

<li class="treeview">
<a href="#">
<i class="fa fa-files-o"></i>
<span>Rekening Akuntansi</span>
<span class="pull-right-container">
<span class="label label-primary pull-right">2</span>
</span>
</a>
<ul class="treeview-menu">
          <li <?php if ($page == 'bank') {echo 'class="active"';} ?>><a href="<?php echo base_url('Bank'); ?>"><i class="fa fa-circle-o"></i> Master Bank</a></li>
          <li <?php if ($page == 'aktiva') {echo 'class="active"';} ?>><a href="<?php echo base_url('Aktiva'); ?>"><i class="fa fa-circle-o"></i> Master Aktiva</a></li>
          <li <?php if ($page == 'rekHutang') {echo 'class="active"';} ?>><a href="<?php echo base_url('RekHutang'); ?>"><i class="fa fa-circle-o"></i> Master Rek. Hutang</a></li>
          <li <?php if ($page == 'modal') {echo 'class="active"';} ?>><a href="<?php echo base_url('Modal'); ?>"><i class="fa fa-circle-o"></i> Master Modal</a></li>
          <li <?php if ($page == 'pendapatan') {echo 'class="active"';} ?>><a href="<?php echo base_url('Pendapatan'); ?>"><i class="fa fa-circle-o"></i> Master Pendapatan</a></li>
          <li <?php if ($page == 'hargaPokok') {echo 'class="active"';} ?>><a href="<?php echo base_url('HargaPokok'); ?>"><i class="fa fa-circle-o"></i> Master Harga Pokok</a></li>
          <li <?php if ($page == 'biaya') {echo 'class="active"';} ?>><a href="<?php echo base_url('Biaya'); ?>"><i class="fa fa-circle-o"></i> Master Biaya</a></li>
</ul>

     <li class="treeview">
<a href="#">
<i class="fa fa-files-o"></i>
<span>Hutang Piutang</span>
<span class="pull-right-container">
<span class="label label-primary pull-right">2</span>
</span>
</a>
<ul class="treeview-menu">
          <li <?php if ($page == 'hutang') {echo 'class="active"';} ?>><a href="<?php echo base_url('Hutang'); ?>"><i class="fa fa-circle-o"></i> Master Hutang</a></li>
          <li <?php if ($page == 'piutang') {echo 'class="active"';} ?>><a href="<?php echo base_url('Piutang'); ?>"><i class="fa fa-circle-o"></i> Master Piutang</a></li>
</ul>
<li <?php if ($page == 'target') {echo 'class="active"';} ?>><a href="<?php echo base_url('Target'); ?>"><i class="fa fa-gear"></i>Target</a></li>
        </ul>
      </li>

                        <li class="treeview">
                                              <a href="#">
                                                  <i class="fa fa-credit-card"></i>
                                                  <span>Transaksi</span>
                                                  <span class="pull-right-container">
                                                      <span class="label label-primary pull-right">12</span>
                                                  </span>
                                              </a>
                                              <ul class="treeview-menu">
                                                  <li <?php if ($page == 'pembelian') {echo 'class="active"';} ?>><a href="<?php echo base_url('Pembelian'); ?>"><i class="fa fa-circle-o"></i> Pembelian</a></li>
                                                  <li <?php if ($page == 'pembayaran_hutang_pembelian') {echo 'class="active"';} ?>><a href="<?php echo base_url('PembayaranHutangPembelian'); ?>"><i class="fa fa-circle-o"></i> Pembayaran Hutang Beli</a></li>
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

<li class="treeview">
  <a href="#">
    <i class="fa fa-cubes"></i>
    <span>Gudang</span>
    <span class="pull-right-container">
      <span class="label label-primary pull-right">3</span>
    </span>
  </a>
    <ul class="treeview-menu">
      <li <?php if ($page == 'gudang') {echo 'class="active"';} ?>><a href="<?php echo base_url('Gudang'); ?>"><i class="fa fa-circle-o"></i> Master Gudang</a></li>
    <li <?php if ($page == 'Insentif_Kirim') {echo 'class="active"';} ?>><a href="<?php echo base_url('InsentifKirim'); ?>"><i class="fa fa-plus"></i> Master Insentif Kirim</a></li>
    <li <?php if ($page == 'loading') {echo 'class="active"';} ?>><a href="<?php echo base_url('Loading'); ?>"><i class="fa fa-truck"></i> Konfirmasi Draft/Loading</a></li>


  </ul>
</li>

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
