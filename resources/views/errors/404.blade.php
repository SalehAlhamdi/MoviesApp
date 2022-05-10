@extends('admin.layouts.main')

@section('title')
    404 لم يتم العثور على الصفحة
@endsection

@section('content')
    <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">لم يتم العثور على الصفحة</p>
        <p class="text-gray-500 mb-0">...يبدو أنك وجدت خللاً في المصفوفة</p>
        <a href="{{route('dashboard.index')}}">&larr; العودة الى الواجهة الرئيسية</a>
    </div>
@endsection
