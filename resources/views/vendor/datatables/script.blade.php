{{-- $(function(){window.{{ config('datatables-html.namespace', 'LaravelDataTables') }}=window.{{ config('datatables-html.namespace', 'LaravelDataTables') }}||{};window.{{ config('datatables-html.namespace', 'LaravelDataTables') }}["%1$s"]=$("#%1$s").DataTable(%2$s);}); --}}
$("#%1$s").DataTable(%2$s);
$(document).on("init.dt", function(e, settings) {
const api = new $.fn.dataTable.Api(settings);
const inputs = $(settings.nTable).closest(".dataTables_wrapper").find(".dataTables_filter input");
inputs.unbind();
inputs.each(function(e) {
const input = this;
$(input).closest("form").on("keyup keypress", function(e) {
const keyCode = e.keyCode || e.which;
if (keyCode == 13) {
e.preventDefault();
return false;
}
});
$(input).bind("keyup", function(e) {
if (e.keyCode == 13) {
api.search(this.value).draw();
}
});
$(input).bind("input", function(e) {
if (this.value == "") {
api.search(this.value).draw();
}
});
});
});
{{-- $.extend(true, $.fn.dataTable.defaults, {
scrollY: '55vh',
scrollX: true,
scrollCollapse: true
language: {
processing: "<i class='fas fa-spinner fa-spin'></i> Sedang memproses...",
lengthMenu: "Tampilkan _MENU_ entri",
zeroRecords: "Tidak ada data.",
info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
infoEmpty: "",
emptyTable: "Tidak ada data pada tabel ini.",
infoFiltered: "Difilter dari total _MAX_ data.",
search: "Cari:",
paginate: {
previous: "<i class='fas fa-arrow-left'></i>",
next: "<i class='fas fa-arrow-right'></i>"
}
},
});  --}}

{{-- $("#%1$s").addClass('bg-white'); --}}
$("#%1$s thead").addClass('bg-primary text-white');
$("#%1$s thead th").addClass('align-middle');

$("[data-filter-datatable='#%1$s']").change(function() {
$("#%1$s").DataTable().ajax.reload(null, false);
});
