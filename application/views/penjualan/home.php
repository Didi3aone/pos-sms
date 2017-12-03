<!-- <link href="<?php echo base_url(); ?>assets/toastr/toastr.min.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>assets/toastr/toastr.min.js"></script> -->

<script type="text/javascript">
//   $(document).ready(function() {
//     $('#simpan').click(function() {
//        toastr.success('Data transaksi berhasil disimpan.');
//     });
// });
</script>

<script>
    // $('#notifications').setTimeout(function () {
    //   $('.msg').fadeOut(1000);
    // }, 3000);;
</script>

<div class="box">
  <div class="box-header">
    <script>
    function terimainputCombox(){
           var input=document.forms['frmPenjualan']['supplier'].value;
           var outputKode = document.getElementById("kd_supplier");
           outputKode.value = input;

           var input2=document.forms['frmPenjualan']['salesman'].value;
           var outputKode2 = document.getElementById("kd_salesman");
           outputKode2.value = input2;

           var input3=document.forms['frmPenjualan']['customer'].value;
           var outputKode3 = document.getElementById("kd_customer");
           outputKode3.value = input3;
}
    </script>
    <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
    <form id="formPenjualan" action="<?=base_url()?>Penjualan/simpan" method="post" name='frmPenjualan'>
      <button class="btn btn btn-default pull-right" type="button" ><i class="glyphicon glyphicon-info-sign"></i> Posisi Piutang</button>
      <input type="hidden" name="today" value="<?php echo date("Y-m-d H:i:s"); ?>">
      <input type="hidden" name="user" value="<?php echo $getUser[0]->name; ?>">
      <input type="hidden" class="form-control" value=<?php if(count($looping) == '0') { echo "1"; } else echo $looping[0]->id; ?> name="idLooping" id="idLooping" style="width:150px;">
    <div class="input-group form-group">
      <label class="custom-control custom-checkbox">
  <input type="checkbox" name="ppn" value="yes" class="custom-control-input">
  <span class="custom-control-indicator"></span>
  <span class="custom-control-description">Harga Include PPn</span>
</label>
<?php
foreach ($this->M_penjualan->last_record() as $row) {
  $faktur = $row->Faktur;
  $cutCharFaktur = substr($faktur, 4);
  $convFaktur = (int)$cutCharFaktur+1;
 ?>
<input type="hidden" class="form-control" value=<?php echo $convFaktur; ?> name="faktur_jual" style="width:150px;">
<?php
}
?>
      </div>

      <div class="input-group form-group">
        <span class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </span>
        <input type="text" class="form-control" id="tgl_jual" placeholder="Tanggal" value=<?php echo date("Y-m-d"); ?> name="tgl_penjualan" style="width:150px;">
        <span class="input-group-addon">
        <i class="glyphicon glyphicon-random"></i>
        </span>
        <select id="customer" name="customer" onchange="terimainputCombox()" class="form-control select2" aria-describedby="sizing-addon2" style="width:210px;">
          <option value="">- Pilih Customer -</option>
            <?php
            foreach ($dataCustomer as $customer) {
              ?>
              <option value="<?php echo $customer->Kode; ?>">
                <?php echo $customer->Nama; ?>
              </option>
              <?php
            }
            ?>
          </select>
    <input type="text" class="form-control" placeholder="Kode" value="" name="kd_customer" id="kd_customer" style="width:60px;" readonly>
    </div>
    <script>
    $(function() {
$("#tgl_jual").datepicker({
autoclose: true,
format: "yyyy-mm-dd",
todayHighlight: true,
orientation: "down auto",
todayBtn: true,
todayHighlight: true,
});
});
</script>

    <label>Pembayaran</label>
    <div class="input-group form-group">
    <div class="panel panel-default">
      <span class="input-group-addon">
      <input id="radio1" name="jenis_bayar" type="radio" value="K" class="custom-control-input">
      <span class="custom-control-description">Kredit</span>
      </span>
      <span class="input-group-addon">
      <input id="radio2" name="jenis_bayar" type="radio" value="C" class="custom-control-input">
      <span class="custom-control-description">Cash</span>
      </span>
    </div>
  </div>

    <div class="input-group form-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-shopping-cart"></i>
      </span>
        <select id="supplier" onchange="terimainputCombox()" name="supplier" class="form-control select2" aria-describedby="sizing-addon2" style="width:210px;">
        <option value="">- Pilih Supplier -</option>
          <?php
          foreach ($dataSupplier as $supplier) {
            ?>
            <option value="<?php echo $supplier->Kode; ?>">
              <?php echo $supplier->Nama; ?>
            </option>
            <?php
          }
          ?>
        </select>
        <input id="kd_supplier" type="text" class="form-control" placeholder="Kode" name="kd_supplier" style="width:60px;" readonly>
        <span class="input-group-addon">
          <i class="glyphicon glyphicon-user"></i>
        </span>
        <select id="salesman" onchange="terimainputCombox()" name="salesman" class="form-control select2" aria-describedby="sizing-addon2" style="width:210px;">
          <option value="">- Pilih Salesman -</option>
            <?php
            foreach ($dataSalesman as $salesman) {
              ?>
              <option value="<?php echo $salesman->Kode; ?>">
                <?php echo $salesman->Nama; ?>
              </option>
              <?php
            }
            ?>
          </select>
          <input id="kd_salesman" type="text" class="form-control" placeholder="Kode" name="kd_salesman" style="width:60px;" readonly>
          <span class="input-group-addon">
            <label>T.O.P</label>
          </span>
          <select id="top" name="top" class="form-control select2" aria-describedby="sizing-addon2" style="width:70px;">
            <option value=""></option>
            <?php for($i=1; $i<=150; $i++) { ?>
            <option value=<?= $i ?>><?= $i ?></option>
            <?php
          }
          ?>
            </select>
            <input type="text" class="form-control" id="tgl_top" placeholder="Tanggal" name="tgl_top" style="width:150px;">

      </div>
