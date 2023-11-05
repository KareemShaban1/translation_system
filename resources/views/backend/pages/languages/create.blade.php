@extends('backend.layouts.master')


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">اللغات </h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('languages.store') }}" autocomplete="off">
                @csrf
                <div class="form-group col-md-6">
                    <label for="name">أسم اللغة </label>
                    <input type="text" class="form-control" name="name" id="name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>


                <button type="submit" class="btn btn-primary">تأكيد</button>
            </form>
        </div>
    </div>
@endsection
