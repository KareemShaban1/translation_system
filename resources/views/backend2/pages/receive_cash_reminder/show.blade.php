@extends('backend2.layouts.master')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
@endpush


@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title"> سجل دفع </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">



                <table class="table table-bordered" id="custom_table" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center">
                            <th> Id </th>
                            <th> رقم الإيصال </th>
                            <th>تاريخ الدفع </th>
                            <th>أسم العميل </th>
                            <th> المبلغ المدفوع </th>
                            <th> المبلغ الباقى </th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receive_cash_reminder as $reminder)
                            <tr>
                                <td>{{ $reminder->id }}</td>
                                <td>{{ $reminder->receiveCash->receipt_number }}</td>
                                <td>{{ $reminder->receive_cash_reminder_date }}</td>
                                <td>{{ $reminder->receiveCash->client->name }}</td>
                                <td>{{ $reminder->paid_amount }} جنية</td>
                                <td>{{ $reminder->remaining_amount }} جنية

                                </td>

                                <td>
                                    <a href="{{ route('receive_cash_reminder.pdfReport', $reminder->id) }}"
                                        class="btn btn-primary">
                                        طباعة
                                    </a>
                                    {{-- @can('receive-edit')
                                        <a href="{{ route('receive_cash.edit', $cash->id) }}" class="btn btn-warning">تعديل</a>
                                    @endcan

                                    @can('receive-delete')
                                        <form action="{{ route('receive_cash.delete', $cash->id) }}" method="post"
                                            style="display:inline">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger">
                                                حذف
                                            </button>
                                        </form>
                                    @endcan
                                    <a href="{{ route('receive_cash.pdfReport', $cash->id) }}" class="btn btn-primary">
                                        طباعة
                                    </a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection



@push('scripts')
    <script>
        var datatable = $('#custom_table').DataTable({
            stateSave: true,
            oLanguage: {
                sSearch: 'البحث',
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
            sortable: true,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    },
                    title: "أستلام نقدية"
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    },
                    title: "أستلام نقدية"
                },

                'colvis'
            ]
        });
    </script>
@endpush
