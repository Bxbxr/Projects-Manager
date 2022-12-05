


@extends('layouts.app')
@section('title','انشأ مشروعاَ جديداَ')
@section('content')

    <div class="row justify-content-center text-right">
        <div class="col-10">
            <div class="card p-4">
                <h3 class="text-center pb-5 font-weight-bold">
                    مشروع جديد
                </h3>
                <form action="/projects" method="POST" dir="rtl">
                    @csrf
                @include('projects.form',['project'=> new App\Models\Project()])
                    <div class="form-group d-flex flex-row-reverse ">
                        <button type="submit" class="btn btn-primary mr-1">انشأ</button>
                        <a href="/projects" class="btn btn-danger ">إلغا</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
