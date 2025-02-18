@section('posts')

    <h2 class="posts-erea-title" id='posts-erea'>
        投稿を編集してください。
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
            <input type="text" name="name" id="" class="user-name" placeholder="名前(省略可)" value="{{ $editPost->name }}">
                <textarea name="body" id="" cols="70%" rows="5%" class="posts-body">{{ $editPost->body }}</textarea>
                <input type="hidden" name="edited" value="true">
                <input type="hidden" name="edit_id" value="{{ $editPost->id }}">
            <button type="submit" class="posts-btn" >投稿する</button>
        </form>
    </div>
@show
