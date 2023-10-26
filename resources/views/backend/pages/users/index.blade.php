@extends('backend.layouts.master')


@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">المستخدمين</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th>أسم المستخدم</th>
                            <th>البريد الألكترونى</th>
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
