@extends('backend.layouts.master')


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">صرف نقدية</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('cash_out.store') }}" autocomplete="off">
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

                    <div class="form-group col-md-6">
                        <label for="expense_type_id">نوع المصروف</label>
                        <select class="form-control" id="expense_type_id" name="expense_type_id">
                            <option value="" readonly>أختار من القائمة</option>
                            @foreach ($expense_type as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('expense_type_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>



                <div class="row" id="service_provider_div">
                    <div class="form-group col-md-6">
                        <label for="service_provider_id">مقدم الخدمة</label>
                        <select class="form-control" id="service_provider_id" name="service_provider_id">
                            {{-- <option value="" readonly>أختار من القائمة</option>
                            @foreach ($service_providers as $provider)
                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                            @endforeach --}}
                        </select>
                        @error('service_provider_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                </div>

                <div class="row">

                    <div class="form-group col-md-4">
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
                        <textarea class="form-control" id="description" name="description" rows="3">
                            
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
        $(document).ready(function() {
            // When the "governorate" dropdown value changes
            $('select[name="expense_type_id"]').on('change', function() {
                var expense_type_id = $(this).val(); // Get the selected governorate ID

                console.log(expense_type_id);

                // Make an AJAX request to fetch cities based on the selected governorate
                $.ajax({
                    url: '/cash_out/getProvider',
                    method: 'GET',
                    data: {
                        expense_type_id: expense_type_id
                    },
                    success: function(response) {
                        // Clear the current city options
                        $('select[name="service_provider_id"]').empty();
                        $('select[name="service_provider_id"]').append(
                            '<option disabled selected>أختار من القائمة</option>');

                        $.each(response.service_providers, function(key, service_provider) {

                            $('select[name="service_provider_id"]').append(
                                '<option value="' + service_provider
                                .id + '">' + service_provider.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
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
