<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="form-title">ثبت نام در دوره</h1>
    <form action="{{route('enrolments.store')}}" method="POST" class="course-form">
        @csrf
        <p class="course-name">دانش اموز:{{$student->name}}</p>
        <input type="hidden" value="{{$student->id}}" name="student_id">
        <div class="form-row">
        <label for="f1" >انتخاب دوره:</label>
        <select name="course_id" id="f2">
        @foreach ($courses as $course )
        <option value="{{$course->id}} ">{{$course->name}}</option>  
        @endforeach
        </select>
        </div>
        <div class="submit-row">
        <button type="submit" class="submit-btn">ثبت نام در دوره</button>
        </div>
    </form>
</body>
</html>