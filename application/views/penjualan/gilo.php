<script>
    //submit login
    $('#inputTabel').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: 'post',
            url: $(this).attr("action"),
            data: $(this).find('input, textarea, select').serialize(),
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if(data.status ==  'fail'){
                    toastr["error"](data.msg);
                    $('#loader').css('display', 'none');
                    $('#loginBtn').show();
                }else{
                    setTimeout(function() {
                        $('#loader').fadeOut("slow").hide();
                        window.location.href = "<?php echo base_url()?>";
                        $('#loginBtn').show();
                    }, 1000);

                }
            }
        });
    });

    </script>

    <script>
    function terimainputCombox(){
           var x=document.forms['frmPenjualan']['supplier'].value;
           var convert, input = document.getElementById("supplier");
           /*convert = input.outerHTML;
           convert = input.value = x;*/
           var output = document.getElementById("kd_supplier");
           //var select, kode = document.getElementById("kd");;

           <?php
           foreach ($dataSupplier as $supplier) {
             $cekSupplier = $supplier->Kode;
             ?>
             //select = kode.value = x;
             if(x == <?php echo $cekSupplier; ?>) {
               $.ajax({
               url: "<?php echo site_url('Penjualan/setNamaSupplier');?>",
               type: 'POST',
               data: {
                 "kode": <?php echo $cekSupplier; ?>},
                success: function(data) {
                //$("div#ack").html(data);
                }
               });
               output.value = 'Yes';
             }
             else {
               output.value = x;
             }
             <?php
           }
           ?>
}
    </script>

    <script>
    function terimainputCombox(){
           var input=document.forms['frmPenjualan']['supplier'].value;
           var outputKode = document.getElementById("kd_supplier");
           var outputAlamat = document.getElementById("alamat");
           outputKode.value = input;

               /*$.ajax({
               url: "<?php echo site_url('Penjualan/setNamaSupplier');?>",
               type: 'POST',
               data: {
                 "kode": $("#kd_supplier").val()},
                success: function(data) {
                //$("div#ack").html(data);
                }
              });*/

               <?php
               $kodeTemp = $this->M_stock->getKode($namaBarang);
              $kodeArray['Kode'] = $kodeTemp[0]->kode;
              $kode = $kodeArray['Kode'];
               ?>

          outputAlamat.value = '<?php echo $simple; ?>';

}
    </script>


    <script>
    function terimainput(){
          var i, j, k;
          var loopingNo = document.getElementById("no");

          $.ajax({
          url: "<?php echo site_url('Penjualan/prosesTambah');?>",
          type: 'POST',
          data: {
            "kode_jual": $("#kode_jual").val(), "nama_barang": $("#nama_barang").val(), "qty": $("#qty").val(),
          "satuan": $("#satuan").val(), "harga": $("#harga").val(), "disc_1": $("#disc_1").val(),
          "disc_2": $("#disc_2").val(), "disc_3": $("#disc_3").val(), "jumlah": $("#jumlah").val(), "bns": $("#bns").val(),
          "gudang": $("#gudang").val()},
           success: function(data) {
           $("div#ack").html(data);
           }
          });


          <?php
            $no = 1;
            foreach ($dataTemp as $temp) {
              ?>

              var nO='<?php echo $no; ?>'
              var kodeJual='<?php echo $temp->Kode; ?>'
              var namaBarang='<?php echo $temp->Nama; ?>'
              var qTy='<?php echo $temp->Qty; ?>'
              var sAtuan='<?php echo $temp->Sat; ?>'
              var hArga='<?php echo $temp->Harga; ?>'
              var dIsc1='<?php echo $temp->Disc1; ?>'
              var dIsc2='<?php echo $temp->Disc2; ?>'
              var dIsc3='<?php echo $temp->Disc3; ?>'
              var jUmlah='<?php echo $temp->Jumlah; ?>'
              var bNs='<?php echo $temp->Bns; ?>'
              var gUdang='<?php echo $temp->Gdg; ?>'

              <?php
              $no++;
              }
              ?>

           var tabel = document.getElementById("tabelinput");
           var row = tabel.insertRow(1);
           var cell0 = row.insertCell(0);
           var cell1 = row.insertCell(1);
           var cell2 = row.insertCell(2);
           var cell3 = row.insertCell(3);
           var cell4 = row.insertCell(4);
           var cell5 = row.insertCell(5);
           var cell6 = row.insertCell(6);
           var cell7 = row.insertCell(7);
           var cell8 = row.insertCell(8);
           var cell9 = row.insertCell(9);
           var cell10 = row.insertCell(10);
           var cell11 = row.insertCell(11);

           cell0.innerHTML = nO;
           cell1.innerHTML = kodeJual;
           cell2.innerHTML = namaBarang;
           cell3.innerHTML = qTy;
           cell4.innerHTML = sAtuan;
           cell5.innerHTML = hArga;
           cell6.innerHTML = dIsc1;
           cell7.innerHTML = dIsc2;
           cell8.innerHTML = dIsc3;
           cell9.innerHTML = jUmlah;
           cell10.innerHTML = bNs;
           cell11.innerHTML = gUdang;

           j=Number(document.forms['inputTabel']['no'].value)+1;
           //window.alert(j);
           for(i=1; i<=j; i++) {
             loopingNo.value = i;
           }


    }
    </script>

    <script>
    function terimainputCombox(){
           var input=document.forms['frmPenjualan']['supplier'].value;
           var outputKode = document.getElementById("kd_supplier");
           var outputAlamat = document.getElementById("alamat");
           var alamatTemp = input.slice(4);
           outputAlamat.value = alamatTemp;
           var kodeTemp = input.substring(0,3);
           outputKode.value = kodeTemp;
}
    </script>
