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
