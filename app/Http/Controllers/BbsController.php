<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return view('bbs.top');
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
        // Validator
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:20',
            'body' => 'required|max:128',
        ]);

        if ( $validator->fails() ) {
            return redirect('top')
            ->withErrors($validator);
        }

        // todo：動作確認と戻り値の設定、
        $post = new Bbs();
        $post = [
            'name' => $validated->'name',
            'body' => $validated->'body',
        ];

        $post->save();

        return ;
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
    public function DeleteModal($post_id)
    {
        $post = [
            'post_id' => $post_id,
            'post_body' => 'これは消す予定の投稿の内容だよ',
            'message' => 'デリーとしますか？',
        ];

        return redirect()->route('top')->with(compact('post'));
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
