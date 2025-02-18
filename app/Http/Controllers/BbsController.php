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


        // Bbsオブジェクトを宣言
        $post = new Bbs();
        // validatorオブジェクトからsafe()メソッドを通して値を取得する
        $post->name = $validator->safe()->name;
        $post->body = $validator->safe()->body;

        // バリデーション済みのデータの取得(全て取得する場合)
        // $validated = $validator->validated();
        // 編集ボタンで呼び出された場合、データベースを更新する
        if ( isset($request->edited) ) {
            $epost = Bbs::find($request->edit_id);
            // dd($validator->safe()->body);
            $epost->update([
                'name' => $validator->safe()->name,
                'body' => $validator->safe()->body,
            ]);
        } else {

            // 更新でなければ新規投稿する
            $post->save();
        }

        return redirect()->route('top')->with('success', '書き込み完了');
    }

    /**
     * 投稿を編集状態を呼び出す
     *
     *
     * @param [type] $post_id
     * @return url|Bbs class
     */
    public function editEdit($post_id)
    {
        $editPost = new Bbs();
        $editPost = $editPost->find($post_id);
        // すなおにファサード使って
        // $editPost = Bbs::find() とする方が簡潔か

        $posts = Bbs::all();

        session()->flash('post_edit', 'ok');

        // return view('/bbs.top', compact('editPost'));
        // return redirect()->route('top')->with(compact('editPost'));
        return view('/bbs.top', compact('editPost','posts'));
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

    public function testCon() {
        dd($editPost);
    }


}
