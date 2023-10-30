@extends('backend.layouts.master')


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">أستلام نقدية</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('receive_cash.update', $receiveCash->id) }}" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="receipt_number">رقم الإيصال</label>
                        <input type="text" class="form-control" name="receipt_number"
                            value="{{ $receiveCash->receipt_number }}" id="receipt_number">
                        @error('receipt_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="date">التاريخ</label>
                        <input type="date" class="form-control" value="{{ $receiveCash->date }}" id="date"
                            name="date">
                        @error('date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                </div>


                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="user_id">المستخدم</label>
                        <select class="form-control" id="user_id" name="user_id">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" @selected($receiveCash->user_id == $user->id)>{{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="client_id">العميل</label>
                        <select class="form-control" id="client_id" name="client_id">
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}" @selected($receiveCash->client_id == $client->id)>{{ $client->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('client_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group col-md-4">
                        <label for="service_provider_id">مقدم الخدمة</label>
                        <select class="form-control" id="service_provider_id" name="service_provider_id">
                            @foreach ($service_providers as $provider)
                                <option value="{{ $provider->id }}" @selected($receiveCash->service_provider_id == $provider->id)>{{ $provider->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_provider_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="service_id">الخدمة</label>
                        <select class="form-control" id="service_id" name="service_id">
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}" @selected($receiveCash->service_id == $service->id)>{{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="paid_amount"> المبلغ المدفوع</label>
                        <input type="text" class="form-control" name="paid_amount"
                            value="{{ $receiveCash->paid_amount }}" id="paid_amount">
                        @error('paid_amount')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="row">

                    <div class="form-group col-md-12">
                        <label for="description">الوصف</label>
                        <textarea class="form-control" id="description" name="description" rows="3">
                            {{ $receiveCash->description }}
                        </textarea>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">تأكيد</button>
            </form>

        </div>

    </div>
@endsection
