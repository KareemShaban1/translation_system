@extends('backend.layouts.master')


@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">صرف نقدية</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    @if ($cash->recipient == 'client')
                                        عميل
                                    @elseif ($cash->recipient == 'service_provider')
                                        مقدم خدمة
                                    @elseif ($cash->recipient == 'user')
                                        مستخدم
                                    @endif
                                </td>

                                <td>
                                    @if ($cash->recipient == 'client')
                                        {{ $cash->client->name }}
                                    @elseif ($cash->recipient == 'service_provider')
                                        {{ $cash->service_provider->name }}
                                    @elseif ($cash->recipient == 'user')
                                        {{ $cash->user->name }}
                                    @endif
                                </td>

                                {{-- <td>{{ $cash->paid_amount }}</td> --}}
                                <td>
                                    <a href="{{ route('cash_out.edit', $cash->id) }}" class="btn btn-warning">تعديل</a>
                                    <form action="{{ route('cash_out.delete', $cash->id) }}" method="post"
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
