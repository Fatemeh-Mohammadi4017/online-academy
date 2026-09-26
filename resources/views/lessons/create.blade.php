<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ایجاد درس</title>
    @vite('resources/css/app.css')
</head>
<body>
  <h1 class="form-title">ایجاد درس جدید</h1>
  <form action="{{route('lessons.store')}}" method="POST" class="course-form">
    @csrf
    <p class="course-name">{{$course->name}}:دوره</p>
    <input type="hidden" name="course_id" value="{{$course->id}}">
    <div class="form-row">
    <label for="l2">موضوع:</label>
    <input type="text" id="l2" name="topic">
    @error('topic')
    <span>{{$message}}</span>
    @enderror
    </div>
    <div class="form-row">
    <label for="l3">توضیحات:</label>
    <input type="text" id="l3" name="description">
    @error('description')
    <span>{{$message}}</span>
    @enderror
    </div>
    <div class="form-row">
    <label for="l4">مدت زمان:</label>
    <input type="text" id="l4" name="duration">
    @error('duration')
    <span>{{$message}}</span>
    @enderror
    </div>
    <div class="submit-row">
    <button type="submit" class="submit-btn">ایجاد درس</button>
    </div>
  </form>  
</body>
</html>