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
