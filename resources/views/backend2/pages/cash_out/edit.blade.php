@extends('backend2.layouts.master')


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title">صرف نقدية</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('cash_out.update', $cashOut->id) }}" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="receipt_number">رقم الإيصال</label>
                        <input type="text" class="form-control" name="receipt_number"
                            value="{{ $cashOut->receipt_number }}" id="receipt_number">
                        @error('receipt_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="date">التاريخ</label>
                        <input type="date" class="form-control" id="date" value="{{ $cashOut->date }}"
                            name="date">
                        @error('date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                </div>

                <div class="row">



                    <div class="form-group col-md-4">
                        <label for="expense_type_id">نوع المصروف</label>
                        <select class="custom-select mr-sm-2" id="expense_type_id" name="expense_type_id">
                            <option value="" readonly>أختار من القائمة</option>
                            @foreach ($expense_type as $type)
                                <option value="{{ $type->id }}" @selected($cashOut->expense_type_id == $type->id)>{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('expense_type_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="recipient">نوع المستلم</label>
                        <select class="custom-select mr-sm-2" id="recipient" name="recipient">
                            <option value="" readonly>أختار من القائمة</option>
                            <option value="client" @selected($cashOut->recipient == 'client')>عميل</option>
                            <option value="service_provider" @selected($cashOut->recipient == 'service_provider')>مقدم خدمة</option>
                            <option value="user" @selected($cashOut->recipient == 'user')>مستخدم</option>
                        </select>
                        @error('recipient')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>


                <div class="row">

                    <div class="form-group col-md-4" id="user_div">
                        <label for="user_id">المستخدم</label>
                        <select class="custom-select mr-sm-2" id="user_id" name="user_id">
                            <option value="" readonly>أختار من القائمة</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" @selected($cashOut->user_id == $user->id)>{{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-4" id="client_div">
                        <label for="client_id">العميل</label>
                        <select class="custom-select mr-sm-2" id="client_id" name="client_id">
                            <option value="" readonly>أختار من القائمة</option>

                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}" @selected($cashOut->client_id == $client->id)>{{ $client->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('client_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>




                </div>

                <div class="row" id="service_provider_div">
                    <div class="form-group col-md-6">
                        <label for="service_provider_id">مقدم الخدمة</label>
                        <select class="custom-select mr-sm-2" id="service_provider_id" name="service_provider_id">
                            <option value="" readonly>أختار من القائمة</option>
                            @foreach ($service_providers as $provider)
                                <option value="{{ $provider->id }}" @selected($cashOut->service_provider_id == $provider->id)>{{ $provider->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_provider_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- <div class="form-group col-md-6">
                <label for="service_id">الخدمة</label>
                <select class="custom-select mr-sm-2" id="service_id" name="service_id">
                    <option value="" readonly>أختار من القائمة</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" @selected($cashOut->service_id == $service->id)>{{ $service->name }}</option>
                    @endforeach
                </select>
                @error('service_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}

                </div>

                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="paid_amount"> المبلغ المدفوع</label>
                        <input type="text" class="form-control" name="paid_amount" value="{{ $cashOut->paid_amount }}"
                            id="paid_amount">
                        @error('paid_amount')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="row">

                    <div class="form-group col-md-12">
                        <label for="description">الوصف</label>
                        <textarea class="form-control" id="description" name="description" rows="3">
                            {{ $cashOut->description }}
                        </textarea>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">تأكيد</button>
            </form>

        </div>
    </div>
@endsection


@push('scripts')
    <script>
        const recipientSelect = document.getElementById('recipient');
        const userFields = document.getElementById('user_id');
        const clientFields = document.getElementById('client_id');
        const serviceProviderFields = document.getElementById('service_provider_id');

        const userDiv = document.getElementById('user_div');
        const clientDiv = document.getElementById('client_div');
        const serviceProviderDiv = document.getElementById('service_provider_div');

        // Hide all fields
        userDiv.style.display = 'none';
        clientDiv.style.display = 'none';
        serviceProviderDiv.style.display = 'none';

        console.log(recipientSelect.value);
        if (recipientSelect.value === 'user') {
            userDiv.style.display = 'block';
        } else if (recipientSelect.value === 'client') {
            clientDiv.style.display = 'block';
        } else if (recipientSelect.value === 'service_provider') {
            serviceProviderDiv.style.display = 'flex';
        }


        recipientSelect.addEventListener('change', () => {
            const selectedRecipient = recipientSelect.value;



            userDiv.style.display = 'none';
            clientDiv.style.display = 'none';
            serviceProviderDiv.style.display = 'none';

            // Show fields based on the selected recipient
            if (selectedRecipient === 'user') {
                userDiv.style.display = 'block';
            } else if (selectedRecipient === 'client') {
                clientDiv.style.display = 'block';
            } else if (selectedRecipient === 'service_provider') {
                serviceProviderDiv.style.display = 'flex';
            }
        });
    </script>
@endpush
