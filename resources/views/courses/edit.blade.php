<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
  <h1 class="form-title">ویرایش دوره</h1>
  <form action="{{route('courses.update',$course->id)}}" method="POST" class="course-form">
    @CSRF
    @method('PUT')
    
    <div class="form-row">
    <label for="a">name: </label>
    <input type="text" id="a" name='name' value="{{$course->name}}">
    @error('name')
      <span>{{ "مقدار را وارد کن"}}</span>
      @enderror
    </div>
    <div class="form-row">
    <label for="b">price: </label>
    <input type="number" id="b" name='price' value="{{ $course->price }}">
    @error('price')
      <span>{{ "مقدار را وارد کن"}}</span>
      @enderror
    </div>
    <div class="form-row">
    <label for="c">teacher_id: </label>
    <input type="number" id="c" name='teacher_id' value="{{ $course->teacher_id }}">
    @error('teacher_id')
      <span>{{ "مقدار را وارد کن"}}</span>
      @enderror
    </div>
    <div class="form-row">
    <label for="d">duration: </label>
    <input type="number" id="d" name='duration' value="{{ $course->duration }}">
    @error('duration')
      <span>{{ "مقدار را وارد کن"}}</span>
      @enderror
    </div>
    <div class="form-row">
    <label for="e">is_published: </label>
    <input type="text" id="e" name='is_published' value="{{ $course->is_published }}">
    @error('is_published')
      <span>{{ "مقدار را وارد کن"}}</span>
      @enderror
    </div>
    <div class="form-row">
    <label for="f">description: </label>
    <textarea id="f" name='description' >{{ $course->description }}</textarea>
    @error('description')
      <span>{{ "مقدار را وارد کن"}}</span>
      @enderror
    </div>
    <button type="submit" class="submit-btn">Update</button>
  </form> 
</body>
</html>
