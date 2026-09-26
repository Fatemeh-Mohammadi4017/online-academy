<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت کاربران</title>
   @vite(['resources/css/app.css', 'resources/css/users.css'])
</head>
<body>
     @if(session('success'))
     <div class="success-message">
        {{session('success')  }}
     </div>
    @endif
    <div class="users-container">
    <h1 >مدیریت کاربران</h1>
    <form action="{{route('users.store')}}" method="POST" class="create-user-form">
    @csrf

    <div class="form-group">
        <label for="u1">نام:</label>
        <input type="text" id="u1" name="name">
    </div>

    <div class="form-group">
        <label for="u2">ایمیل:</label>
        <input type="email" id="u2" name="email">
    </div>

    <div class="form-group">
        <label for="u3">پسورد:</label>
        <input type="password" id="u3" name="password">
    </div>

    <div class="form-group">
        <label for="u4">نقش:</label>
        <select name="role" id="u4">
            <option value="teacher">teacher</option>
            <option value="student">student</option>
        </select>
    </div>

    <button type="submit" class="btn-create">ایجاد کاربر</button>
</form>
     <table>
        <tr>
            <th>نام</th>
            <th>ایمیل</th>
            <th>نقش</th>
            <th>عملیات</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td class="actions">
                <a href="{{route('users.edit',$user->id)}}" class="btn-edit">Edit</a>
                <form action="{{route('users.destroy',$user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
     </table>
     </div>
</body>
</html>