@extends('backend2.layouts.master')


@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title">المستخدمين</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="custom_table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th>أسم المستخدم</th>
                            <th>البريد الألكترونى</th>
                            <th>Roles</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">تعديل</a>
                                    {{-- <a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">حذف</a> --}}
                                    <form action="{{ route('users.delete', $user->id) }}" method="post"
                                        style="display:inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger">
                                            حذف
                                        </button>
                                    </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>


    <script>
        $(document).ready(function() {


            window.pdfMake.vfs = pdfMake.vfs;

            pdfMake.fonts = {

                XBRiyaz: {
                    normal: 'https://clinic.kareemsoft.online/public/backend/assets/fonts/Almarai-Regular.ttf',
                    bold: 'https://clinic.kareemsoft.online/backend/fonts/Almarai-Bold.ttf',
                    italics: 'http://127.0.0.1:8000/backend/fonts/Almarai-Regular.ttf',
                    bolditalics: 'http://127.0.0.1:8000/backend/fonts/Almarai-Regular.ttf'
                },
                Roboto: {
                    normal: 'https://clinic.kareemsoft.online/backend/assets/fonts/Almarai-Regular.ttf',
                    bold: 'Roboto-Medium.ttf',
                    italics: 'Roboto-Italic.ttf',
                    bolditalics: 'Roboto-MediumItalic.ttf'
                }

            }

            var datatable = $('#custom_table').DataTable({
                stateSave: true,
                responsive: true,
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
                            columns: [0, 1, 2]
                        },
                        title: "المستخدمين"
                    },
                    'colvis'
                ],

            });
        });
    </script>
@endpush
