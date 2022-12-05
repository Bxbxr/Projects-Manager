


@extends('layouts.app')
@section('title','تعديل المشروع')
@section('content')

    <div class="row justify-content-center text-right">
        <div class="col-10">
            <div class="card p-4">
                <h3 class="text-center pb-5 font-weight-bold">
                    تعديل المشروع 
                </h3>
                <form action="/projects/{{ $project->id }}" method="POST" dir="rtl">
                    @method('PATCH')
                    @csrf
                    @include('projects.form')
                    <div class="form-group d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary mr-1">تعديل</button>
                        <a href="/projects" class="btn btn-danger ">إلغا</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
