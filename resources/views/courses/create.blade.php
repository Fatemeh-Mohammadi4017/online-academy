<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
   
</head>
<body>
  <h1 class="form-title">ایجاد دوره جدید</h1>
  <form action="{{route('courses.store')}}" method="POST" class="course-form">
    @csrf
    <div class="form-row">
    <label for="a">name: </label>
    <input type="text" id="a" name='name'>
      @error('name')
      <span>{{ "مقدار را وارد کن"}}</span>
      @enderror
      </div>
    <div class="form-row">
    <label for="b">price: </label>
    <input type="number" id="b" name='price' >
    @error('price')
      <span>{{ "مقدار را وارد کن"}}</span>
      @enderror
      </div>
      <div class="form-row">
    <label for="c">teacher_id: </label>
     <select name="teacher_id" id="c">
      @foreach ($users as $user )
      <option value="{{ $user->id }}" >{{ $user->id}}-{{ $user->name   }}</option>
      @endforeach
     </select>
     @error('teacher_id')
      <span>{{ "مقدار را وارد کن"}}</span>
      @enderror
      </div>
      <div class="form-row">
    <label for="d">duration: </label>
    <input type="number" id="d" name='duration' >
    @error('duration')
      <span>{{ "مقدار را وارد کن"}}</span>
      @enderror
      </div>
    <div class="form-row">
    <label for="e">is_published: </label>
    <input type="text" id="e" name='is_published' >
    @error('is_published')
      <span>{{ "مقدار را وارد کن"}}</span>
      @enderror
       </div>
     <div class="form-row">
    <label for="f">description: </label>
    <textarea id="f" name='description' ></textarea>
    @error('description')
      <span>{{ "مقدار را وارد کن"}}</span>
      @enderror
     </div>
    <button type="submit" class="submit-btn">ایجاد دوره</button>
  </form> 
</body>
</html>
