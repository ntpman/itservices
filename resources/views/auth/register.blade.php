@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="user_code" class="col-md-4 col-form-label text-md-right">{{ __('รหัสประจำตัวผู้ใช้งาน') }}</label>

                            <div class="col-md-6">
                                <input id="user_code" type="text" class="form-control @error('user_code') is-invalid @enderror" name="user_code" value="{{ old('user_code') }}" required autofocus>

                                @error('user_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ - นามสกุล') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user-role" class="col-md-4 col-form-label text-md-right">{{ __('สิทธิ์การใช้งาน') }}</label>

                            <div class="col-md-6">
                                <select style="width: 100%" id="role_id" class="form-control select2 @error('role_id') is-invalid @enderror" name="role_id" required data-placeholder="-- โปรดเลือกสิทธิ์การใช้งาน --">
                                    <option value="">-- โปรดเลือกสิทธิ์การใช้งาน --</option>
                                    @foreach ($showAllRole as $role)
                                        <option value="{{ $role->id }}" {{ (old ('role_id') == $role->id ? 'selected' : '')}}>{{ $role->role_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="agency-id" class="col-md-4 col-form-label text-md-right">{{ __('หน่วยจ้างงาน') }}</label>

                            <div class="col-md-6">
                                <select style="width: 100%" id="agency_id" class="form-control select2 @error('agency_id') is-invalid @enderror" name="agency_id" required data-placeholder="-- โปรดเลือกหน่วยจ้างงาน --">
                                    <option value="">-- โปรดเลือกหน่วยจ้างงาน --</option>
                                    @foreach ($showAllAgency as $agency)
                                        <option value="{{ $agency->id }}" {{ (old ('agency_id') == $agency->id ? 'selected' : '')}}>{{ $agency->agency_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="region-id" class="col-md-4 col-form-label text-md-right">{{ __('ภูมิภาคที่ปฏิบัติงาน') }}</label>

                            <div class="col-md-6">
                                <select style="width: 100%" id="region_id" class="form-control select2 @error('region_id') is-invalid @enderror" name="region_id" required data-placeholder="-- โปรดเลือกภูมิภาคที่ปฏิบัติงาน --">
                                    <option value="">-- โปรดเลือกภูมิภาคที่ปฏิบัติงาน --</option>
                                    @foreach ($showAllRegion as $region)
                                        <option value="{{ $region->id }}" {{ (old ('region_id') == $region->id ? 'selected' : '')}}>{{ $region->region_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/components.js') }} "></script>
@endsection
