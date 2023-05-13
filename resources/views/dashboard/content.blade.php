<div class="mx-auto text-center max-w-xl">
                <div class="max-w-xs mx-auto">
                  @foreach ($contents as $content)
                    <div class="border p-4 border-gray-600 border-1 rounded-lg bg-white col-md-4 col-12 my-4">
                      <!--詳細の設定-->
                      <a href="{{ route('content.show',$content->id) }}">
                        <!--ユーザーネーム-->
                        @if ($content->admin)
                          <div class="flex items-center">
                            <img src="{{ asset('storage/admin/images/' . $content->admin->image) }}" alt="{{ $content->admin->name }}" style="border-radius: 50%; width: 50px; height: 50px;" class="mr-2">
                            <p>{{ $content->admin->name }}</p>
                          </div>
                        @endif
                        <!--タイトル-->
                        <h3 class="font-bold text-lg text-gray-dark mx-auto ">{{$content->title_content}}</h3>
                        <br>
                        <!--画像-->
                        <div class="flex justify-center items-center w-64 h-64 overflow-hidden mx-auto rounded-lg">
                          <img src="{{ asset('storage/contents/images/'.$content->image_content)}}" class="object-cover object-top w-full h-full" alt="image">
                        </div>
                        <br>
                      </a>
                        <!--音声ファイル-->
                        <audio controls src="{{ asset('storage/contents/audios/'.$content->audio)}}" class="mx-auto"></audio>
                        <!--都道府県-->
                        <p style="display: none;">{{ $content->admin ? $content->admin->prefecture : '' }}</p>
                        <div class="flex items-center justify-between">
                          <a href="{{ route('content.show',$content->id) }}">
                            <div class="flex items-center cursor-pointer">
                              <!--コメントアイコン-->
                              <img src="{{ asset('images/icon03.gif') }}" class="h-6 w-6 mr-2" alt="コメントアイコン">
                              <!--コメント数-->
                              <span class="text-sm text-gray-600">{{ $content->comments()->count() }}件</span>
                            </div>
                          </a>
                                       
                          <!-- favorite 状態で条件分岐 -->
                            @if($content->users()->where('user_id', Auth::id())->exists() || (Auth::guard('admin')->user() && $content->admins()->where('admin_id', Auth::guard('admin')->user()->id)->exists()))
                            <!-- unfavorite ボタン -->
                            <form action="{{ route('unfavorites',$content) }}" method="POST" class="text-left">
                              @csrf
                              <br>
                              <x-primary-button class="ml-3">
                               
                                <svg class="h-6 w-6 text-red-500" fill="red" viewBox="0 0 24 24" stroke="red">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                {{ $content->users()->count() + $content->admins()->count() }}
                              </x-primary-button>
                            </form>
                          @else
                            <!-- favorite ボタン -->
                            <form action="{{ route('favorites',$content) }}" method="POST" class="text-left">
                              @csrf
                              <br>
                              <x-primary-button class="ml-3">
                                
                                <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="gray">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                {{ $content->users()->count() + $content->admins()->count() }}
                              </x-primary-button>
                            </form>
                          @endif
                        </div>
                      </div>
                  @endforeach
                </div>
          
    </div>
  </div>
