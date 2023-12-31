@extends('backend2.layouts.master')


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title">مقدمى الخدمات</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('service_providers.update', $serviceProvider->id) }}" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="name">أسم مقدم الخدمة </label>
                        <input type="text" class="form-control" name="name" value="{{ $serviceProvider->name }}"
                            id="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">البريد الألكترونى</label>
                        <input type="email" class="form-control" id="email" value="{{ $serviceProvider->email }}"
                            name="email">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="address">العنوان </label>
                        <input type="text" class="form-control" name="address" value="{{ $serviceProvider->address }}"
                            id="address">
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="phone"> رقم الهاتف</label>
                        <input type="phone" class="form-control" id="phone_number"
                            value="{{ $serviceProvider->phone_number }}" name="phone_number">
                        @error('phone_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="another_phone_number"> رقم هاتف أخر</label>
                        <input type="phone" class="form-control" id="another_phone_number"
                            value="{{ $serviceProvider->another_phone_number }}" name="another_phone_number">
                        @error('another_phone_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="expense_type_id">
                            {{-- نوع المصروف  --}}
                        </label>
                        <select class="custom-select mr-sm-2" id="expense_type_id" name="expense_type_id">
                            <option value="" readonly>أختار من نوع المصروف</option>
                            @foreach ($expense_types as $expense_type)
                                <option value="{{ $expense_type->id }}" @selected($serviceProvider->expense_type_id == $expense_type->id)>
                                    {{ $expense_type->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('expense_type_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">تأكيد</button>
            </form>
        </div>
    </div>
@endsection
