<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<table>
    <tr>
        <th>id</th>
        <th>long</th>
        <th>short</th>
        <th>tags</th>
    </tr>

{{--    {{dd($list)}}--}}

    @foreach($list as $link)
    <tr>
        <td>{{$link['id']}}</td>
        <td>{{$link['long_url']}}</td>
        <td>{{$_SERVER['HTTP_HOST'].'/'.$link['short_url']}}</td>
        <td>{{$link['id']}}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