<script>
$(function() {
$("#tgl_top").datepicker({
autoclose: true,
format: "yyyy-mm-dd",
todayHighlight: true,
orientation: "down auto",
todayBtn: true,
todayHighlight: true,
});
});
</script>
    </form>

<script>
function simpanTransaksi() {
    document.getElementById("formPenjualan").submit();
}
</script>

    <form action="" method="post" name="inputTabel">
    <div class="input-group form-group">
      <?php
        $i = 1; ?>
        <?php foreach ($dataTemp as $temp) {
        $i++; } ?>

    <input type="text" class="form-control" value=<?= $i ?> name="noUrut" id="noUrut" style="width:50px;">

    <select id="kode_jual" name="kode_jual" class="form-control select2" aria-describedby="sizing-addon2" style="width:80px;">
      <option value=""></option>
       <?php
       foreach ($dataStock as $stock) {
         ?>
         <option value="<?php echo $stock->Kode; ?>">
           <?php echo $stock->Kode; ?>
         </option>
         <?php
         }
        ?>
      </select>

      <select id="nama_barang" name="nama_barang" class="form-control select2" aria-describedby="sizing-addon2" style="width:175px;">
        <option value=""></option>
          <?php
          foreach ($dataStock as $stock) {
            ?>
            <option value="<?php echo $stock->Nama; ?>">
              <?php echo $stock->Nama; ?>
            </option>
            <?php
          }
          ?>
        </select>

        <input type="text" class="form-control" value="1" name="qty" id="qty" style="width:50px;">

        <select id="satuan" name="satuan" class="form-control select2" aria-describedby="sizing-addon2" style="width:70px;">
          <option value=""></option>
          <option>CRT</option>
          <option>PAC</option>
          <option>PCS</option>
          </select>

          <input type="text" class="form-control" value="0" name="harga" id="harga" style="width:90px;" readonly>
          <input type="text" class="form-control" value="0.00" name="disc_1" id="disc_1" style="width:85px;">
          <input type="text" class="form-control" value="0.00" name="disc_2" id="disc_2" style="width:85px;">
          <input type="text" class="form-control" value="0.00" name="disc_3" id="disc_3" style="width:85px;">
          <input type="text" class="form-control" value="0" name="jumlah" id="jumlah" style="width:100px;" readonly>
          <select id="bns" name="bns" class="form-control select2" aria-describedby="sizing-addon2" style="width:97px;">
            <option value=""></option>
            <option>Ya</option>
            <option>Tidak</option>
            </select>

          <select id="gudang" name="gudang" class="form-control select2" aria-describedby="sizing-addon2" style="width:97px;">
              <option value=""></option>
                <?php
                foreach ($dataGudang as $gudang) {
                  ?>
                  <option value="<?php echo $gudang->Kode; ?>">
                    <?php echo $gudang->Kode; ?>
                  </option>
                  <?php
                }
                ?>
              </select>
    </div>

    <div class="table-responsive" style="height:250px; overflow:auto;" id="table_content">
    <table class="table table-bordered table-striped" id='tabelinput'>
      <thead>
        <tr>
          <th>No</th>
          <th>Kode</th>
          <th>Nama</th>
          <th>Qty</th>
          <th>Satuan</th>
          <th>Harga</th>
          <th>Disc 1</th>
          <th>Disc 2</th>
          <th>Disc 3</th>
          <th>Jumlah</th>
          <th>Bns</th>
          <th>Gdg</th>
        </tr>
        <thead>
          <?php
            $no = 1;
            foreach ($dataTemp as $temp) {
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $temp->Kode; ?></td>
                <td><?php echo $temp->Nama; ?></td>
                <td><?php echo $temp->Qty; ?></td>
                <td><?php echo $temp->Sat; ?></td>
                <td><?php echo $temp->Harga; ?></td>
                <td><?php echo $temp->Disc1; ?></td>
                <td><?php echo $temp->Disc2; ?></td>
                <td><?php echo $temp->Disc3; ?></td>
                <td><?php echo $temp->Jumlah; ?></td>
                <td><?php echo $temp->Bns; ?></td>
                <td><?php echo $temp->Gdg; ?></td>
              </tr>
              <?php
              $no++;
              }
              ?>
        </table>
      </div>

      <hr>
      <button class="btn btn btn-success btn-block" onClick="terimaInputTambah()" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button><a id="ack"></a>
      <button class="btn btn-danger btn-block" onClick="hapusInput()" type="button"><i class="glyphicon glyphicon-trash"></i> Hapus</button><a id="ackDel"></a>
      </form>

      <script>
      function terimaInputTambah(){

        var i, j;
        var loopingNo = document.getElementById("noUrut");

            $.ajax({
            url: "<?php echo site_url('Penjualan/prosesTambah');?>",
            type: 'POST',
            cache: false,
            data: {
            "kode_jual": $("#kode_jual").val(), "nama_barang": $("#nama_barang").val(), "qty": $("#qty").val(),
            "satuan": $("#satuan").val(), "harga": $("#harga").val(), "disc_1": $("#disc_1").val(),
            "disc_2": $("#disc_2").val(), "disc_3": $("#disc_3").val(), "jumlah": $("#jumlah").val(), "bns": $("#bns").val(),
            "gudang": $("#gudang").val()},
             success: function(data) {
             $("div#ack").html(data);
             //document.getElementById("table_content").innerHTML=data;
             //$("#table_content").html(data);
             $("#table_content").load( "<?php echo base_url('Penjualan')?> #table_content" );
             $("#sub_tot").load( "<?php echo base_url('Penjualan')?> #sub_tot" );
             $("#tot").load( "<?php echo base_url('Penjualan')?> #tot" );
             $("#idLooping").load( "<?php echo base_url('Penjualan')?> #idLooping" );
             }
            });

            j=Number(document.forms['inputTabel']['noUrut'].value)+1;
            //window.alert(j);
            for(i=1; i<=j; i++) {
              loopingNo.value = i;
            }

            return false;
            //setInterval(function(){realoadTabel()},1000);

      }
      </script>

      <script>
      function hapusInput(){

        var setNum, num = document.getElementById("noUrut");
        var r = confirm("Anda yakin menghapus data pembelian terakhir?");
        if (r == true) {
          $.ajax({
          url: "<?php echo site_url('Penjualan/delete');?>",
          type: 'POST',
          cache: false,
           success: function(html) {
           $("div#ackDel").html(html);
           $("#table_content").load( "<?php echo base_url('Penjualan')?> #table_content" );
           $("#sub_tot").load( "<?php echo base_url('Penjualan')?> #sub_tot" );
           $("#tot").load( "<?php echo base_url('Penjualan')?> #tot" );
           }
          });

          setNum = Number(document.forms['inputTabel']['noUrut'].value)-1;
          num.value = setNum;
          return false;

          }
      }
      </script>

      <hr />
      <form action="<?=base_url()?>Penjualan/index/<?php echo $dataSTotal[0]->s_total ?>" method="post" name="frmTotal">
      <div class="input-group form-group">
        <span class="input-group-addon">
          <label>Sub Total</label>
        </span>
        <div id="sub_tot">
        <input type="text" class="form-control" value=<?php if($dataSTotal[0]->s_total != NULL) { echo $dataSTotal[0]->s_total; } else echo "0"; ?> name="sub_total" id="sub_total" style="width:200px;" readonly>
        </div>
        <span class="input-group-addon">
          <i class="glyphicon glyphicon-option-horizontal"></i>
        </span>
        <input type="text" class="form-control" placeholder="Keterangan" name="ket" style="width:300px;">
      </div>
      <div class="input-group form-group">
        <span class="input-group-addon">
          <label>Disc %</label>
        </span>
        <input type="text" class="form-control" value="0.00" name="disc" id="disc" style="width:55px;">
        <span class="input-group-addon">
          <label>Rp</label>
        </span>
        <div id="diskon">
          <input type="text" class="form-control" value="0" name="disc_rp" id="disc_rp" style="width:150px;" readonly>
      </div>
      </div>
        <button class="btn btn" onClick="hitungDiskon()" type="button"><i class="glyphicon glyphicon-cog"></i> Hitung</button><a id="ackDiskon"></a>
      </form>

      <script>
      function hitungDiskon(){
        var diskonRp, diskon = $("#disc").val();
        var setDiskonRp = document.getElementById("disc_rp");
        var updateTotal, total = document.getElementById("total");

            $.ajax({
            url: "<?php echo site_url('Penjualan/index');?>",
            type: 'POST',
            cache: false,
            success: function(html) {
            $("div#ackDiskon").html(html);
            //$("#diskon").load( "<?php echo base_url('Penjualan')?> #diskon" );
            }
            });

            $("#sub_tot").load( "<?php echo base_url('Penjualan')?> #sub_tot" );
            diskonRp = Number($("#sub_total").val()*diskon);
            setDiskonRp.value = diskonRp;
            updateTotal = (document.forms['frmTotal']['sub_total'].value)-diskonRp;
            total.value = updateTotal;
            //window.alert(diskonRp);
            return false;
            //setInterval(function(){realoadTabel()},1000);
      }
      </script>

      <hr />
      <label>Total</label>
      <div class="input-group form-group">
      <span class="input-group-addon">
        <i class="glyphicon glyphicon-th-list"></i>
      </span>
      <div id="tot">
      <input type="text" class="form-control" value=<?php if($dataSTotal[0]->s_total != NULL) { echo $dataSTotal[0]->s_total; } else echo "0"; ?> name="total" id="total" style="width:200px;" readonly>
      </div>
      <button class="btn btn btn-info pull-right" onclick="inputByText()"><i class="glyphicon glyphicon-text-height"></i> Input by Text</button>
      </div>

      <script type="text/javascript">
      var save_method;
      var setNum, num = document.getElementById("noUrut");

      function inputByText()
      {

    save_method = 'add';
    $('#formInputByText')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modalInputbyText').modal('show'); // show bootstrap modal
    }

    function addByText()
{
    //$('#btnAdd').text('Inputing...'); //change button text
    var isiInput, hitungHastag;

    $('#btnAdd').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('Penjualan/ajax_addByText')?>";
    }
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: { "kode_supplier": $("#kd_supplier").val(), "inputText": $("#inputText").val() },
        dataType: "JSON",
        success: function(data)
        {
          isiInput = document.forms['formInputByText']['inputText'].value;
          hitungHastag = (isiInput.match(/#/g) || []).length;
          //window.alert(hitungHastag);
          //console.log(hitungHastag);
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modalInputbyText').modal('hide');
                $("#table_content").load( "<?php echo base_url('Penjualan')?> #table_content" );
                $("#sub_tot").load( "<?php echo base_url('Penjualan')?> #sub_tot" );
                $("#tot").load( "<?php echo base_url('Penjualan')?> #tot" );
                $("#idLooping").load( "<?php echo base_url('Penjualan')?> #idLooping" );
                setNum = Number(document.forms['inputTabel']['noUrut'].value)+(hitungHastag+1);
                num.value = setNum;
                //reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }

            //$('#btnAdd').text('Prosesing'); //change button text
            $('#btnAdd').attr('disabled',false); //set button enable


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding input text');
            $('#btnAdd').text('Prosesing'); //change button text
            $('#btnAdd').attr('disabled',false); //set button enable

        }
    });
}

      </script>
      <hr />
      <div class="col-md-4 text-left">
      <a href="<?php echo base_url();?>Penjualan/tambahBaru" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-file"></i> Baru</a>
      <hr />
      </div>
      <div class="col-md-4 text-left">
      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#modalCari"><i class="glyphicon glyphicon-search"></i> Cari</button>
      <hr />
      </div>
      <div class="col-md-4 text-right">
      <button onclick="simpanTransaksi()" id="simpan" class="success btn btn-primary btn-block"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
      <hr />
      </div>

