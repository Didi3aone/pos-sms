<script type="text/javascript" >

function terimainputCombox1(){
           var input=document.forms['frmTarget']['salesman'].value;
           var outputKode = document.getElementById("kd_sales");
           var outputAlamat = document.getElementById("alamat");
           var hasil = input.split(","); 
           outputAlamat.value = hasil[1];
           outputKode.value = hasil[0];
}

//js target 1  
function comboTarget1(){
           var input=document.forms['inputTabel']['nama_kode_barang1'].value;
           var outputKode = document.getElementById("kode1");
           var outputBarang = document.getElementById("nama_barang1");
           
            var hasil = input.split(",");
           outputKode.value = hasil[0];
           outputBarang.value = hasil[1];
                     
}

function terimainput1(){
        var i, j;
        var loopingNo = document.getElementById("no1");

            $.ajax({
            url: "<?php echo site_url('Target1/prosesTambah_temp1');?>",
            type: 'POST',
            data: {
              "kode1": $("#kode1").val(), "nama_barang1": $("#nama_barang1").val(), "no1": $("#no1").val(),
              "kd_sales":$("#kd_sales").val()
            },
             success: function(data) {
             $("div#ack").html(data);
             }
            });

            <?php
              
              foreach ($dataTemp1 as $temp1) {
                ?>
                var no1=document.forms['inputTabel']['no1'].value;
                var kode1=document.forms['inputTabel']['kode1'].value;
                var namaBarang1=document.forms['inputTabel']['nama_barang1'].value;
                
                <?php
                
                }
                ?>

             var tabel = document.getElementById("tabelinput");
             var row = tabel.insertRow(1);
             var cell0 = row.insertCell(0);
             var cell1 = row.insertCell(1);
             var cell2 = row.insertCell(2);
             
             cell0.innerHTML = no1;
             cell1.innerHTML = kode1;
             cell2.innerHTML = namaBarang1;
             
            j=Number(document.forms['inputTabel']['no1'].value)+1;
           
            for(i=1; i<=j; i++) {
              loopingNo.value = i;
            }
            
      }

//js target2
function comboTarget2(){
           var input=document.forms['inputTabel2']['nama_kode_barang2'].value;
           var outputKode = document.getElementById("kode2");
           var outputBarang = document.getElementById("nama_barang2");
           var hasil = input.split(",");
           outputBarang.value = hasil[1];
           outputKode.value = hasil[0];
           
}

function terimainput2(){
        var i, j;
        var loopingNo = document.getElementById("no2");

            $.ajax({
            url: "<?php echo site_url('Target1/prosesTambah_temp2');?>",
            type: 'POST',
            data: {
              "kode2": $("#kode2").val(), "nama_barang2": $("#nama_barang2").val(), "no2": $("#no2").val(),
              "kd_sales":$("#kd_sales").val()},
             success: function(data) {
             $("div#ack2").html(data);
             }
            });

            <?php
             
              foreach ($dataTemp2 as $temp2) {
                ?>
                var no2=document.forms['inputTabel2']['no2'].value;
                var kode2=document.forms['inputTabel2']['kode2'].value;
                var namaBarang2=document.forms['inputTabel2']['nama_barang2'].value;
                <?php
               
                }
                ?>

             var tabel = document.getElementById("tabelinput2");
             var row = tabel.insertRow(1);
             var cell0 = row.insertCell(0);
             var cell1 = row.insertCell(1);
             var cell2 = row.insertCell(2);
             
             cell0.innerHTML = no2;
             cell1.innerHTML = kode2;
             cell2.innerHTML = namaBarang2;
             
            j=Number(document.forms['inputTabel2']['no2'].value)+1;
           
            for(i=1; i<=j; i++) {
              loopingNo.value = i;
            }
            
      }
      //js target3
