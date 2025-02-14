<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    {{-- @dd($message); --}}

    <a href="{{ route('test.top') }}">てすと</a><br>
    <a href="{{ route('test.modal') }}">てすとmo-daru</a><br>
    <form action="" method="get">
        @csrf
        <button type="submit" formaction="{{ route('edit.delete', ['post_id' => 1]) }}">tesutomo</button>
    </form>


    @if ( session('message') )
    {{-- @dd($message); --}}
        <p style="color:red;">{{ session('message') }}</p>
    @endif


    @if (session('post'))
        {{-- session()は連想配列であるので　->　アロー演算子ではなく　['key']　で参照する
        簡便のため$postへsession('post')を格納する --}}
        @php $post = session('post') @endphp
            <div style="position: fixed; top: 20%; left: 50%; transform: translate(-50%, -20%); background: white; padding: 20px; border: 1px solid black;">
                <p>本当に削除しますか？</p>
                <p>{{ $post['post_body'] }}</p>
                <a href="{{ route('test') }}">キャンセル</a>
            </div>

    @endif


</body>
</html>