<!-- Modal Cari -->
      <div class="modal fade" id="modalCari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog" style="width:900px">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Cari Data Penjualan</h4>
                          </div>
                          <div class="modal-body" id="table_content_cari">
                              <table id="lookupCari" class="table table-bordered table-hover table-striped">
                                  <thead>
                                      <tr>
                                          <th>Faktur</th>
                                          <th>Tgl</th>
      									                  <th>Kode</th>
                                          <th>Harga</th>
                                          <th>Qty</th>
                                          <th>Satuan</th>
      									                  <th>Jumlah</th>
                                          <th>Gudang</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody id="data-jual">
                                    <?php
                                      foreach ($dataPenjualan as $penjualan) {
                                        ?>
                                        <tr>
                                          <td><?php echo $penjualan->Faktur; ?></td>
                                          <td><?php echo $penjualan->Tgl; ?></td>
                                          <td><?php echo $penjualan->Kode; ?></td>
                                          <td><?php echo $penjualan->Harga; ?></td>
                                          <td><?php echo $penjualan->Qty; ?></td>
                                          <td><?php echo $penjualan->Satuan; ?></td>
                                          <td><?php echo $penjualan->Jumlah; ?></td>
                                          <td><?php echo $penjualan->gudang; ?></td>
                                          <td class="text-center" style="min-width:50px;">
                                              <button class="btn btn-warning update-dataJual" data-id="<?php echo $penjualan->ID; ?>"><i class="glyphicon glyphicon-edit"></i></button>
                                              <button class="btn btn-danger konfirmasiHapus-jual" data-id="<?php echo $penjualan->ID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove"></i></button>
                                          </td>
                                        </tr>
                                          <?php
                                      }
                                      ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
