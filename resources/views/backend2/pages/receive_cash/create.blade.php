@extends('backend2.layouts.master')

@push('css')
    <style>
        fieldset {
            border: 2px groove;

        }
    </style>
@endpush


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title">أستلام نقدية</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('receive_cash.store') }}" autocomplete="off">
                @csrf
                <div class="row">


                    <div class="form-group col-md-6">
                        <label for="receive_date">تاريخ أستلام النقدية</label>
                        <input type="date" class="form-control" id="receive_date" name="receive_date">
                        @error('receive_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>


                    <div class="form-group col-md-6" style="margin-top: 15px">
                        <label for="service_id">
                            {{--    الخدمة --}}
                        </label>
                        <select class="form-control" id="service_id" name="service_id">
                            <option value="" readonly>أختار من الخدمات</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
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
                            <input type="date" class="form-control" id="finish_date" name="finish_date">
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
                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
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
                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                            @error('to_lang_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>



                    </div>
                </fieldset>



                <div class="row">


                    <div class="form-group col-md-6" id="client_div" style="margin-top: 15px">
                        <label for="client_id">
                            {{-- العميل --}}
                        </label>
                        <select class="form-control" id="client_id" name="client_id">
                            <option value="" readonly>أختار من العملاء</option>

                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
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
                            <option value="" readonly>أختار من مقدمى الخدمات</option>
                            @foreach ($service_providers as $provider)
                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
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
                        <input type="number" class="form-control" name="service_price" id="service_price">
                        @error('service_price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="paid_amount"> المبلغ المدفوع</label>
                        <input type="number" class="form-control" name="paid_amount" id="paid_amount">
                        @error('paid_amount')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="remaining_amount"> المبلغ المتبقى</label>
                        <input type="number" class="form-control" name="remaining_amount" id="remaining_amount">
                        @error('remaining_amount')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="row">

                    <div class="form-group col-md-12">
                        <label for="description">الوصف</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">تأكيد</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Get references to the input fields
        const servicePriceInput = document.getElementById('service_price');
        const paidAmountInput = document.getElementById('paid_amount');
        const remainingAmountInput = document.getElementById('remaining_amount');

        // Add an event listener to servicePriceInput and paidAmountInput
        servicePriceInput.addEventListener('input', updateRemainingAmount);
        paidAmountInput.addEventListener('input', updateRemainingAmount);

        // Function to update the remaining_amount input field
        function updateRemainingAmount() {
            const servicePrice = parseFloat(servicePriceInput.value) || 0;
            const paidAmount = parseFloat(paidAmountInput.value) || 0;
            const remainingAmount = servicePrice - paidAmount;

            remainingAmountInput.value = remainingAmount;
        }
    </script>
@endpush
