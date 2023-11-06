@extends('backend.layouts.master')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
    <style>
        #custom_table th,
        #custom_table td {
            text-align: center;
        }
    </style>
@endpush


@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">أستلام نقدية</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <div class="row" style="margin: 10px">
                    <div class="col-md-4">
                        <label for="">من :</label>
                        <input type="text" id="min" name="min">
                    </div>

                    <div class="col-md-4">
                        <label for="">إلى :</label>
                        <input type="text" id="max" name="max">
                    </div>

                    <div class="col-md-4">
                        <button id="clearDateRange" class="btn btn-secondary">Clear</button>
                    </div>

                </div>
                {{-- 
                <table class="table table-bordered" id="custom_table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> رقم الإيصال </th>
                            <th>التاريخ </th>
                            <th>أسم المستخدم </th>
                            <th>أسم العميل </th>
                            <th>أسم الخدمة </th>
                            <th> المبلغ </th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receiveCash as $cash)
                            <tr>
                                <td>{{ $cash->id }}</td>
                                <td>{{ $cash->receipt_number }}</td>
                                <td>{{ $cash->date }}</td>
                                <td>{{ $cash->user->name }}</td>
                                <td>{{ $cash->client->name }}</td>
                                <td>{{ $cash->service->name }}</td>
                                <td>{{ $cash->paid_amount }}</td>
                                <td>
                                    <a href="{{ route('receive_cash.edit', $cash->id) }}" class="btn btn-warning">تعديل</a>
                                    <form action="{{ route('receive_cash.delete', $cash->id) }}" method="post"
                                        style="display:inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger">
                                            حذف
                                        </button>
                                    </form>
                                    <a href="{{ route('receive_cash.pdfReport', $cash->id) }}" class="btn btn-primary">
                                        طباعة
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    <tfoot>
                        <tr>
                            <td colspan="8" style="text-align: center"><b> الاجمالى : <span
                                        id="totalAmount">{{ number_format($receiveCash->sum('paid_amount'), 2) }}</span></b>
                            </td>
                        </tr>
                    </tfoot>
                    </tbody>
                </table> --}}


                <table class="table table-bordered" id="custom_table" width="100%" cellspacing="0">
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
                                <td>{{ $today_reminder->receiveCash->client->name }}</td>
                                <td>{{ $today_reminder->receiveCash->service_price }}</td>
                                <td>{{ $today_reminder->paid_amount }}</td>
                                <td>{{ $today_reminder->remaining_amount }}</td>
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
                            {{ $receiveCash->sum('paid_amount') + $today_reminder->sum('paid_amount') }}
                            جنية
                        </td>

                    </tfoot>
                </table>


            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>


    <script>
        $(document).ready(function() {
            let minDate, maxDate;


            // Function to update the total amount
            function updateTotalAmount() {
                const totalAmount = datatable
                    .column(5, {
                        search: 'applied'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return a + parseFloat(b);
                    }, 0);

                $('#totalAmount').text(totalAmount.toFixed(2));
            }

            // Initialize DataTable with your custom options
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

            // Custom filtering function for the date range
            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                let min = minDate.val();
                let max = maxDate.val();
                let date = new Date(data[2]); // Use the correct column index for the date field

                if (
                    (min === '' && max === '') ||
                    (min === '' && date <= max) ||
                    (min <= date && max === '') ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            });

            // Create date inputs
            minDate = new DateTime('#min', {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime('#max', {
                format: 'MMMM Do YYYY'
            });

            // Add event listeners to re-draw the table when date inputs change
            $('#min, #max').on('change', function() {
                datatable.draw();
            });

            datatable.on('search', function() {
                updateTotalAmount();
            });

            // Add an event listener to clear the date range when the "Clear" button is clicked
            $('#clearDateRange').on('click', function() {
                // Clear the "min" and "max" input fields
                $('#min').val('');
                $('#max').val('');
                datatable.draw();
                location.reload();

                // Destroy the existing DataTable instance and initialize it again
                //       if (datatable) {
                //           datatable.destroy();
                //           initializeDataTable();
                //       }

            });
        });
    </script>
@endpush
