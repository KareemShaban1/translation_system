// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    stateSave: true,
oLanguage: {
  sSearch:'البحث',
  // sInfo: "Got a total of _TOTAL_ entries to show (_START_ to _END_)",
  sInfo: "Got a total of _TOTAL_ entries to show (_START_ to _END_)",


                        sZeroRecords: 'لا يوجد سجل متتطابق',
                        sEmptyTable: 'لا يوجد بيانات في الجدول',
                        oPaginate: {
                            sFirst: "First",
                            sLast: "الأخير",
                            sNext: "التالى",
                            sPrevious: "السابق"
                        },
                    },
  });
});
