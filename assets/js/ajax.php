<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	// var MyTotal = $('#list-total').dataTable({
	// 	  "paging": true,
	// 	  "lengthChange": false,
	// 	  "searching": false,
	// 	  "ordering": false,
	// 	  "info": false,
	// 	  "autoWidth": true
	// 	});


	window.onload = function() {
		tampilJenisUsaha();
		tampilKota();
		tampilGudang();
		tampilSalesman();
		tampilSatuan();
		tampilSupplier();
		tampilKendaraan();
		tampilBank();
		tampilTop();
		tampilJabatan();
		tampilBrand();
		tampilCustomer();
		tampilKaryawan();
		tampilPotongan();
		tampilHargaJual();
		tampilHargaBeli();
		tampilStock();
		tampilInsentifKirim();
		tampilSaldoAwal();
		tampilHutang();
		tampilPiutang();
		//tampilTarget();
		//tampilTotalHutang();


		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}
	//window.location.reload();

	function refresh() {
		MyTable = $('#list-data').dataTable();
		//MyTable = $('#list-total').dataTable();
		//$(form-tambah-saldo-awal);
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	//Jenis Usaha
	function tampilJenisUsaha() {
		$.get('<?php echo base_url('JenisUsaha/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-jenis-usaha').html(data);
			refresh();
		});
	}

	var id_jenis_usaha;
	$(document).on("click", ".konfirmasiHapus-jenisUsaha", function() {
		id_jenis_usaha = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataJenisUsaha", function() {
		var id = id_jenis_usaha;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('JenisUsaha/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilJenisUsaha();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-jenis-usaha').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('JenisUsaha/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilJenisUsaha();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-jenis-usaha").reset();
				$('#tambah-jenis-usaha').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataJenisUsaha", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('JenisUsaha/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-jenis-usaha').modal('show');
		})
	})

	$(document).on('submit', '#form-update-jenis-usaha', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('JenisUsaha/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilJenisUsaha();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-jenis-usaha").reset();
				$('#update-jenis-usaha').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-jenis-usaha').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-jenis-usaha').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Kota
	function tampilKota() {
		$.get('<?php echo base_url('Kota/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kota').html(data);
			refresh();
		});
	}

	var id_kota;
	$(document).on("click", ".konfirmasiHapus-kota", function() {
		id_kota = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKota", function() {
		var id = id_kota;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKota();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-kota').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kota/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kota").reset();
				$('#tambah-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataKota", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kota').modal('show');
		})
	})

	$(document).on('submit', '#form-update-kota', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kota/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kota").reset();
				$('#update-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-kota').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kota').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Gudang
	function tampilGudang() {
		$.get('<?php echo base_url('Gudang/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-gudang').html(data);
			refresh();
		});
	}

	var id_gudang;
	$(document).on("click", ".konfirmasiHapus-gudang", function() {
		id_gudang = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataGudang", function() {
		var id = id_gudang;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Gudang/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilGudang();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataGudang", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Gudang/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-gudang').modal('show');
		})
	})

	$('#form-tambah-gudang').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Gudang/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilGudang();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-gudang").reset();
				$('#tambah-gudang').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-gudang', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Gudang/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilGudang();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-gudang").reset();
				$('#update-gudang').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-gudang').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-gudang').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//Salesman
	function tampilSalesman() {
		$.get('<?php echo base_url('Salesman/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-salesman').html(data);
			refresh();
		});
	}

	var id_salesman;
	$(document).on("click", ".konfirmasiHapus-salesman", function() {
		id_salesman = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSalesman", function() {
		var id = id_salesman;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Salesman/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSalesman();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-salesman').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Salesman/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSalesman();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-salesman").reset();
				$('#tambah-salesman').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataSalesman", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Salesman/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-salesman').modal('show');
		})
	})

	$(document).on('submit', '#form-update-salesman', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Salesman/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSalesman();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-salesman").reset();
				$('#update-salesman').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-salesman').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-salesman').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Satuan
	function tampilSatuan() {
		$.get('<?php echo base_url('Satuan/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-satuan').html(data);
			refresh();
		});
	}

	var id_satuan;
	$(document).on("click", ".konfirmasiHapus-satuan", function() {
		id_satuan = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSatuan", function() {
		var id = id_satuan;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Satuan/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSatuan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-satuan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Satuan/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSatuan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-satuan").reset();
				$('#tambah-satuan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataSatuan", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Satuan/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-satuan').modal('show');
		})
	})

	$(document).on('submit', '#form-update-satuan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Satuan/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSatuan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-satuan").reset();
				$('#update-satuan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-satuan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-satuan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Supplier
	function tampilSupplier() {
		$.get('<?php echo base_url('Supplier/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-supplier').html(data);
			refresh();
		});
	}

	var id_supplier;
	$(document).on("click", ".konfirmasiHapus-supplier", function() {
		id_supplier = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSupplier", function() {
		var id = id_supplier;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Supplier/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSupplier();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-supplier').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Supplier/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSupplier();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-supplier").reset();
				$('#tambah-supplier').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataSupplier", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Supplier/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-supplier').modal('show');
		})
	})

	$(document).on('submit', '#form-update-supplier', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Supplier/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSupplier();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-supplier").reset();
				$('#update-supplier').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".detail-dataSupplier", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Supplier/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#detail-supplier').modal('show');
		})
	})

	$(document).on('submit', '#form-detail-supplier', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Supplier/prosesDetail'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSupplier();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-detail-supplier").reset();
				$('#detail-supplier').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-supplier').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-supplier').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#detail-supplier').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Kendaraan
	function tampilKendaraan() {
		$.get('<?php echo base_url('Kendaraan/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kendaraan').html(data);
			refresh();
		});
	}

	var id_kendaraan;
	$(document).on("click", ".konfirmasiHapus-kendaraan", function() {
		id_kendaraan = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKendaraan", function() {
		var id = id_kendaraan;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kendaraan/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKendaraan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-kendaraan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kendaraan/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKendaraan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kendaraan").reset();
				$('#tambah-kendaraan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataKendaraan", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kendaraan/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kendaraan').modal('show');
		})
	})

	$(document).on('submit', '#form-update-kendaraan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kendaraan/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKendaraan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kendaraan").reset();
				$('#update-kendaraan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-kendaraan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kendaraan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Bank
	function tampilBank() {
		$.get('<?php echo base_url('Bank/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-bank').html(data);
			refresh();
		});
	}

	var id_bank;
	$(document).on("click", ".konfirmasiHapus-bank", function() {
		id_bank = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataBank", function() {
		var id = id_bank;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Bank/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilBank();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-bank').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Bank/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBank();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-bank").reset();
				$('#tambah-bank').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataBank", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Bank/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-bank').modal('show');
		})
	})

	$(document).on('submit', '#form-update-bank', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Bank/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBank();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-bank").reset();
				$('#update-bank').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-bank').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-bank').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Top
	function tampilTop() {
		$.get('<?php echo base_url('Top/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-top').html(data);
			refresh();
		});
	}

	var id_top;
	$(document).on("click", ".konfirmasiHapus-top", function() {
		id_top = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataTop", function() {
		var id = id_top;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Top/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilTop();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-top').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Top/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTop();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-top").reset();
				$('#tambah-top').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataTop", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Top/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-top').modal('show');
		})
	})

	$(document).on('submit', '#form-update-top', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Top/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTop();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-top").reset();
				$('#update-top').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-top').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-top').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Jabatan
	function tampilJabatan() {
		$.get('<?php echo base_url('Jabatan/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-jabatan').html(data);
			refresh();
		});
	}

	var id_jabatan;
	$(document).on("click", ".konfirmasiHapus-jabatan", function() {
		id_jabatan = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataJabatan", function() {
		var id = id_jabatan;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Jabatan/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilJabatan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-jabatan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Jabatan/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilJabatan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-jabatan").reset();
				$('#tambah-jabatan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataJabatan", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Jabatan/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-jabatan').modal('show');
		})
	})

	$(document).on('submit', '#form-update-jabatan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Jabatan/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilJabatan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-jabatan").reset();
				$('#update-jabatan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-jabatan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-jabatan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//Brand
	function tampilBrand() {
		$.get('<?php echo base_url('Brand/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-brand').html(data);
			refresh();
		});
	}

	var id_brand;
	$(document).on("click", ".konfirmasiHapus-brand", function() {
		id_brand = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataBrand", function() {
		var id = id_brand;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Brand/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilBrand();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-brand').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Brand/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBrand();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-brand").reset();
				$('#tambah-brand').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataBrand", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Brand/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-brand').modal('show');
		})
	})

	$(document).on('submit', '#form-update-brand', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Brand/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBrand();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-brand").reset();
				$('#update-brand').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	// $(document).on("click", ".detail-dataBrand", function() {
	// 	var id = $(this).attr("data-id");

	// 	$.ajax({
	// 		method: "POST",
	// 		url: "<?php echo base_url('Brand/detail'); ?>",
	// 		data: "id=" +id
	// 	})
	// 	.done(function(data) {
	// 		$('#tempat-modal').html(data);
	// 		$('#tabel-detail').dataTable({
	// 			  "paging": true,
	// 			  "lengthChange": false,
	// 			  "searching": true,
	// 			  "ordering": true,
	// 			  "info": true,
	// 			  "autoWidth": false
	// 			});
	// 		$('#detail-brand').modal('show');
	// 	})
	// })

	$('#tambah-brand').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-brand').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})



//Customer
	function tampilCustomer() {
		$.get('<?php echo base_url('Customer/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-customer').html(data);
			refresh();
		});
	}

	var id_customer;
	$(document).on("click", ".konfirmasiHapus-customer", function() {
		id_customer = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataCustomer", function() {
		var id = id_customer;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Customer/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilCustomer();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-customer').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Customer/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilCustomer();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-customer").reset();
				$('#tambah-customer').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});



	$(document).on("click", ".update-dataCustomer", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Customer/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-customer').modal('show');
		})
	})

	$(document).on('submit', '#form-update-customer', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Customer/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilCustomer();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-customer").reset();
				$('#update-customer').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-customer').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})



	$('#update-customer').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//Karyawan
	function tampilKaryawan() {
		$.get('<?php echo base_url('Karyawan/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-karyawan').html(data);
			refresh();
		});
	}

	var id_karyawan;
	$(document).on("click", ".konfirmasiHapus-karyawan", function() {
		id_karyawan = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKaryawan", function() {
		var id = id_karyawan;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Karyawan/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKaryawan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-karyawan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Karyawan/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKaryawan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-karyawan").reset();
				$('#tambah-karyawan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataKaryawan", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Karyawan/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-karyawan').modal('show');
		})
	})

	$(document).on('submit', '#form-update-karyawan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Karyawan/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKaryawan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-karyawan").reset();
				$('#update-karyawan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-karyawan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-karyawan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//Potongan
	function tampilPotongan() {
		$.get('<?php echo base_url('Potongan/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-potongan').html(data);
			refresh();
		});
	}

	var id_potongan;
	$(document).on("click", ".konfirmasiHapus-potongan", function() {
		id_potongan = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPotongan", function() {
		var id = id_potongan;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Potongan/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPotongan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-potongan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Potongan/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPotongan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-potongan").reset();
				$('#tambah-potongan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataPotongan", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Potongan/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-potongan').modal('show');
		})
	})

	$(document).on('submit', '#form-update-potongan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Potongan/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPotongan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-potongan").reset();
				$('#update-potongan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-potongan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-potongan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//Harga Jual
function tampilHargaJual() {
		$.get('<?php echo base_url('HargaJual/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-hargaJual').html(data);
			refresh();
		});
	}

	var id_hargaJual;
	$(document).on("click", ".konfirmasiHapus-hargaJual", function() {
		id_hargaJual = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataHargaJual", function() {
		var id = id_hargaJual;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('HargaJual/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilHargaJual();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-harga-jual').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('HargaJual/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilHargaJual();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-harga-jual").reset();
				$('#tambah-harga-jual').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataHargaJual", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('HargaJual/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-harga-jual').modal('show');
		})
	})

	$(document).on('submit', '#form-update-harga-jual', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('HargaJual/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilHargaJual();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-harga-jual").reset();
				$('#update-harga-jual').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-harga-jual').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-harga-jual').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//Stock
	function tampilStock() {
		$.get('<?php echo base_url('Stock/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-stock').html(data);
			refresh();
		});
	}

	var id_stock;
	$(document).on("click", ".konfirmasiHapus-stock", function() {
		id_stock = $(this).attr("data-id");
		// kode_stock = $(this).attr("data-kode");

	})
	$(document).on("click", ".hapus-dataStock", function() {
		var id = id_stock;
		// var kode = kode_stock;
		// var id_stock_gabung = id_stock;
		// var hasil = id_stock_gabung.split(",");
		// var id = hasil[0];
		// var kode = hasil[1];

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Stock/delete'); ?>",
			data: "id=" +id
			// ,
			// 		"kode=" +kode
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilStock();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-stock').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Stock/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilStock();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-stock").reset();
				$('#tambah-stock').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataStock", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Stock/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-stock').modal('show');
		})
	})

	$(document).on('submit', '#form-update-stock', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Stock/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilStock();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-stock").reset();
				$('#update-stock').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".detail-dataStock", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Stock/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#detail-stock').modal('show');
		})
	})

	$(document).on('submit', '#form-detail-stock', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Stock/prosesDetail'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilStock();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-detail-stock").reset();
				$('#detail-stock').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-stock').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-stock').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#detail-stock').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Harga Beli