<!-- End Modal -->

<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

<div id="tempat-modalEdit"></div>

<script type="text/javascript">
    $(function () {
        $("#lookupCari").dataTable();
    });
</script>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPinSup', 'Anda yakin menghapus data ini?', 'Ya'); ?>

<script type="text/javascript">

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

var MyTable = $('#lookupCari').dataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false
  });

function refresh() {
  MyTable = $('#lookupCari').dataTable();
  $("#table_content_cari").load( "<?php echo base_url('Penjualan')?> #table_content_cari" );
}

var id_jual;
$(document).on("click", ".konfirmasiHapus-jual", function() {
  id_jual = $(this).attr("data-id");
})
$(document).on("click", ".hapus-dataJual", function() {
  var id = id_jual;

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Penjualan/deleteTransaksi'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#konfirmasiHapus').modal('hide');
    window.alert("Data Berhasil Dihapus");
    location.reload();
    // refresh();
    // $('#modalCari').modal('show');
    //$('#lookupCari').dataTable().ajax.reload();

  })
})

$(document).on("click", ".update-dataJual", function() {
  var id = $(this).attr("data-id");

  $.ajax({
    method: "POST",
    url: "<?php echo base_url('Penjualan/updateTransaksi'); ?>",
    data: "id=" +id
  })
  .done(function(data) {
    $('#tempat-modalEdit').html(data);
    //$('#modalCari').modal('hide');
    $('#update-jual').modal('show');
  })
})

