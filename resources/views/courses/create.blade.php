<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
   
</head>
<body>
  <h1 class="form-title">ایجاد دوره </h1>
  <form action="{{route('courses.store')}}" method="POST" class="course-form">
    @csrf
     <div class="form-row">
    <label for="a">name: </label>
    <input type="string" id="a" name='name' value="{{old('name')}}">
    @error('name')
      <span>{{$message}}</span>
    @enderror
    </div>
    <div class="form-row">
    <label for="b">price: </label>
    <input type="number" id="b" name='price' value="{{old('name')}}">
    @error('price')
      <span>{{$message}}</span>
      @enderror
      </div>
      <div class="form-row">
        <label for="c">teacher_id: </label>
        <input type="text" id="c" name="teacher_id" value="{{$user->id}}" readonly>
      </div>
      <div class="form-row">
    <label for="d">duration: </label>
    <input type="number" id="d" name='duration' value="{{old('name')}}">
    @error('duration')
      <span>{{"$message"}}</span>
      @enderror
      </div>
    <div class="form-row">
    <label for="e">is_published: </label>
    <input type="text" id="e" name='is_published' value="{{old('name')}}">
    @error('is_published')
      <span>{{ "$message"}}</span>
      @enderror
       </div>
     <div class="form-row">
    <label for="f">description: </label>
    <textarea id="f" name='description'>{{old('name')}}</textarea>
    @error('description')
      <span>{{ "$message"}}</span>
      @enderror
     </div>
    <button type="submit" class="submit-btn">ایجاد دوره</button>
  </form> 
</body>
</html>
