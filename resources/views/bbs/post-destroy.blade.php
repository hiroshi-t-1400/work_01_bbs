@section('destroy')

    {{-- session()は連想配列であるので　->　アロー演算子ではなく　['key']　で参照する
     簡便のため$postへsession('post')を格納する --}}
        @php $post = session('post') @endphp
            <div style="position: fixed; top: 20%; left: 20%; transform: translate(-20%, -20%); background: white; padding: 20px; border: 1px solid black;">
                <p>この投稿を削除しますか？</p>
                <p>「{{ $post['post_body'] }}」</p>

                <form action="{{ route('confirm-destroy', ['post_id' => $post['post_id']]) }}" method="DELETE" class="destory-btn">
                    @csrf
                    @method('DELETE')
                    {{-- <input type="hidden" name="post_id" value="{{ $post['post_id'] }}"> --}}
                        <button type="submit" class="post-edit-btn-">削除</button>
                </form>

                <a href="{{ route('top') }}">キャンセル</a>
            </div>

@show
