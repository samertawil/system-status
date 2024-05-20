@extends('layouts.app')

<style>

@font-face {
        font-family: 'Droid';
        src: url(../font/Droid.Arabic.Kufi_DownloadSoftware.iR_.ttf);
    }

    body {
        font-family: 'Droid', Arial, Helvetica, sans-serif !important;
        font-size: 14px;
        font-weight: 600;
    }


</style>

@section('content')
    <div class="container" style="direction: rtl;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card  my-5">
                    <div class="card-header fw-bolder fs-5">انشاء حساب جديد</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="user_name"
                                    class="col-md-2 col-form-label text-md-end">اسم الحساب</label>

                                <div class="col-md-6">
                                    <input id="user_name" type="text"
                                        class="form-control @error('user_name') is-invalid @enderror" name="user_name"
                                        value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                                    @error('user_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="full_name"
                                    class="col-md-2 col-form-label text-md-end">الاسم</label>

                                <div class="col-md-6">
                                    <input id="full_name" type="text"
                                        class="form-control @error('full_name') is-invalid @enderror" name="full_name"
                                        value="{{ old('full_name') }}" autofocus>

                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-2 col-form-label text-md-end">عنوان البريد</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 ">
                                <label for="password"
                                    class="col-md-2 col-form-label text-md-end">كلمة المرور</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
 

                            <div class="row mb-3">
                                <label for="phone" class="col-md-2 col-form-label text-md-end">رقم الهاتف</label>
                                <div class="col-md-6">
                                    <input type="number" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}">
                                    @include('layouts._show_error', ['field_name' => 'phone'])
                                </div>

                            </div>





                            <div class=" text-start">
                                <div >
                                    <button type="submit" class="btn btn-primary">
                                       إنشاء الحساب
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
