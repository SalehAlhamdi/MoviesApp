@extends('admin.layouts.main')

@section('title')
    أضافة حلقة جديد
@endsection

@section('pageName')
    أضافة حلقة جديد
@endsection


@section('content')

    @if(session()->has('success_add_ep'))
        <div class="container text-center my-3">
            <a href="" class="btn btn-success btn-lg btn-icon-split ">
                <span class="icon text-white-5  0">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">{{session()->get('success_add_ep')}}</span>
            </a>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <!-- Custom Text Color Utilities -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 px-5 text-center">
                    <h6 class="m-0 font-weight-bold text-primary">أضافة حلقة</h6>
                </div>
                <div class="card-body text-center">
                    @if($errors->any())
                        <div class="alert alert-danger text-center">الرجاء التأكيد من ملئ جميع المعلومات</div>
                    @endif

                    <form method="post" class="user" action="{{route('dashboard.add.episode')}}" enctype="multipart/form-data" >
                        @csrf


                        <div class="form-group py-3">
                            <label>أختيار المسلسل</label>
                            <select name="select_ep" id="show_name" class="form-control show_name-selector text-center">
                                @foreach($tvShows as $tvShow)
                                    <option value="{{$tvShow->id}}">

                                        {{$tvShow->title}}

                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <hr class="sidebar-divider ">

                        <div class="form-group py-3">
                            <label>أختيار موسم المسلسل</label>
                            <select name="select_season" id="show_name" class="form-control show_name-selector">
                                @if($tvShows->count()>0)
                                    @foreach($tvShows as $tvShow)
                                        <option value="{{$tvShow->id}}">

                                            {{$tvShow->title}} | {{$tvShow->season}}    الموسم

                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <hr class="sidebar-divider ">


                        <div class="form-group">
                            <input  placeholder="رقم الحلقة" type="text" width="50%" class="form-control text-center" name="ep_num">
                        </div>

                        <hr class="sidebar-divider ">


                        <div class="form-group mt-3">
                            <label for="formFileSm" class="form-label">أختيار  الحلقة</label>

                            <input class="form-control" name="ep_video" type="file">
                        </div>

                        <hr class="sidebar-divider">

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            أضافة حلقة
                        </button>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>

    $(document).ready(function() {
        $('.show_name-selector').select2();
    });
</script>
@endsection

