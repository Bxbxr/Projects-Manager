
<div class="form-group">
    <label for="title" >عنوان المشروع</label>
    <input type="text" class="form-control input-size" id="title" name="title" value="{{ $project->title }}" >
    @error('title')
        <div class="text-danger">
            <small>{{ $message }}</small>
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="description">وصف المشروع</label>
    <textarea type="text" class="form-control" id="description" name="description">{{ $project->description }}</textarea>
    @error('description')
        <div class="text-danger">
            <small>{{ $message }}</small>
        </div>
    @enderror
</div>