<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('excel.export')}}">
    <table>
        <tr>
            <td>xuất excel</td>
        </tr>
        <tr>
            <td>
                <select name="status" id="">
                    <option value="1">Thành viên</option>
                    <option value="0">Hết hạn</option>
                </select>
            </td>
            <td><button>XUẤT</button></td>
        </tr>
    </table>
</form>

</body>
</html>
