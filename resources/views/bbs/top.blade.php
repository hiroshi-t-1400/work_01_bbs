@extends('layouts.app')

@section('title', 'メインページ')

@section('content')

    <h1 class="page-title">
        簡易掲示板
    </h1>

    {{-- todo:投稿の表示
    foreachで投稿を取得して表示していく。
    CSSで昇順降順を操作するか？ --}}

    {{-- 動作テスト用 --}}
    @if (Session::has('success'))
        <p style="color:red; font-weight:bolder">
            {{ session('success') }}
        </p>
    @endif

    {{-- <a href={{ route('jump', ['#posts-erea']) }}>投稿エリアへジャンプ</a> --}}
    {{-- <a href={{ route('jump') }}#posts-erea>投稿エリアへジャンプ</a> --}}

    {{-- 書き込み表示エリア --}}

    {{-- $postsは書き込み一覧モデルクラス、
    ページ下部に　a href={{ view }}としていたためエラーが起きていた --}}
    @foreach ($posts as $post)
        <div class="post-wrapper">
            {{-- ID,名前,投稿日時 --}}
            <div class="posts-info">
                {{-- isoFormat --}}
                No.{{ sprintf('%04d', $post->id) }} {{ $post->name }} {{ $post->updated_at->isoFormat('YYYY/MM/DD (ddd) HH:mm:ss') }}
            </div>
            {{-- 本文 --}}
            <div class="posts-body" style="white-space:pre-wrap;">{{ $post->body }}</div>

            {{-- 投稿ごとの編集、削除ボタン、post_idに投稿番号を渡す --}}
            <form action="?" method="get" class="post-btn-form">
                <button type="submit" class="post-edit-btn" formaction="{{ route('edit.edit', ['post_id' => $post->id]) }}">編集</button>
                <button type="submit" class="post-edit-btn" formaction="{{ route('edit.delete', ['post_id' => $post->id]) }}">削除</button>
            </form>
        </div>
    {{-- @php endforeach @endphp --}}
    @endforeach

    @section('posts')
        @parent

    @endsection

    {{-- 投稿の削除をするとき、モーダルを表示する --}}
    @section('destroy')
            @parent
    @endsection

    {{-- 投稿の編集をするとき、モーダルを表示する --}}
    @section('edit')
        @parent
    @endsection

@endsection
