@extends('backend2.layouts.master')

@push('css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

    <style>
        th {
            font-size: 0.9rem;
            text-align: right
        }
    </style>
@endpush



@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title"> أستلام نقدية اليوم</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">



                <table class="table table-hover table-sm p-0" id="custom_table">
                    <thead>
                        <tr style="text-align: center">
                            <th> Id </th>
                            <th> رقم الإيصال </th>
                            <th>تاريخ أستلام النقدية </th>
                            <th>أسم العميل </th>
                            <th> سعر الخدمة </th>
                            <th> المبلغ المدفوع </th>
                            <th> المبلغ الباقى </th>
                            <th>أضافة باقى</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php

                            $today_reminder = App\Models\ReceiveCashReminder::whereDate('receive_cash_reminder_date', Carbon\Carbon::today())
                                ->latest()
                                ->first();
                        @endphp
                        @if ($today_reminder)
                            <tr>
                                <td>{{ $today_reminder->receiveCash->id }}</td>
                                <td>باقى الطلب رقم {{ $today_reminder->receiveCash->receipt_number }} </td>
                                <td>{{ $today_reminder->receive_cash_reminder_date }}</td>
                                <td>{{ $today_reminder->receiveCash->client->name }} </td>
                                <td>{{ $today_reminder->receiveCash->service_price }} جنية</td>
                                <td>{{ $today_reminder->paid_amount }} جنية</td>
                                <td>{{ $today_reminder->remaining_amount }} جنية</td>
                                <td> - </td>
                                <td> لا توجد </td>
                            </tr>
                        @endif

                        @foreach ($receiveCash as $cash)
                            @php
                                $reminder = App\Models\ReceiveCashReminder::where('receive_cash_id', $cash->id)
                                    ->latest()
                                    ->first();
                            @endphp



                            <tr>
                                <td>{{ $cash->id }}</td>
                                <td>{{ $cash->receipt_number }}</td>
                                <td>{{ $cash->receive_date }}</td>
                                {{-- <td>{{ $cash->user->name }}</td> --}}
                                <td>{{ $cash->client->name }}</td>
                                <td>{{ $cash->service_price }} جنية</td>
                                <td>{{ $cash->paid_amount }} جنية</td>
                                <td>{{ $cash->remaining_amount }} جنية
                                    @isset($reminder)
                                        @if ($reminder->remaining_amount == 0)
                                            <div>
                                                (تم الدفع بالكامل)
                                            </div>
                                        @endif
                                    @endisset
                                </td>
                                <td>
                                    @if ($cash->remaining_amount > 0 && (isset($reminder) && $reminder->remaining_amount != 0))
                                        <a href="{{ route('receive_cash_reminder.create', $cash->id) }}"
                                            class="btn btn-success">
                                            <i class="fa-solid fa-plus"></i></a>
                                    @elseif ($cash->remaining_amount > 0 && (isset($reminder) && $reminder->remaining_amount > 0))
                                        <a href="{{ route('receive_cash_reminder.create', $cash->id) }}"
                                            class="btn btn-success">
                                            <i class="fa-solid fa-plus"></i></a>
                                    @elseif ($cash->remaining_amount > 0 && !isset($reminder))
                                        <a href="{{ route('receive_cash_reminder.create', $cash->id) }}"
                                            class="btn btn-success">
                                            <i class="fa-solid fa-plus"></i></a>
                                    @else
                                        تم الدفع
                                    @endif
                                </td>
                                <td style="padding: 5px">
                                    @can('receive-edit')
                                        <a href="{{ route('receive_cash.edit', $cash->id) }}" class="btn btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    @endcan

                                    @can('receive-delete')
                                        <form action="{{ route('receive_cash.delete', $cash->id) }}" method="post"
                                            style="display:inline">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                    <a href="{{ route('receive_cash.pdfReport', $cash->id) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-print"></i>
                                    </a>


                                    <a class="btn btn-success"
                                        href="{{ route('receive_cash_reminder.show_reminders', $cash->id) }}">
                                        <i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>

                    <tfoot>
                        <td>
                            الأجمالى
                        </td>
                        <td colspan="8" style="text-align: center" id="totalAmount">
                            {{ ($receiveCash ? $receiveCash->sum('paid_amount') : 0) +
                                ($today_reminder ? $today_reminder->sum('paid_amount') : 0) }}
                            جنية
                        </td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection



@push('scripts')
  
    <script>
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
