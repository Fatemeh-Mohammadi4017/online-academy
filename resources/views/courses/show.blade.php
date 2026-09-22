<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="form-title">دوره:{{$course->name}}</h1>
    
   <a href="{{ route('lessons.create', $course->id) }}" class="create-btn">
    Create Lesson
</a>
    
   <table>
        <tr>
            <th>شناسه دوره</th>
            <th>موضوع</th>
            <th>توضیحات</th>
            <th>مدت زمان</th>
            <th>عملیات</th>
        </tr>
        @foreach ($lessons as $lesson)
         <tr>
                <td>{{$lesson->course_id}}</td>
                <td>{{$lesson->topic}}</td>
                <td>{{$lesson->description}}</td>
                <td>{{$lesson->duration}}</td>
                <td class="actions-column"><div class="actions">
                    <a href="{{route('lessons.edit',$lesson->id)}}" class="edit-btn">ویرایش</a>
                    <form action="{{route('lessons.destroy',$lesson->id)}}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">حذف</button>
                </form>
                </div>
               </td>
                
        </tr>
        @endforeach
   </table>
</body>
</html>