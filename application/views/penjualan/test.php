<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>
<div class="box">
  <div class="box-header">

    <head>
      <title>Dettline</title>
      <script>
      function terimainput(){
             var x=document.forms['biodata']['nim'].value;
             var y=document.forms['biodata']['nama'].value;
             var z=document.forms['biodata']['agama'].value;


             var tabel = document.getElementById("tabelinput");
             var row = tabel.insertRow(1);
             var cell1 = row.insertCell(0);
             var cell2 = row.insertCell(1);
             var cell3 = row.insertCell(2);

             cell1.innerHTML = x;
             cell2.innerHTML = y;
             cell3.innerHTML = z;
      }
      </script>
</head>
<body>
<form name='biodata' method='post' action='tutor.html'>
<pre>
Nim     : <input type='number' name='nim'>
Nama    : <input type='text' name='nama' >
Agama   : <select name='agama'>
      <option>Islam
      </select>
</pre>
      <input type='button' onClick='terimainput()' value='Simpan'>
      <input type='reset' value='Ulangi'>

</form>

<table border='1' id='tabelinput'>
<tr>
      <td>NIM</td>
      <td>NAMA</td>
      <td>AGAMA</td>
</tr>
</table>

</body>

  </div>
  <!-- /.box-header -->

</div>
