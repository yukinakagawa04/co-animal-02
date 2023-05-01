

<div class="max-w-xs mx-auto">
    @foreach ($contents as $content)
      <div class="border p-4 border-gray-600 border-1 rounded-lg bg-white col-md-4 col-12 my-4">
        <!--詳細の設定-->
        <a href="{{ route('content.show',$content->id) }}">
          <!--ユーザーネーム-->
          <p class="text-gray-800 mx-auto">{{ $content->admin ? $content->admin->name : '管理者不明' }}</p>
          <!--タイトル-->
          <h3 class="font-bold text-lg text-gray-dark mx-auto ">{{$content->title_content}}</h3>
          <br>
          <!--画像-->
          <div class="flex justify-center items-center w-64 h-64 overflow-hidden mx-auto rounded-lg">
            <img src="{{ asset('storage/contents/images/'.$content->image_content)}}" class="object-cover object-top w-full h-full" alt="image">
          </div>
        </a>
          <br>
          <!--音声ファイル-->
          <audio controls src="{{ asset('storage/contents/audios/'.$content->audio)}}" class="mx-auto"></audio>
        
      </div>
    @endforeach
</div>      