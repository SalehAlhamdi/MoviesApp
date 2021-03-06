@extends('admin.layouts.main')

@section('title')
تسجيل الاشتراك
@endsection

@section('pageName')
    أضافة حساب جديد
@endsection

@section('content')
    <div class="card  o-hidden border-0 shadow-lg my-5">
        <div class="card -body  p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">!أنشاء حساب جديد</h1>
                        </div>
                        <form class="user" method="post" action="{{route('register')}}">
                            @csrf
                            @if(session()->has('success_reg'))
                                <a href="#" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                    <span class="text">{{session()->get('success_reg')}}</span>
                                </a>
                            @endif
                            {{-- Name field --}}
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input id="name" placeholder="الاسم " type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Email field --}}
                            <div class="form-group">
                                <input placeholder="البريد الالكتروني" id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Password field --}}
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="password" placeholder="كلمة المرور" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                {{-- Password conform field --}}
                                <div class="col-sm-6">
                                    <input id="password-confirm" placeholder="تأكيد كلمة المرور" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                اضافة حساب جديد
                            </button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
