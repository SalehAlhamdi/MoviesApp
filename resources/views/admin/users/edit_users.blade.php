@extends('admin.layouts.main')

@section('title')
    التعديل على حسابي
@endsection

@section('pageName')
    التعديل على حسابي
@endsection

@section('content')
    <div class="row text-center justify-content-center">
        <div class="col-lg-6">
            @if(session()->has('update_user'))
                <div class="container text-center my-3">
                    <p class="btn-success btn-lg btn-icon-split ">
                <span class="icon text-white-5  0">
                    <i class="fas fa-check"></i>
                </span>
                        <span class="text">{{session()->get('update_user')}}</span>
                    </p>
                </div>
        @endif
        <!-- Custom Text Color Utilities -->
            <div class="card shadow mb-4 mt-5">
                <div class="card-header py-3 px-5 text-center">
                    <h6 class="m-0 font-weight-bold text-primary">معلومات المستخدم الحالي</h6>
                </div>

                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger text-center">الرجاء التأكيد من ملئ جميع المعلومات</div>
                    @endif

                    <form method="post" class="user" action="{{route('dashboard.edit_user',$user->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card shadow mt-4">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold text-primary"> الاسم</h6>
                            </div>
                            <input type="text" name="name" class="form-control text-center" value="{{$user->name}}" style="font-size: 20px" >
                        </div>

                        <hr class="sidebar-divider">

                        <div class="card shadow mt-4">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold text-primary"> البريد الالكتروني</h6>
                            </div>
                            <input type="email" name="email" class="form-control text-center" value="{{$user->email}}" style="font-size: 20px" >
                        </div>


                        <hr class="sidebar-divider">


                        <div class="card shadow justify-content-center">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold text-primary"> كلمة السر</h6>
                            </div>
                            <input type="password" placeholder="*******" name="password" class="form-control text-center" style="font-size: 20px">
                        </div>

                        <hr class="sidebar-divider mt-5">

                        <button type="submit" class="btn btn-primary btn-user">
                            تحديث
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
