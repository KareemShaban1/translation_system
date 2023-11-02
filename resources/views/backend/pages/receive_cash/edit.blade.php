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
                        <label for="receive_date">تاريخ أستلام النقدية</label>
                        <input type="date" class="form-control" value="{{ $receiveCash->receive_date }}" id="date"
                            name="receive_date">
                        @error('receive_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form-group col-md-6" style="margin-top: 15px">
                        <label for="service_id">
                            {{-- الخدمة --}}
                        </label>
                        <select class="form-control" id="service_id" name="service_id">

                            @foreach ($services as $service)
                                <option value="" readonly>أختار من الخدمات</option>
                                <option value="{{ $service->id }}" @selected($receiveCash->service_id == $service->id)>{{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <fieldset>
                    <legend>خاصة بخدمة الترجمة فقط</legend>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="finish_date">تاريخ تسليم الخدمة</label>
                            <input type="date" class="form-control" id="finish_date"
                                value="{{ $receiveCash->finish_date }}" name="finish_date">
                            @error('finish_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="form-group col-md-4">
                            <label for="from_lang_id">
                                من لغة
                            </label>
                            <select class="form-control" id="from_lang_id" name="from_lang_id">
                                <option value="" readonly>أختار من اللغات</option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}" @selected($receiveCash->from_lang_id == $language->id)>{{ $language->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('from_lang_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="to_lang_id">
                                إلى لغة
                            </label>
                            <select class="form-control" id="to_lang_id" name="to_lang_id">
                                <option value="" readonly>أختار من اللغات</option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}" @selected($receiveCash->to_lang_id == $language->id)>{{ $language->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('to_lang_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </fieldset>


                <div class="row">

                    <div class="form-group col-md-6" style="margin-top: 15px">
                        <label for="client_id">
                            {{-- العميل --}}
                        </label>
                        <select class="form-control" id="client_id" name="client_id">
                            @foreach ($clients as $client)
                                <option value="" readonly>أختار من العملاء</option>
                                <option value="{{ $client->id }}" @selected($receiveCash->client_id == $client->id)>{{ $client->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('client_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group col-md-6" style="margin-top: 15px">
                        <label for="service_provider_id">
                            {{-- مقدم الخدمة --}}
                        </label>
                        <select class="form-control" id="service_provider_id" name="service_provider_id">
                            @foreach ($service_providers as $provider)
                                <option value="" readonly>أختار من مقدمى الخدمات</option>

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
                        <label for="service_price"> سعر الخدمة</label>
                        <input type="number" class="form-control" value="{{ $receiveCash->service_price }}"
                            name="service_price" id="service_price">
                        @error('service_price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group col-md-4">
                        <label for="paid_amount"> المبلغ المدفوع</label>
                        <input type="text" class="form-control" name="paid_amount"
                            value="{{ $receiveCash->paid_amount }}" id="paid_amount">
                        @error('paid_amount')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="remaining_amount"> المبلغ المتبقى</label>
                        <input type="number" class="form-control" name="remaining_amount"
                            value="{{ $receiveCash->remaining_amount }}" id="remaining_amount">
                        @error('remaining_amount')
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