function tampilHargaBeli() {
		$.get('<?php echo base_url('HargaBeli/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-hargaBeli').html(data);
			refresh();
		});
	}

	var id_hargaBeli;
	$(document).on("click", ".konfirmasiHapus-hargaBeli", function() {
		id_hargaBeli = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataHargaBeli", function() {
		var id = id_hargaBeli;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('HargaBeli/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilHargaBeli();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-harga-beli').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('HargaBeli/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilHargaBeli();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-harga-beli").reset();
				$('#tambah-harga-beli').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataHargaBeli", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('HargaBeli/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-harga-beli').modal('show');
		})
	})

	$(document).on('submit', '#form-update-harga-beli', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('HargaBeli/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilHargaBeli();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-harga-beli").reset();
				$('#update-harga-beli').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-harga-beli').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-harga-beli').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//Insentif Kirim
function tampilInsentifKirim() {
		$.get('<?php echo base_url('InsentifKirim/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-insentifKirim').html(data);
			refresh();
		});
	}

	var id_insentifKirim;
	$(document).on("click", ".konfirmasiHapus-insentifKirim", function() {
		id_insentifKirim = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataInsentifKirim", function() {
		var id = id_insentifKirim;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('InsentifKirim/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilInsentifKirim();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-insentif-kirim').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('InsentifKirim/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilInsentifKirim();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-insentif-kirim").reset();
				$('#tambah-insentif-kirim').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataInsentifKirim", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('InsentifKirim/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-insentif-kirim').modal('show');
		})
	})

	$(document).on('submit', '#form-update-insentif-kirim', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('InsentifKirim/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilInsentifKirim();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-insentif-kirim").reset();
				$('#update-insentif-kirim').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-insentif-kirim').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-insentif-kirim').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//Saldo Awal
function tampilSaldoAwal() {
		$.get('<?php echo base_url('SaldoAwal/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-saldoAwal').html(data);
			refresh();
		});
	}

	var id_saldoAwal;
	$(document).on("click", ".konfirmasiHapus-saldoAwal", function() {
		id_saldoAwal = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSaldoAwal", function() {
		var id = id_saldoAwal;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('SaldoAwal/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSaldoAwal();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-saldo-awal').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('SaldoAwal/prosesTambah'); ?>',
			data: data,

		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSaldoAwal();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-saldo-awal").refresh();
				$('#tambah-saldo-awal').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on("click", ".update-dataSaldoAwal", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('SaldoAwal/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-saldo-awal').modal('show');
		})
	})

	$(document).on('submit', '#form-update-saldo-awal', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('SaldoAwal/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSaldoAwal();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-saldo-awal").reset();
				$('#update-saldo-awal').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-saldo-awal').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-saldo-awal').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//Hutang
	function tampilHutang() {
		$.get('<?php echo base_url('Hutang/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-hutang').html(data);
			refresh();
		});
		// $.get('<?php echo base_url('Hutang/total'); ?>',function(data){
		// 	MyTotal.fnDestroy();
		// 	$('#data-total-hutang').html(data);
		// 	refresh();
		// })
	}

	var id_hutang;
	$(document).on("click", ".konfirmasiHapus-hutang", function() {
		id_hutang = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataHutang", function() {
		var id = id_hutang;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Hutang/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilHutang();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-hutang').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Hutang/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilHutang();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-hutang").reset();
				$('#tambah-hutang').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	//function tampilTotalHutang() {
	//	$.get('<?php echo base_url('Hutang/tampil'); ?>', function(data) {
	//		MyTable.fnDestroy();
	//		$('#data-total-hutang').html(data);
	//		refresh();
	//	});
	//}

	$(document).on("click", ".update-dataHutang", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Hutang/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-hutang').modal('show');

		})
	})

	$(document).on('submit', '#form-update-hutang', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Hutang/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilHutang();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-hutang").reset();
				$('#update-hutang').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-hutang').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-hutang').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Piutang
  function tampilPiutang() {
    $.get('<?php echo base_url('Piutang/tampil'); ?>', function(data) {
      MyTable.fnDestroy();
      $('#data-piutang').html(data);
      refresh();
    });
    // $.get('<?php echo base_url('Piutang/total'); ?>',function(data){
    //   MyTotal.fnDestroy();
    //   $('#data-total-piutang').html(data);
    //   refresh();
    // })
  }

  var id_piutang;
  $(document).on("click", ".konfirmasiHapus-piutang", function() {
    id_piutang = $(this).attr("data-id");
  })
  $(document).on("click", ".hapus-dataPiutang", function() {
    var id = id_piutang;

    $.ajax({
      method: "POST",
      url: "<?php echo base_url('Piutang/delete'); ?>",
      data: "id=" +id
    })
    .done(function(data) {
      $('#konfirmasiHapus').modal('hide');
      tampilPiutang();
      $('.msg').html(data);
      effect_msg();
    })
  })

  $('#form-tambah-piutang').submit(function(e) {
    var data = $(this).serialize();

    $.ajax({
      method: 'POST',
      url: '<?php echo base_url('Piutang/prosesTambah'); ?>',
      data: data
    })
    .done(function(data) {
      var out = jQuery.parseJSON(data);

      tampilPiutang();
      if (out.status == 'form') {
        $('.form-msg').html(out.msg);
        effect_msg_form();
      } else {
        document.getElementById("form-tambah-piutang").reset();
        $('#tambah-piutang').modal('hide');
        $('.msg').html(out.msg);
        effect_msg();
      }
    })

    e.preventDefault();
  });

  //function tampilTotalPiutang() {
  //  $.get('<?php echo base_url('Piutang/tampil'); ?>', function(data) {
  //    MyTable.fnDestroy();
  //    $('#data-total-piutang').html(data);
  //    refresh();
  //  });
  //}

  $(document).on("click", ".update-dataPiutang", function() {
    var id = $(this).attr("data-id");

    $.ajax({
      method: "POST",
      url: "<?php echo base_url('Piutang/update'); ?>",
      data: "id=" +id
    })
    .done(function(data) {
      $('#tempat-modal').html(data);
      $('#update-piutang').modal('show');

    })
  })

  $(document).on('submit', '#form-update-piutang', function(e){
    var data = $(this).serialize();

    $.ajax({
      method: 'POST',
      url: '<?php echo base_url('Piutang/prosesUpdate'); ?>',
      data: data
    })
    .done(function(data) {
      var out = jQuery.parseJSON(data);

      tampilPiutang();
      if (out.status == 'form') {
        $('.form-msg').html(out.msg);
        effect_msg_form();
      } else {
        document.getElementById("form-update-piutang").reset();
        $('#update-piutang').modal('hide');
        $('.msg').html(out.msg);
        effect_msg();
      }
    })

    e.preventDefault();
  });

  $('#tambah-piutang').on('hidden.bs.modal', function () {
    $('.form-msg').html('');
  })

  $('#update-piutang').on('hidden.bs.modal', function () {
    $('.form-msg').html('');
  })

//Target
	function tampilTarget() {
		$.get('<?php echo base_url('Target/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-target').html(data);
			refresh();
		});
	}

	var id_target;
	$(document).on("click", ".konfirmasiHapus-target", function() {
		id_target = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataTarget", function() {
		var id = id_target;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Target/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilTarget();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataTarget", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Target1/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-target').modal('show');
		})
	})

	$('#form-tambah-target').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Target/prosesTambah'); ?>',
			data: data
		})
		 .done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTarget();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-target").reset();
				$('#tambah-target').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-target', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Target1/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilTarget();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-target").reset();
				$('#update-target').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-target').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-target').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
</script>
