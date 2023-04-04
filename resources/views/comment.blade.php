<x-app-layout>
    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg "> 
            
                <h1 class="py-4 px-6 bg-gray-lightest dark:bg-gray-darkest font-bold uppercase text-lg text-gray-dark dark:text-gray-200 border-b border-grey-light dark:border-grey-dark">コメント一覧</h1>
                
              
        <!--コメント一覧の表示-->
            @if (isset($comments) && count($comments) > 0)
                @foreach ($comments as $comment)
                    <h3>{{ $comment->comment }}</h3>
                    <p>{{ $comment->created_at }}</p>
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