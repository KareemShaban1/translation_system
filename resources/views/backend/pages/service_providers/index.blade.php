@extends('backend.layouts.master')


@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">مقدمى الخدمة</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
