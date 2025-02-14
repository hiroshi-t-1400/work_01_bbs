@section('posts')

    <h2 class="posts-erea-title">
        投稿エリア
    </h2>

    <div class="posts-erea-wrapper">
        <form action="{{ route('top.posts') }}" method="post" class="post-form">
            @csrf
            <input type="text" name="name" id="" class="user-name" placeholder="名前(省略可)">
            <textarea name="body" id="" cols="70%" rows="5%" class="posts-body"></textarea>
            <button type="submit" class="posts-btn" >投稿する</button>
        </form>
    </div>
@show
