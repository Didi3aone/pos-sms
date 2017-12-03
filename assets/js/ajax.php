<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
		tampilJenisUsaha();
		tampilKota();
		tampilGudang();
		tampilJurnalHarian();

		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
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

	//Pembelian
	/*function tampilPembelian() {
		$.get('<?php echo base_url('Pembelian'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pembelian').html(data);
			refresh();
		});
	}*/

	var id_pembelian;
	$(document).on("click", ".konfirmasiHapus-pembelian", function() {
		id_pembelian = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPembelian", function() {
		var id = id_pembelian;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pembelian/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			//tampilPembelian();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPembelian", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pembelian/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pembelian').modal('show');
		})
	})

	$('#form-tambah-pembelian').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pembelian/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			//tampilPembelian();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pembelian").reset();
				$('#tambah-pembelian').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pembelian', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pembelian/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			//tampilPembelian();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-gudang").reset();
				$('#update-pembelian').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-pembelian').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-pembelian').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Jurnal Harian
	function tampilJurnalHarian() {
		$.get('<?php echo base_url('JurnalHarian/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-jurnal-harian').html(data);
			refresh();
		});
	}

	var id_jurnal_harian;
	$(document).on("click", ".konfirmasiHapus-jurnal-harian", function() {
		id_jurnal_harian = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataJurnalHarian", function() {
		var id = id_jurnal_harian;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('JurnalHarian/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilJurnalHarian();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataJurnalHarian", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('JurnalHarian/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-jurnal-harian').modal('show');
		})
	})

	$('#form-tambah-jurnal-harian').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('JurnalHarian/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilJurnalHarian();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-jurnal-harian").reset();
				$('#tambah-jurnal-harian').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-jurnal-harian', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('JurnalHarian/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilJurnalHarian();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-jurnal-harian").reset();
				$('#update-jurnal-harian').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-jurnal-harian').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-jurnal-harian').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
</script>
