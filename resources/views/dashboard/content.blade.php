<div class="grid grid-cols-3 gap-4 max-w-6xl mx-auto">
  @foreach ($contents as $content)
    <div class="border p-4 w-96 border-gray-600 border-1 rounded-lg bg-white">
      <a href="{{ route('content.show',$content->id) }}">
        <p class="text-gray-800 ">{{$content->user->name}}</p>
        <h3 class="font-bold text-lg text-gray-dark ">{{$content->title_content}}</h3>
        <br>
        <div class="flex justify-center items-center w-64 h-64 overflow-hidden mx-auto rounded-lg">
          <img src="{{ asset('storage/contents/images/'.$content->image_content)}}" class="object-cover object-top w-full h-full" alt="image">
        </div>
        <br>
        <audio controls src="{{ asset('storage/contents/audios/'.$content->audio)}}" class="mx-auto"></audio>
      </a>
    </div>
  @endforeach
</div>
