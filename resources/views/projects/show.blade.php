


@extends('layouts.app')
@section('content')
<header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
    <div class="h6 text-dark">
        <a href="/projects">المشاريع /{{ $project->title }}</a>

    </div>
    <div>
        <a href="/projects/{{ $project->id }}/edit" class="btn btn-primary px-4" role="button">تعديل المشروع</a>
    </div>
</header>

<section>
    <div class="row text-right" dir="rtl">
        <div class="col-lg-4">
            {{-- Project details --}}
            <div class="card text-right">
                <div class="card-body">
                    <div class="status"  dir="rtl">
                        @switch($project->status)
                            @case(1)
                                <span class="text-success">مكتمل</span>
                            @break
                            @case(2)
                                <span class="text-danger">ملغي</span>
                            @break
                            @default
                                <span class="text-warning">قيد الانجاز</span>                                           
                        @endswitch
                        <h5 class="font-weight-bold card-title " >
                            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                        </h5>

                        <div class="card-text mt-4">
                            {{ $project->description }}
                        </div>
                    </div>
                </div>
                @include('projects.footer')
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="font-weight-bold">غيير حالة المشروع</h5>
                    <form action="/projects/{{$project->id}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="form-select custom-select" onchange="this.form.submit()">
                            <option value="0" {{( $project->status == 0) ? 'selected' : ""}}>قيد الإنجاز</option>
                            <option value="1" {{( $project->status == 1) ? 'selected' : ""}}>مكتمل</option>
                            <option value="2" {{( $project->status == 2) ? 'selected' : ""}}>ملغي</option>
                        </select>
                    </form>

                </div>

            </div>
                <div class="d-flex justify-content-center">
                    <a href="/projects" class="btn btn-warning m-2 ">الرجوع</a>
                </div>
            </div>
        <div class="col-lg-8">
            {{-- Task --}}
            @foreach ($project->tasks as $task)
            <div class="card d-flex flex-row mt-2 p-3 align-items-center">
                <div class="{{$task->done ? 'checked muted' : ''}}">
                {{ $task->body }}
                </div>
                <div class="mr-auto">
                    <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST" class="d-flex">
                        @csrf
                        <input type="checkbox" name="done" class="form-control ml-4 m-1" {{$task->done ? 'checked' : ''}} onchange="this.form.submit()">
                        @method('PATCH')
                    </form>
                </div>
                <div class="d-flex align-items-center">
                    <form action="/projects/{{$task->project_id}}/tasks/{{$task->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-delete mt-1" value="">
                    </form>
                </div>
            </div>
            @endforeach
            <div class="card mt-4">
                <form action="/projects/{{$project->id}}/tasks" method="POST" class="d-flex p-3">
                    @csrf
                    <input type="text" name="body" class="form-control p-2 ml-2 border-1" placeholder="اظف مهمةً جديدة">
                    <button type="submit" class="btn btn-primary">إظافة</button>
                </form>
            </div>
        </div>
        
    </div>
</section>



@endsection