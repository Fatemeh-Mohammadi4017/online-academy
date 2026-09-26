<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1>دوره های اموزشی اکادمی</h1>
    @if(session('success'))
    <div class="success-message">
    {{session('success') }}
    </div>
    @endif
    <div class="course-tools">
    <p>ایجاد دوره:<a href="{{route('courses.create')}}" class="create-btn">ایجاد</a></p>

    <form action="{{route('courses.index')}}" method="GET" class="search-form">
    <label for="s1"> جستجوی دوره:</label>
    <input type="text" id="s1" name="search">
    <button type="submit">search</button>
    </form>

    </div>
    <table>
        <tr>
            <th>name</th>
            <th>price</th>
            <th>teacher_id</th>
            <th>duration</th>
            <th>is_published</th>
            <th>description</th>
            <th class="actions-column">actions</th>
        </tr>
        @foreach($courses as $course)
        <tr>
            <td>{{$course->name}}</td>
            <td>{{$course->price}}</td>
            <td>{{$course->teacher_id}}</td>
            <td>{{$course->duration}}</td>
            <td>@if($course->is_published==1)<span class="published">منتشرشد</span>@else<span class="unpublished">منتشرنشد</span>@endif</td>
            <td>{{$course->description}}</td>
            <td class="actions-column">
                <div class="actions">
                    @can('update',$course)
             <a href="{{route('courses.edit',$course->id)}}" class="edit-btn">Edit</a>
                @endcan
                @can('view',$course)
                <a href="{{route('courses.show',$course->id)}}" class="show-btn">ShowDetails</a>
                @endcan
                @can('delete',$course)
                <form action="{{route('courses.destroy',$course->id)}}" method="POST" class="delete-form">
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="delete-btn">delete</button> 
                </form>
                @endcan
                </div>
                
            </td>
        </tr>
        @endforeach
      
    </table>
    {{$courses->links()}} 
</body>
</html>