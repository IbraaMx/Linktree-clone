@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Edit Your Information') }}</div>

                <div class="card-body">

                    <form action="{{ route('user.settings.update') }}" method="POST">
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{ $user->name  }}">

                                @if($errors->has('name'))
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Your Email" value="{{ old('email') ?? $user->email }}">

                                @if($errors->has('email'))
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                @endif
                            </div>



                            <div class="col-md-4 mt-3">
                                <input type="password" name="password" class="form-control" placeholder="Current Password">

                                @if($errors->has('password'))
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                @endif

                                @if (session('passwordError'))
                                    <small class="text-danger">{{ session('passwordError') }}</small>
                                @endif
                            </div>

                            <div class="col-md-4 mt-3">
                                <input type="password" name="newPassword" class="form-control" placeholder="New Password">

                                @if($errors->has('newPassword'))
                                    <small class="text-danger">{{ $errors->first('newPassword') }}</small>
                                @endif
                            </div>

                            <div class="col-md-4 mt-3">
                                <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password">

                                @if($errors->has('confirmPassword'))
                                    <small class="text-danger">{{ $errors->first('confirmPassword') }}</small>
                                @endif
                            </div>

                            <div class="col-12 mt-3">
                                @csrf
                                <button type="submit" class="btn btn-dark btn-block">Edit Your Settings</button>
                            </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
