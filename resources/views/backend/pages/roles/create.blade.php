@extends('backend.layouts.master')


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Roles </h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('roles.store') }}" autocomplete="off">
                @csrf
                <div class="form-group col-md-6">
                    <label for="name">أسم ال role </label>
                    <input type="text" class="form-control" name="name" id="name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>الأذونات :</strong>
                            {{-- <select name="permission[]" class="form-control" multiple>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select> --}}
                            <div class="row">
                                @foreach ($permissions as $value)
                                    <div class="col-md-3">
                                        <input type="checkbox" name="permission[]" value="{{ $value->name }}"
                                            class="name" />
                                        <label>
                                            {{ $value->name }}
                                        </label>
                                    </div>
                                @endforeach
                                @error('permission')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">تأكيد</button>
            </form>
        </div>
    </div>
@endsection
