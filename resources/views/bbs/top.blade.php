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

    {{-- べた書きポスト１ --}}
    <div class="post-wrapper">
        {{-- ID,名前,投稿日時 --}}
        <div class="posts-info">
            No.0001 名前 太郎 2025/01/20 (水) 13:45:57
        </div>
        <div class="posts-body">
            はじめてのかきこみです！
            改行もちゃんとできてるかな？
            バリデーションのチェックもしましょう！
            TODO：データベースから書き込み内容とinfo部分も
        </div>

        {{-- 投稿ごとの編集、削除ボタン、post_idに投稿番号を渡す --}}
        <form action="?" method="get" class="post-btn-form">
            <button type="submit" class="post-edit-btn" formaction="{{ route('edit.edit', ['post_id' => 1]) }}">編集</button>
            <button type="submit" class="post-edit-btn" formaction="{{ route('edit.delete', ['post_id' => 1]) }}">削除</button>
        </form>
    </div>

    {{-- べた書きポスト２ --}}
    <div class="post-wrapper">
        {{-- ID,名前,投稿日時 --}}
        <div class="posts-info">
            No.0002 ネーム 次郎 2025/01/22 (水) 10:00:57
        </div>
        <div class="posts-body">
            TODO：データベースから書き込み内容とinfo部分も受け取って表示しようね
        </div>

        {{-- 投稿ごとの編集、削除ボタン、post_idに投稿番号を渡す --}}
        <form action="?" method="get" class="post-btn-form">
            <button type="submit" class="post-edit-btn" formaction="{{ route('edit.edit', ['post_id' => 2]) }}">編集</button>
            <button type="submit" class="post-edit-btn" formaction="{{ route('edit.delete', ['post_id' => 2]) }}">削除</button>
        </form>
    </div>

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
