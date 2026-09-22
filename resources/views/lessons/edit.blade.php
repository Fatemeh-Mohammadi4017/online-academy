<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
  <div class="form-header">
  <h1 class="form-title">ویرایش درس</h1>
  <p class="course-name"> دوره:{{$lesson->course->name}}</p>
   </div>
    <form action="{{route('lessons.update',$lesson->id) }}" method="POST" class="course-form">
    @method('PUT')
    @CSRF
    <input type="hidden" name="course_id" value="{{$lesson->course_id}}">
    <div class="form-row">
    <label for="l2">موضوع:</label>
    <input type="text" id="l2" name="topic" value="{{$lesson->topic}}">
    </div>
     <div class="form-row">
    <label for="l3">توضیحات:</label>
    <input type="text" id="l3" name="description" value="{{$lesson->description}}">
     </div>
     <div class="form-row">
    <label for="l4">مدت زمان:</label>
    <input type="number" id="l4" name="duration" value="{{$lesson->duration}}">
     </div>
     <div class="submit-row">
    <button type="submit" class="submit-btn">ویرایش درس</button>
</div>
  </form>  
    
</body>
</html>