function comboTarget3(){
           var input=document.forms['inputTabel3']['nama_kode_barang3'].value;
           var outputKode = document.getElementById("kode3");
           var outputBarang = document.getElementById("nama_barang3");
           var hasil = input.split(",");
           outputBarang.value = hasil[1];
           outputKode.value = hasil[0];
           
}

function terimainput3(){
        var i, j;
        var loopingNo = document.getElementById("no3");

            $.ajax({
            url: "<?php echo site_url('Target1/prosesTambah_temp3');?>",
            type: 'POST',
            data: {
              "kode3": $("#kode3").val(), "nama_barang3": $("#nama_barang3").val(), "no3": $("#no3").val(),
              "kd_sales":$("#kd_sales").val()},
             success: function(data) {
             $("div#ack3").html(data);
             }
            });

            <?php
             
              foreach ($dataTemp3 as $temp3) {
                ?>
                var no3=document.forms['inputTabel3']['no3'].value;
                var kode3=document.forms['inputTabel3']['kode3'].value;
                var namaBarang3=document.forms['inputTabel3']['nama_barang3'].value;
                <?php
                
                }
                ?>

             var tabel = document.getElementById("tabelinput3");
             var row = tabel.insertRow(1);
             var cell0 = row.insertCell(0);
             var cell1 = row.insertCell(1);
             var cell2 = row.insertCell(2);
             
             cell0.innerHTML = no3;
             cell1.innerHTML = kode3;
             cell2.innerHTML = namaBarang3;
             
            j=Number(document.forms['inputTabel3']['no3'].value)+1;
            for(i=1; i<=j; i++) {
              loopingNo.value = i;
            }
      }

      //js target4
function comboTarget4(){
           var input=document.forms['inputTabel4']['nama_kode_barang4'].value;
           var outputKode = document.getElementById("kode4");
           var outputBarang = document.getElementById("nama_barang4");
           var hasil = input.split(",");
           outputBarang.value = hasil[1];
           outputKode.value = hasil[0];
           
}

