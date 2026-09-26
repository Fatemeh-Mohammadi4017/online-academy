<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="form-title">لیست درس ها</h1>
    @if(session('success'))
    <div class="success-message">
    {{session('success') }}
    </div>
    @endif
    <table>
        <tr>
            <th>دوره</td>
            <th>موضوع</td>
            <th>توضیحات</td>
            <th>مدت زمان</td>
            <th>عملیات</th>
        </tr>
        @foreach ($lessons as $lesson)
            <tr>
                <td>{{$lesson->course->name}}</td>
                <td>{{$lesson->topic}}</td>
                <td>{{$lesson->description}}</td>
                <td>{{$lesson->duration}}</td>
                <td class="actions-column">
                    <div class="actions">
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