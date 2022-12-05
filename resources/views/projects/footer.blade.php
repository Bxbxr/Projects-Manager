<div class="card-footer bg-transparent" dir="rtl" >
    <div class="d-flex">
        <div class="d-flex align-items-center">
            <img src="/images/clock.svg" alt="" >
            <div class="mr-2">
                {{ $project->created_at->diffForHumans() }}
            </div>
        </div>

        <div class="d-flex align-items center mr-4">
            <img src="/images/list-check.svg" alt="">
                <div class="mr-2">
                    {{ count($project->tasks) }}
                </div>
        </div>
        <div class="d-flex align-items-center mr-auto">
            <form action="/projects/{{ $project->id }}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" class=" btn btn-delete" value="" style="width: 50px">
            </form>
        </div>
    </div>
</div>