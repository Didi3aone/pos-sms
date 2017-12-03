<script src="<?php echo base_url('assets/js/jquery.dataTables.min.css')?>"></script>
<script src="<?php echo base_url('assets/js/buttons.dataTables.min.css')?>"></script>
<script src="<?php echo base_url('assets/js/select.dataTables.min.css')?>"></script>
<script src="<?php echo base_url('assets/js/editor.dataTables.min.css')?>"></script>
<table id="tablenote" class="table table-striped table-bordered table-hover" cellpadding="0" cellspacing="0" border="0" width="100%">
  <thead>
    <tr>
      <th>Date</th>
      <th>User</th>
      <th>Note</th>
      <th>Application ID</th>
      <th>Application Note ID</th>
      <th>Session ID</th>
      <th>Language Code</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
<script type="text/javascript">
var NoteEditor;

$(document).ready(function() {

  NoteEditor = new $.fn.dataTable.Editor( {
    ajax: {
      create: {
        url: "/perl/applnotecreate.pl",
        type: "POST",
        dataType: "json"
      },
      remove: {
        url: "/perl/applnoteremove.pl",
        type: "POST",
        dataType: "json"
      }
    },
    table: "#tablenote",
    fields: [
      { label: "Date:", name: "updated_gmt_ts", type: "hidden" },
      { label: "User:", name: "created_user", type: "hidden" },
      { label: "Note:", name: "note_txt", type: "textarea", attr: { maxlength: 3900, placeholder: "required"} },
      { label: "Application ID:", name: "application_id", type: "hidden" },
      { label: "Application Note ID:", name: "application_note_id", type: "hidden" },
      { label: "Session ID:", name: "session_id", type: "hidden" },
      { label: "Language Code:", name: "language_cd", type: "hidden" }
    ]
  } );

  NoteEditor.on( "preSubmit", function ( e, o, action ) {
    o.data.session_id = "<TMPL_VAR NAME=APACHE_SESSION_ID>";
    o.data.language_cd = "<TMPL_VAR NAME=LANG_CD>";
    o.data.application_id = "<TMPL_VAR NAME=APPLICATION_ID>";
    if ( action !== "remove" ) {
      if ( o.data.note_txt === "" )
      {
    this.error( "note_txt", "Note cannot be blank." );
    return false;
      }
    }
  } );

  $("#tablenote").DataTable( {
    dom: "T<'clear'>rtip",
    ajax: {
      url: "/perl/applnoteload.pl?session_id=<TMPL_VAR NAME=APACHE_SESSION_ID>&language_cd=<TMPL_VAR NAME=LANG_CD>&application_id=<TMPL_VAR NAME=APPLICATION_ID>",
      type: "GET",
      dataType: "json"
    },
    columns: [
      { "data": "updated_gmt_ts" },
      { "data": "created_user" },
      { "data": "note_txt" },
      { "data": "application_id" },
      { "data": "application_note_id" },
      { "data": "session_id" },
      { "data": "language_cd" }
    ],
    columnDefs: [
      { "targets": [0], "width": "15%" },
      { "targets": [1], "width": "20%" },
      { "targets": [3], "visible": false, "searchable": false },
      { "targets": [4], "visible": false, "searchable": false },
      { "targets": [5], "visible": false, "searchable": false },
      { "targets": [6], "visible": false, "searchable": false }
    ],
    order: [[0,"desc"]],
    lengthMenu: [<TMPL_VAR NAME=ROWS_PER_PAGE>],
    lengthChange: false,
    tableTools: {
      sRowSelect: "single"
<TMPL_IF NAME=ROLE_CHANGEAPPL>
     , aButtons: [
        { sExtends: "editor_create", editor: NoteEditor },
        { sExtends: "editor_remove", editor: NoteEditor }
      ]
</TMPL_IF>
    }
  } );

} );
</script>

<script src="<?php echo base_url('assets/js/dataTables.buttons.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.editor.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.select.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery-1.12.4.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js')?>"></script>
