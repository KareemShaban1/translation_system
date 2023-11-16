@extends('backend2.layouts.master')


@section('content')
    <!-- row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title">تعديل مستخدم</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user->id) }}" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="form-group col-md-6">
                    <label for="name">أسم المستخدم</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="email">البريد الألكترونى</label>
                        <input type="email" class="form-control" id="email" value="{{ $user->email }}"
                            name="email">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">كلمة المرور</label>
                        <input type="password" class="form-control" name="password" id="password">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role:</strong>
                        <select name="roles[]" class="form-control" multiple>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}" {{ in_array($role, $userRole) ? 'selected' : '' }}>
                                    {{ $role }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">تأكيد</button>
            </form>
        </div>
    </div>
    </div>
@endsection
