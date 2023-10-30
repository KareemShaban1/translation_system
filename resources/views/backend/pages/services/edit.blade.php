@extends('backend.layouts.master')


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">الخدمات</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('services.update', $service->id) }}" autocomplete="off">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">أسم الخدمة</label>
                        <input type="text" class="form-control" name="name" value="{{ $service->name }}"
                            id="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group col-md-6">
                        <label for="price"> السعر</label>
                        <input type="number" class="form-control" id="price" value="{{ $service->price }}"
                            name="price">
                        @error('price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                </div>

                <div class="row">
                    <div class="col-md 12">
                        <div class="form-group">
                            <label for="description">الوصف</label>
                            <textarea class="form-control" id="description" name="description" rows="3">
                              {{ $service->description }}
                    </textarea>
                        </div>
                    </div>
                </div>



                <button type="submit" class="btn btn-primary">تأكيد</button>
            </form>
        </div>
    </div>
@endsection
