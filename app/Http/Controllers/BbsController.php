<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Bbs;

class BbsController extends Controller
{
    //

    /**
     * top画面を表示
     *
     * @return void
     */
    public function top()
    {
        // return redirect()->route('bbs.top');
        $posts = Bbs::all();
        return view('bbs.top', [
            'posts' => $posts,
        ]);
    }

    /**
     * 投稿の処理
     *validatorファサードでバリデーションを行う
     *
     * @param Request $request
     * @return $errors|boolean
     */
    public function posts(Request $request)
    {
        // Validator　ファサードを使うパターン
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:20',
            'body' => 'required|max:128',
        ]);

        // バリデーションでエラーがあったら処理を止める、&errorsを渡す
        if ( $validator->fails() ) {
            return redirect()
            ->route('top', ['#posts-erea'])
            ->withErrors($validator);
        }

        // バリデーション済みのデータの取得(全て取得する場合)
        // $validated = $validator->validated();

        // Bbsオブジェクトを宣言
        $post = new Bbs();
        // validatorオブジェクトからsafe()メソッドを通して値を取得する
        $post->name = $validator->safe()->name;
        $post->body = $validator->safe()->body;
        // DBにレコードの登録
        $post->save();

        return redirect()->route('top')->with('success', '書き込み完了');
    }

    /**
     * 投稿を編集する
     * todo:投稿IDを受け取って、DBから該当の投稿のクラスを投稿エリアへ返す
     * モーダルで編集させる？
     *
     * @param [type] $post_id
     * @return url|Bbs class
     */
    public function editEdit($post_id)
    {
        $myGet = $post_id;
        return redirect()->route('top');
    }

    /**
     * 投稿削除ボタンを押した後確認画面を表示させる
     *
     * @param [type] $post_id
     * @return void
     */
    public function DeleteModal(Request $request, $post_id)
    {
        $postDestroy = Bbs::find($post_id);
        $posts = Bbs::all();

        session()->flash('post_destroy', 'ok');
        // $request->session()->reflash();

        return view('bbs.top')->with('posts', $posts)->with('postDestroy', $postDestroy);
    }

    /**
     * 投稿を１件削除する
     *
     * @param [type] $post_id
     * @return url
     */
    public function doDestroy($post_id, Request $request)
    {
        $get_id = $post_id;
        // dd($request);
        // Bbs::  Bbsモデルクラスから書き込みを削除する
        return redirect()->route('top')->with('success', '投稿を削除しました');
    }

    public function modalTest()
    {
        $testbody = 'モーダルのテストだよ、モーダル表示できてる？';
        // dd($testbody);
        return redirect('/test')->with('message', 'モーダルのコントローラーと負ったよ');
    }


}
