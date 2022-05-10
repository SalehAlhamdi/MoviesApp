@extends('admin.layouts.main')

@section('title')
    معلومات الفيلم
@endsection

@section('pageName')
    معلومات الفيلم
@endsection

@section('content')

     <div class="row">

             <div class=" card shadow  mb-4">
                 <div class="card-header bg-dark py-3">
                     <h6 class="m-0 font-weight-bold text-primary text-light text-center">{{$movie->title}}</h6>
                 </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-6">

                             <div class="card shadow mb-4">
                                 <div class="card-header py-3">
                                     <h6 class="m-0 font-weight-bold text-primary text-center">صورة الفيلم</h6>
                                 </div>
                                 <div class="card-body">
                                     <div class="text-center">
                                         <img class="img-fluid px-sm-4 mt-3 mb-4" width="400"
                                              src="{{asset('images')}}/{{$movie->imgPath}}" alt="...">
                                     </div>
                                 </div>
                             </div>

                         </div>

                         <div class="col-md-6 mx-auto">

                             <div class="card shadow mb-4">
                                 <div class="card-header py-3">
                                     <h6 class="m-0 font-weight-bold text-primary text-center">قصة الفيلم</h6>
                                 </div>
                                 <div class="card-body">
                                     <p class="text-right"> {{$movie->description}}</p>
                                 </div>
                             </div>
                             <hr>
                             <div class="card shadow mb-4">
                                 <div class="card-header py-3">
                                     <h6 class="m-0 font-weight-bold text-primary text-center">الفيلم</h6>
                                 </div>
                                 <div class="card-body">
                                     <video width="100%"  controls autoplay>
                                         <source src="{{asset('movies')}}/{{$movie->movPath}}" type="video/mp4">
                                     </video>
                                 </div>
                             </div>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
@endsection