function terimainput4(){
        var i, j;
        var loopingNo = document.getElementById("no4");

            $.ajax({
            url: "<?php echo site_url('Target1/prosesTambah_temp4');?>",
            type: 'POST',
            data: {
              "kode4": $("#kode4").val(), "nama_barang4": $("#nama_barang4").val(), "no4": $("#no4").val(),
              "kd_sales":$("#kd_sales").val()},
             success: function(data) {
             $("div#ack4").html(data);
             }
            });

            <?php
              foreach ($dataTemp4 as $temp4) {
                ?>
                var no4=document.forms['inputTabel4']['no4'].value;
                var kode4=document.forms['inputTabel4']['kode4'].value;
                var namaBarang4=document.forms['inputTabel4']['nama_barang4'].value;
                <?php
                }
                ?>

             var tabel = document.getElementById("tabelinput4");
             var row = tabel.insertRow(1);
             var cell0 = row.insertCell(0);
             var cell1 = row.insertCell(1);
             var cell2 = row.insertCell(2);
             
             cell0.innerHTML = no4;
             cell1.innerHTML = kode4;
             cell2.innerHTML = namaBarang4;
             
            j=Number(document.forms['inputTabel4']['no4'].value)+1;
            for(i=1; i<=j; i++) {
              loopingNo.value = i;
            }
      }

      function prosesTambah(){
  var kd_sales = { 
      getSales: terimainputCombox1 (kd_sales) {
        return kd_sales;
    }
};  

// $.ajax({
//             url: "<?php echo site_url('Target1/prosesTambah');?>",
//             type: 'POST',
//             data: {
//               "kd_sales": $(document.forms['frmTarget']['kd_sales'].value).val(),
//               "jenis": $(document.forms['frmTarget']['jenis'].value).val(), 
//               "target'": $("#target").val(),
//               "bobot":$("#bobot").val(),
//               "target1": $("#target1").val(),
//               "satuan1": $("#satuan1").val(), 
//               "target2'": $("#target2").val(),
//               "satuan2":$("#satuan2").val(),
//               "target3": $("#target3").val(),
//               "satuan3": $("#satuan3").val(), 
//               "target4'": $("#target4").val(),
//               "satuan4":$("#satuan4").val(),
//               "bobot4": $("#bobot4").val(),
//               "targetEC": $("#targetEC").val(), 
//               "bobotEC'": $("#bobotEC").val(),
//               "targetOA":$("#targetOA").val(),
//               "bobotOA": $("#bobotOA").val(),
//               "targetAR": $("#targetAR").val(), 
//               "bobotAR'": $("#bobotAR").val()
//             },
//              success: function(data) {
//              $("div#coba").html(data);
//              }
//             });

// <?php
              
//               foreach ($dataTarget as $target) {
//                 ?>
//               var kd_sales=document.forms['frmTarget']['kd_sales'].value;
//               var jenis=document.forms['frmTarget']['jenis'].value;
//               var target=document.forms['frmTarget']['target'].value;
//               var bobot=document.forms['frmTarget']['bobot'].value;
//               var target1=document.forms['frmTarget']['target1'].value;
//               var satuan1=document.forms['frmTarget']['satuan1'].value;  
//               var target2=document.forms['frmTarget']['target2'].value; 
//               var satuan2=document.forms['frmTarget']['satuan2'].value;
//               var target3=document.forms['frmTarget']['target3'].value;
//               var satuan3=document.forms['frmTarget']['satuan3'].value; 
//               var target4=document.forms['frmTarget']['target4'].value;
//               var satuan4=document.forms['frmTarget']['satuan4'].value;
//               var bobot4=document.forms['frmTarget']['bobot4'].value;
//               var targetEC=document.forms['frmTarget']['targetEC'].value;
//               var bobotEC=document.forms['frmTarget']['bobotEC'].value;
//               var targetOA=document.forms['frmTarget']['targetOA'].value;
//               var bobotOA=document.forms['frmTarget']['bobotOA'].value ;
//               var targetAR=document.forms['frmTarget']['targetAR'].value;
//               var bobotAR=document.forms['frmTarget']['bobotAR'].value;
                
//                 <?php
                
//                 }
//                 ?>

// var tabel = document.getElementById("proses");
//              var row = tabel.insertRow(1);
//              var cell0 = row.insertCell(0);
//              var cell1 = row.insertCell(1);
//              var cell2 = row.insertCell(2);
//              var cell3 = row.insertCell(3);
//              var cell4 = row.insertCell(4);
//              var cell5 = row.insertCell(5);
//              var cell6 = row.insertCell(6);
//              var cell7 = row.insertCell(7);
//              var cell8 = row.insertCell(8);
//              var cell9 = row.insertCell(9);
//              var cell10 = row.insertCell(10);
//              var cell11 = row.insertCell(11);
//              var cell12 = row.insertCell(12);
//              var cell13 = row.insertCell(13);
//              var cell14 = row.insertCell(14);
//              var cell15 = row.insertCell(15);
//              var cell16 = row.insertCell(16);
//              var cell17 = row.insertCell(17);
//              var cell18 = row.insertCell(18);
             
//              cell0.innerHTML = kd_sales;
//              cell1.innerHTML = jenis;
//              cell2.innerHTML = target;
//              cell3.innerHTML = bobot;
//              cell4.innerHTML = target1;
//              cell5.innerHTML = satuan1;
//              cell6.innerHTML = target2;
//              cell7.innerHTML = satuan2;
//              cell8.innerHTML = target3;
//              cell9.innerHTML = satuan3;
//              cell10.innerHTML = target4;
//              cell11.innerHTML = satuan4;
//              cell12.innerHTML = bobot4;
//              cell13.innerHTML = targetEC;
//              cell14.innerHTML = bobotEC;
//              cell15.innerHTML = targetOA;
//              cell16.innerHTML = bobotOA;
//              cell17.innerHTML = targetAR;
//              cell18.innerHTML = bobotAR;

}

    