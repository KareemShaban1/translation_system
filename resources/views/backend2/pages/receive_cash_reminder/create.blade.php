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
            <h6 class="text-primary page-title"> باقى أستلام نقدية</h6>
        </div>
        <div class="card-body">

            @php
                $reminder = App\Models\ReceiveCashReminder::where('receive_cash_id', $receive_cash->id)
                    ->latest()
                    ->first();
                //       dd($reminder);
            @endphp
            <form method="POST" action="{{ route('receive_cash_reminder.store') }}" autocomplete="off">
                @csrf
                <div class="row">


                    <input type="hidden" name="receive_cash_id" value="{{ $receive_cash->id }}">

                    <div class="form-group col-md-6">
                        <label for="receive_cash_reminder_date">تاريخ أستلام النقدية</label>
                        <input type="date" class="form-control" id="receive_cash_reminder_date"
                            name="receive_cash_reminder_date">
                        @error('receive_cash_reminder_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="reminder"> باقى المبلغ</label>
                        <input type="number" class="form-control" name="reminder"
                            @if ($reminder != null) value="{{ $reminder->remaining_amount }}"
                              @else
                              value="{{ $receive_cash->remaining_amount }}" @endif
                            id="reminder" readonly>
                        @error('reminder')
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
        const servicePriceInput = document.getElementById('reminder');
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
