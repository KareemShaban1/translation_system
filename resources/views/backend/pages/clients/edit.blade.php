@extends('backend.layouts.master')


@section('content')
    <form method="POST" action="{{ route('clients.update', $client->id) }}" autocomplete="off">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name">أسم العميل</label>
                <input type="text" class="form-control" name="name" value="{{ $client->name }}" id="name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>

            <div class="form-group col-md-6">
                <label for="address">العنوان </label>
                <input type="text" class="form-control" name="address" value="{{ $client->address }}" id="address">
                @error('address')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="phone"> رقم الهاتف</label>
                <input type="phone" class="form-control" id="phone_number" value="{{ $client->phone_number }}"
                    name="phone_number">
                @error('phone_number')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="another_phone_number"> رقم هاتف أخر</label>
                <input type="phone" class="form-control" id="another_phone_number"
                    value="{{ $client->another_phone_number }}" name="another_phone_number">
                @error('another_phone_number')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>


        <button type="submit" class="btn btn-primary">تأكيد</button>
    </form>
@endsection
