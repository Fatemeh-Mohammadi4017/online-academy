<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
   <p> <a href=" {{route('enrolments.create')}}" class="create-btn">ثبت نام</a></p>
    <h1 class="form-title">دوره های : {{$student->name}}</h1>
    <table class="enrolment-table">
        <tr>
            <th>نام دوره</th>
            <th>عملیات</th>
        </tr>
        @foreach ($courses as $course )
        <tr>
            <td>{{$course->name}}</td>
            <td> 
            <form action="{{ route('enrolments.delete', [$course->id, $student->id]) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">حذف</button>
                </form>
            </td>  
        </tr>     
        @endforeach
    </table>
</body>
</html>