<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش کاربر</title>
    @vite(['resources/css/app.css', 'resources/css/users.css'])
</head>
<body>
     <div class="users-container">
     <h1>ویرایش کاربر</h1>
     <form action="{{route('users.update',$user->id)}}" method="POST" class="edit-user-form">
        @CSRF
        @method('PUT')
        <div class="form-group">
        <label for="u1">نام:</label>
        <input type="text" id="u1" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
        <label for="u2">ایمیل:</label>
        <input type="email" id="u2" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
        <label for="u3">پسورد:</label>
        <input type="text" id="u3" name="password" >
        </div>
        <div class="form-group">
        <label for="u4">نقش:</label>
        <select name="role" id="u4">
    <option value="teacher" {{ $user->role === 'teacher' ? 'selected' : '' }}>teacher</option>
    <option value="student" {{ $user->role === 'student' ? 'selected' : '' }}>student</option>
</select>
        </div>
        <button type="submit" class="btn-create">ویرایش</button>
    </form>
    </div>
</body>
</html>