<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>DAO MINH HA</h2>
        <p>Email kích hoạt</p>
        <p>Xin chào: <strong>{{$name['name']}}</strong></p>
        <p>Tên đăng nhập của bạn là: <strong>{{$name['email']}}</strong></p>
        <div>
            Chào mừng bạn đã đến với Dao Minh Ha.
            Đây là Email kích hoạt tài khoản. Bạn hãy bấm vào nút bên dưới để đến trang kích hoạt nhé
            {{ URL::to('register/verify/' . $name['remember_token']) }}.<br/>
        </div>
    </body>
</html>

