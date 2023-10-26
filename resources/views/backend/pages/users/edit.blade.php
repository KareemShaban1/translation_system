@extends('backend.layouts.master')


@section('content')
    <form method="POST" action="{{ route('users.update', $user->id) }}" autocomplete="off">
        @csrf
        @method('PUT')
        <div class="form-group col-md-6">
            <label for="name">أسم المستخدم</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="name">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror

        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="email">البريد الألكترونى</label>
                <input type="email" class="form-control" id="email" value="{{ $user->email }}" name="email">
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
