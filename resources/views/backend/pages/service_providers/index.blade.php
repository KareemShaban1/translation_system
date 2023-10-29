@extends('backend.layouts.master')



@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">مقدمى الخدمات</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">



                <table class="table table-bordered" id="custom_table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th>أسم مقدم الخدمة</th>
                            <th>البريد الألكترونى</th>
                            <th>رقم الهاتف</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($service_providers as $provider)
                            <tr>
                                <td>{{ $provider->id }}</td>
                                <td>{{ $provider->name }}</td>
                                <td>{{ $provider->email }}</td>
                                <td>{{ $provider->phone_number }}</td>
                                <td>
                                    <a href="{{ route('service_providers.edit', $provider->id) }}"
                                        class="btn btn-warning">تعديل</a>
                                    {{-- <a href="{{ route('services.delete', $service->id) }}" class="btn btn-danger">حذف</a> --}}
                                    <form action="{{ route('service_providers.delete', $provider->id) }}" method="post"
                                        style="display:inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger">
                                            حذف
                                        </button>
                                    </form>
                                    <a href="{{ route('service_providers.serviceProviderReceiveCash', $provider->id) }}"
                                        class="btn btn-primary">تقارير مزود الخدمة</a>
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
                        columns: [0, 1, 2, 3]
                    },
                    title: "مقدمى الخدمات"
                },

                'colvis'
            ]
        });
    </script>
@endpush
