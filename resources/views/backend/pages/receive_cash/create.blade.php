@extends('backend.layouts.master')


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">أستلام نقدية</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('receive_cash.store') }}" autocomplete="off">
                @csrf
                <div class="row">
                    {{-- <div class="form-group col-md-6">
                <label for="receipt_number">رقم الإيصال</label>
                <input type="text" class="form-control" name="receipt_number" id="receipt_number">
                @error('receipt_number')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}

                    <div class="form-group col-md-6">
                        <label for="date">التاريخ</label>
                        <input type="date" class="form-control" id="date" name="date">
                        @error('date')
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


                {{-- <div class="row">
            <div class="form-group col-md-4">
                <label for="recipient">نوع المستلم</label>
                <select class="form-control" id="recipient" name="recipient">
                    <option value="" readonly>أختار من القائمة</option>
                    <option value="client">عميل</option>
                    <option value="service_provider">مقدم خدمة</option>
                    <option value="user">مستخدم</option>
                </select>
                @error('recipient')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div> --}}

                <div class="row">

                    {{-- <div class="form-group col-md-4" id="user_div">
                <label for="user_id">المستخدم</label>
                <select class="form-control" id="user_id" name="user_id">
                    <option value="" readonly>أختار من القائمة</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}

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
                    <div class="form-group col-md-6">
                        <label for="paid_amount"> المبلغ المدفوع</label>
                        <input type="number" class="form-control" name="paid_amount" id="paid_amount">
                        @error('paid_amount')
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
    {{-- <script>
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
            // Hide all fields
            // userFields.style.display = 'none';
            // clientFields.style.display = 'none';
            // serviceProviderFields.style.display = 'none';

            recipientSelect.addEventListener('change', () => {
                const selectedRecipient = recipientSelect.value;

                // Hide all fields
                // userFields.style.display = 'none';
                // clientFields.style.display = 'none';
                // serviceProviderFields.style.display = 'none';

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
        </script> --}}
@endpush
