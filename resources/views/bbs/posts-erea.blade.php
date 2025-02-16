@section('posts')

    <h2 class="posts-erea-title" id='posts-erea'>
        投稿エリア
    </h2>

    {{-- バリデーションでエラーがあった場合は、エラーを表示してここへジャンプしてくる --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="posts-erea-wrapper">
        <form action="{{ route('top.posts') }}" method="post" class="post-form">
            @csrf
            <input type="text" name="name" id="" class="user-name" placeholder="名前(省略可)">
            <textarea name="body" id="" cols="70%" rows="5%" class="posts-body"></textarea>
            <button type="submit" class="posts-btn" >投稿する</button>
        </form>
    </div>
@show
