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
      <span>{{ $message}}</span>
    @enderror
    </div>
    <div class="form-row">
    <label for="b">price: </label>
    <input type="text" id="b" name='price' value="{{ $course->price }}">
    @error('price')
      <span>{{ $message}}</span>
      @enderror
    </div>
    <div class="form-row">
    <label for="d">duration: </label>
    <input type="number" id="d" name='duration' value="{{ $course->duration }}">
    @error('duration')
      <span>{{ $message}}</span>
      @enderror
    </div>
    <div class="form-row">
    <label for="e">is_published: </label>
    <input type="text" id="e" name='is_published' value="{{ $course->is_published }}">
    @error('is_published')
      <span>{{ $message}}</span>
      @enderror
    </div>
    <div class="form-row">
    <label for="f">description: </label>
    <textarea id="f" name='description' >{{ $course->description }}</textarea>
    @error('description')
      <span>{{ $message}}</span>
      @enderror
    </div>
    <button type="submit" class="submit-btn">Update</button>
  </form> 
</body>
</html>
