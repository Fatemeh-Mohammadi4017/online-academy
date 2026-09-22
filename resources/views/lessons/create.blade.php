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
    </div>
    <div class="form-row">
    <label for="l3">توضیحات:</label>
    <input type="text" id="l3" name="description">
    </div>
    <div class="form-row">
    <label for="l4">مدت زمان:</label>
    <input type="number" id="l4" name="duration">
    </div>
    <div class="submit-row">
    <button type="submit" class="submit-btn">ایجاد درس</button>
    </div>
  </form>  
</body>
</html>