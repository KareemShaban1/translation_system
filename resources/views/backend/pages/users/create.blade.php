@extends('backend.layouts.master')


@section('content')
    <form method="POST" action="{{ route('users.store') }}" autocomplete="off">
        @csrf
        <div class="form-group col-md-6">
            <label for="name">أسم المستخدم</label>
            <input type="text" class="form-control" name="name" id="name">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror

        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="email">البريد الألكترونى</label>
                <input type="email" class="form-control" id="email" name="email">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
            <div class="form-group col-md-6">
                <label for="password">كلمة المرور</label>
                <input type="password" class="form-control" name="password" id="password">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
        </div>


        <button type="submit" class="btn btn-primary">تأكيد</button>
    </form>
@endsection