$(document).on('submit', '#form-update-jual', function(e){
  var data = $(this).serialize();

  $.ajax({
    method: 'POST',
    url: '<?php echo base_url('Penjualan/prosesUpdateTransaksi'); ?>',
    data: data
  })
  .done(function(data) {
      document.getElementById("form-update-jual").reset();
      $('#update-jual').modal('hide');
      window.alert("Data Berhasil Diedit");
      location.reload();
      // MyTable.fnDestroy();
      // refresh();
      // $('#modalCari').modal('show');

      //refresh();
      //$('#lookupCari').dataTable().ajax.reload();
  })

  e.preventDefault();
});

</script>


<!-- Modal Input by Text -->
<div class="modal fade" id="modalInputbyText" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:485px">
                    <div class="modal-body">
                      <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 style="display:block; text-align:center;">Input by Text</h3>
                        <form id="formInputByText" name="formInputByText" method="POST">
                          <div class="input-group form-group">
                            <span class="input-group-addon" id="sizing-addon2">
                              <i class="glyphicon glyphicon-retweet"></i>
                            </span>
                            <textarea name="inputText" id="inputText" cols="500" rows="12" value="Testing" class="form-control" style="width:300px;"></textarea>
                          </div>
                          <div class="form-group">
                            <div class="col-md-12">
                                <button type="button" id="btnAdd" onclick="addByText()" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Proses</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
            </div>
        </div>
<!-- End Modal -->

  </div>
  <!-- /.box-header -->
</div>
