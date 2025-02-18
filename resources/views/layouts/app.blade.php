<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- タイトル 呼び出し先から受け取って表示 --}}
    <title>@yield('title') -簡易掲示板-</title>

    <link rel="stylesheet" href="{{ url('css\style.css') }}">

</head>
<body>


    @yield('content')

    {{--  --}}
    @if (Session::has('post_edit'))

        @include('bbs.post-edit')
    @else
        @include('bbs.posts-erea')
    @endif

    @if ( Session::has('post_destroy') )
        @php Session::forget('post_destroy'); @endphp

        @include('bbs.post-destroy')
    @endif




</body>
</html>
