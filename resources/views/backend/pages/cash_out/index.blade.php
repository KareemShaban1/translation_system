@extends('backend.layouts.master')


@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">صرف نقدية</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="custom_table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> رقم الإيصال </th>
                            <th>التاريخ </th>
                            <th> نوع المستلم </th>
                            <th> أسم المستلم </th>

                            {{-- <th> المبلغ </th> --}}
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cashOut as $cash)
                            <tr>
                                <td>{{ $cash->id }}</td>
                                <td>
                                    {{ $cash->receipt_number }}

                                </td>
                                <td>{{ $cash->date }}</td>
                                <td>
                                    {{ $cash->expense_type->name }}
                                </td>

                                <td>
                                    {{ $cash->service_provider->name }}
                                </td>

                                <td> @can('cashOut-edit')
                                        <a href="{{ route('cash_out.edit', $cash->id) }}" class="btn btn-warning">تعديل</a>
                                    @endcan

                                    @can('cashOut-delete')
                                        <form action="{{ route('cash_out.delete', $cash->id) }}" method="post"
                                            style="display:inline">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger">
                                                حذف
                                            </button>
                                        </form>
                                    @endcan
                                    <a href="{{ route('cash_out.pdfReport', $cash->id) }}" class="btn btn-primary">
                                        طباعة
                                    </a>
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
                // sInfo: " _TOTAL_ entries to show (_START_ to _END_)",

                sZeroRecords: 'لا يوجد سجل متتطابق',
                sEmptyTable: 'لا يوجد بيانات في الجدول',
                oPaginate: {
                    sFirst: "الأول",
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
                    title: "صرف نقدية"
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    },
                    title: "صرف نقدية"
                },


                'colvis'
            ]
        });
    </script>
@endpush
