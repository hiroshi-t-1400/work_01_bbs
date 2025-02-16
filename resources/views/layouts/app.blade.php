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

    @include('bbs.posts-erea')

    @if ( Session::has('post_destroy') )
        @php Session::forget('post_destroy'); @endphp

        @include('bbs.post-destroy')
    @endif

    @if (false)
        @include('bbs.post-edit')
    @endif



</body>
</html>
