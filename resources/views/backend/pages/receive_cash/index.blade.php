@extends('backend.layouts.master')


@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">أستلام نقدية</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> رقم الإيصال </th>
                            <th>التاريخ </th>
                            <th>أسم المستخدم </th>
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
                                <td>{{ $cash->paid_amount }}</td>
                                <td>
                                    <a href="{{ route('receive_cash.edit', $cash->id) }}" class="btn btn-warning">تعديل</a>
                                    {{-- <a href="{{ route('receive_cashs.delete', $receive_cash->id) }}" class="btn btn-danger">حذف</a> --}}
                                    <form action="{{ route('receive_cash.delete', $cash->id) }}" method="post"
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
