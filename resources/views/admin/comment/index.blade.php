<x-app-layout>
    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg "> 
            
                <h1 class="py-4 px-6 bg-gray-lightest font-bold uppercase text-lg text-gray-dark border-b border-grey-light">コメント一覧</h1>
                
              
        <!--コメント一覧の表示-->
            @if (isset($comments) && count($comments) > 0)
                @foreach ($comments as $comment)
                    <!--コメントテキスト表示-->
                    <!-- ユーザー名の表示 -->
                    @if ($comment->user)
                        <h3 class="font-bold text-sm text-teal-400">{{ $comment->user->name }}</h3>
                    @elseif ($comment->admin)
                        <h3 class="font-bold text-sm text-teal-400">{{ $comment->admin->name }}</h3>
                    @endif
                    <p>{{ $comment->comment }}</p>
                    <p class="text-gray-400 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
                    @if ($comment->admin_id === Auth::guard('admin')->user()->id)
                        <div class="flex">
                            <!-- 削除ボタン -->
                            <form action="{{ route('admin.comment.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold text-sm text-gray-400 mr-2">削除</button>
                            </form>
                            <!-- 更新ボタン -->
                            <a href="{{ route('admin.comment.edit', $comment->id) }}" class="font-bold text-sm text-gray-400">更新</a>
                        </div>
                    @endif
                    <hr>
                @endforeach
            @else
                <p>コメントはありません.</p>
            @endif
         
        
        
        <!--戻るボタン-->
        <button onclick="goBack()">戻る</button>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
            
        </div>
    </div>
</x-app-layout>