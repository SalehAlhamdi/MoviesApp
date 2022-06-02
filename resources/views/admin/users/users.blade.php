@extends('admin.layouts.main')
@if(Route::is('dashboard.update.user'))
@section('title')
    التعديل على حسابي
@endsection

@section('pageName')
    التعديل على حسابي
@endsection
@endif

@if(Route::is('dashboard.all.users'))
@section('title')
    الحسابات
@endsection

@section('pageName')
    الحسابات
@endsection
@endif

@section('content')
    @if(Route::is('dashboard.update.user'))
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

                        <form method="post" class="user" action="{{route('dashboard.update_user')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="card shadow mt-4">
                                <div class="card-header py-3">
                                    <h6 class="font-weight-bold text-primary"> الاسم</h6>
                                </div>
                                <input type="text" name="name" class="form-control text-center" value="{{auth()->user()->name}}" style="font-size: 20px" >
                            </div>

                            <hr class="sidebar-divider">

                            <div class="card shadow mt-4">
                                <div class="card-header py-3">
                                    <h6 class="font-weight-bold text-primary"> البريد الالكتروني</h6>
                                </div>
                                <input type="email" name="email" class="form-control text-center" value="{{auth()->user()->email}}" style="font-size: 20px" >
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


    @elseif(Route::is('dashboard.all.users'))

            <!-- Page Heading -->

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-dark py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-light  "> جميع المستخدمين</h6>
                    </div>
                    <div class="card-body">
                        @if(session()->has('deleted_user_success'))
                            <div class="container text-center my-3">
                                <p class="btn-success btn-lg btn-icon-split ">
                                <span class="icon text-white-5  0">
                                    <i class="fas fa-check"></i>
                                </span>
                                    <span class="text">{{session()->get('deleted_user_success')}}</span>
                                </p>
                            </div>

                        @elseif(session()->has('given_perm'))
                            <div class="container text-center my-3">
                                <p class="btn-success btn-lg btn-icon-split ">
                                <span class="icon text-white-5  0">
                                    <i class="fas fa-user"></i>
                                </span>
                                    <span class="text">{{session()->get('given_perm')}}</span>
                                </p>
                            </div>

                        @elseif(session()->has('remove_perm'))
                            <div class="container text-center my-3">
                                <p class="btn-danger btn-lg btn-icon-split ">
                                <span class="icon text-white-5  0">
                                    <i class="fas fa-user"></i>
                                </span>
                                    <span class="text">{{session()->get('remove_perm')}}</span>
                                </p>
                            </div>

                        @elseif(session()->has('current_user_error'))
                            <div class="container text-center my-3">
                                        <p class="btn-danger btn-lg btn-icon-split ">
                                        <span class="icon text-white-5  0">
                                        <i class="fas fa-user"></i>
                                        </span>
                                        <span class="text">{{session()->get('current_user_error')}}</span>
                                        </p>
                                </div>
                        @endif
                            @if(session()->has('created_user_success'))
                                <div class="container text-center my-3">
                                    <p class="btn-success btn-lg btn-icon-split ">
                                <span class="icon text-white-5  0">
                                    <i class="fas fa-user"></i>
                                </span>
                                        <span class="text">{{session()->get('created_user_success')}}</span>
                                    </p>
                                </div>
                            @endif
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>رقم الحساب</th>
                                    <th>اسم الحساب</th>
                                    <th>البريد الالكتروني</th>
                                    <th>تاريخ إنشاء الحساب</th>
                                    <th>الصلاحيات</th>
                                    <th>العمليات</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="text-center">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{substr($user->created_at,0,10)}}</td>
                                        <td>
                                            <div class="p-2">
                                            @if(!$user->hasPermissionTo('manage accounts'))
                                                    <a href="{{route('dashboard.give.perm',$user->id)}}" onclick="event.preventDefault();
                                                        document.getElementById('update-form-{{ $user->id }}').submit();"
                                                       class="btn btn-success btn-sm btn-icon-split mt-3">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-user-shield"></i>
                                                        </span>
                                                        <span class="text" role="button">admin إعطاء صلاحيات</span>
                                                    </a>

                                                    <form id="update-form-{{ $user->id }}" action="{{route('dashboard.give.perm',$user->id)}}"
                                                          method="POST" style="display: none;">
                                                        @csrf
                                                        @method('put')
                                                    </form>


                                                @elseif(auth()->user()->name == $user->name)

                                                    <span class="card bg-info text-white shadow" style="font-size: 18px">الحساب نشط حالياً</span>


                                                @else
                                                    <span class="card bg-info text-white shadow" style="font-size: 18px">admin لديه صلاحيات</span>
                                                    <hr>
                                                    <a href="{{route('dashboard.remove.perm',$user->id)}}" onclick="event.preventDefault();
                                                        document.getElementById('remove-form-{{ $user->id }}').submit();"
                                                       class="btn btn-danger btn-sm btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-user-shield"></i>
                                                        </span>
                                                        <span class="text" role="button">admin حذف صلاحيات</span>
                                                    </a>

                                                    <form id="remove-form-{{ $user->id }}" action="{{route('dashboard.remove.perm',$user->id)}}"
                                                          method="POST" style="display: none;">
                                                        @csrf
                                                        @method('put')
                                                    </form>
                                            @endif
                                            </div>
                                        </td>

                                        <td>
                                            @if(auth()->user()->name == $user->name)

                                                <span class="card bg-info text-white shadow mt-2" style="font-size: 18px">الحساب نشط حالياً</span>

                                            @else
                                                <a href="{{route('dashboard.edit_view.users',$user->id)}}"
                                                   class="btn btn-warning btn-sm btn-icon-split">

                                                <span class="icon text-white-50">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                                    <span class="text" role="button">تعديل الحساب</span>
                                                </a>

                                                <hr>


                                                <a href="{{route('dashboard.delete.user',$user->id)}}" onclick="event.preventDefault();
                                                    document.getElementById('delete-form-{{ $user->id }}').submit();"
                                                   class="btn btn-danger btn-sm btn-icon-split">

                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                    <span class="text" role="button">حذف الحساب</span>
                                                </a>

                                                <form id="delete-form-{{ $user->id }}" action="{{ route('dashboard.delete.user',$user->id) }}"
                                                      method="POST" style="display: none;">
                                                    @method('delete')
                                                    @csrf
                                                </form>

                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

    @endif
@endsection
