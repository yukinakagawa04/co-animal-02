<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      <!--タイトル-->
      <p class="mb-2 uppercase font-bold text-lg text-gray-800 text-center" id="title_content">{{$content->title_content}}</p>
    </h2>
  </x-slot>

  <div class=>
    
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white d overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white  border-b border-gray-200 ">
          <div class="mb-6">
            <div class="flex flex-col mb-4">
                <!--画像-->
                    <div class="flex justify-center items-center w-64 h-64 overflow-hidden mx-auto rounded-lg">
                      <img src="{{ asset('storage/contents/images/'.$content->image_content)}}" class="object-cover object-top w-full h-full" alt="image">
                    </div>
                <!--音声ファイル-->
                  <br>
                    <audio controls src="{{ asset('storage/contents/audios/'.$content->audio)}}" class="mx-auto"></audio>
                <!--タイトル-->
                
            </div>
            <!-- favorite 状態で条件分岐 -->
                      @if($content->users()->where('user_id', Auth::id())->exists())
                      <!-- unfavorite ボタン -->
                      <form action="{{ route('unfavorites',$content) }}" method="POST" class="text-left">
                        @csrf
                        <x-primary-button class="ml-3">
                          <svg class="h-6 w-6 text-red-500" fill="red" viewBox="0 0 24 24" stroke="red">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                          </svg>
                          {{ $content->users()->count() }}
                        </x-primary-button>
                      </form>
                      @else
                      <!-- favorite ボタン -->
                      <form action="{{ route('favorites',$content) }}" method="POST" class="text-left">
                        @csrf
                        <x-primary-button class="ml-3">
                          <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="gray">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                          </svg>
                          {{ $content->users()->count() }}
                        </x-primary-button>
                      </form>
                      @endif
                      <!--シェアボタン-->
                      <div class="container">
                          <br>
                          <div class="mx-auto">
                              <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
                              <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                          </div>
                      </div>
                      
                      <br>
                      
                      <!--コメント一覧に遷移する-->
                        <x-secondary-button class="ml-3">
                          <a href="{{ route('comment') }}"><p class="mx-auto text-base">コメントをみる</p></a>
                        </x-secondary-button>
                       
                      
                     
                      <!--コメント入力-->
                      <div class="p-6 bg-white  border-b border-gray-200 ">
                        <form class="mb-6" action={{route('comment.store', auth() ->user()->id, $content)}} method="POST" class="mt-8">
                            @csrf
                            <div class="mb-4">
                              <input type="hidden" name="content_id" value="{{ $content->id }}">
                              <x-input-label for="comment" :value="__('コメント')" />
                                <x-text-input id="comment" class="block mt-1 w-full" type="text" name="comment" :value="old('comment')" required autofocus />
                                <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-3">
                                  {{ __('投稿する') }}
                                </x-primary-button>
                            </div>
                        </form>
                      </div>
            
          

            </div>
            <a href="{{ route('content.index') }}">
              <x-secondary-button class="ml-3">
                {{ __('戻る') }}
              </x-secondary-button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>