@extends('backend2.layouts.master')

@push('css')
    <style>
        fieldset {
            border: 2px groove;

        }

        .ui-autocomplete {
            z-index: 1050;
            width: 220px;
            list-style: none
        }

        .client-suggestion {
            display: flex;
            /* Use flexbox to arrange image and name in a row */
            flex-direction: row;
            /* Ensure a horizontal layout */
            align-items: center;
            /* Vertically center items within the suggestion container */
            padding: 5px;
            /* Add padding for spacing */
            border-bottom: 1px solid #ccc;
            /* Add a border between suggestions */
            /* z-index: 999; */
            background-color: rgb(111, 111, 111);
            color: white;
        }

        .client-name {
            color: rgb(255, 255, 255)
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
                        <select class="custom-select mr-sm-2" id="service_id" name="service_id">
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
                            <select class="custom-select mr-sm-2" id="from_lang_id" name="from_lang_id">
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
                            <select class="custom-select mr-sm-2" id="to_lang_id" name="to_lang_id">
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
                            العميل
                        </label>
                        {{-- <select class="custom-select mr-sm-2" id="client_id" name="client_id">
                            <option value="" readonly>أختار من العملاء</option>

                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select> --}}
                        <div class="search-input">
                            <input type="text" name="search" id="search" class="form-control" placeholder="بحث">
                            <input type="text" name="client_id" id="client_id" hidden>
                        </div>
                        @error('client_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6" style="margin-top: 15px">
                        <label for="service_provider_id">
                            {{-- مقدم الخدمة --}}
                        </label>
                        <select class="custom-select mr-sm-2" id="service_provider_id" name="service_provider_id">
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

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $.noConflict();
        jQuery(document).ready(function($) {

            $("#search").autocomplete({
                source: function(request, response) {
                    // Send an AJAX request to fetch matching product data
                    $.ajax({
                        url: "{{ route('clients.autocomplete') }}", // Replace with the actual route
                        dataType: "json",
                        data: {
                            term: request.term,
                        },
                        success: function(data) {
                            console.log(data);
                            var mappedData = $.map(data, function(item) {
                                // Create a custom HTML element for each suggestion
                                var suggestionHtml =
                                    '<div class="client-suggestion">' +
                                    '<div class="client-name">' + item.name +
                                    '</div>' +
                                    '</div>';
                                // console.log(suggestionHtml);
                                return {
                                    label: item
                                        .name, // Displayed in the autocomplete dropdown
                                    value: item
                                        .id, // Value placed in the input field when selected
                                    html: suggestionHtml, // Custom HTML for the suggestion
                                };
                            });
                            console.log(mappedData);
                            // Display autocomplete suggestions with custom HTML
                            response(mappedData);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("AJAX Error:", textStatus, errorThrown);
                            // Handle the error here, e.g., display an error message
                            response(
                                []
                            ); // Return an empty array to prevent autocomplete dropdown
                        },

                    });
                },
                minLength: 1,
                position: {
                    my: "right+15 top",
                    at: "right bottom",
                },
                width: 100, // Adjust the width as needed
                autoFill: true,
                select: function(event, ui) {
                    $("#client_id").val(ui.item.value);
                    $("#search").val(ui.item.label);
                    return false;
                }

            }).data("ui-autocomplete")._renderItem = function(ul, item) {
                // Append the custom HTML to the autocomplete dropdown
                return $("<li>")
                    .append(item.html)
                    .appendTo(ul);
            };
        })
    </script>
@endpush
