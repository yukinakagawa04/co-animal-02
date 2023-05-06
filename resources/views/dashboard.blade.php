
    <head>
        <!--favicon-->
        <link rel="icon" type="image/png" href="{{ asset('images/logo01.png') }}">
        <title>co-animal｜TOP</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-NKq3zHdJ+XV0gDkIhTDK2J0CfhZsWc4Jg4vi6FQH6I52nX16eN6SvEYIR3L6nHm8WxjKf0gfZ1di/UZzIV9XWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800  leading-tight">
                {{ __('co-animal TOP') }}
            </h2>
        </x-slot>
        
        <x-app-layout>
            <div class="py-12">
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                        <img src="{{ asset('images/banner03.png') }}" alt="">
                    </div>
                
                        
                <!--コンテンツ一覧-->
                <div class="content">      
                    <div class="text-center">
                        <div>
                        <!--新着順-->
                        <br>
                            <p  class="font-bold  text-lg ">新着順</p>
                        <br>
                        <!--新着の投稿をアップする-->
                            @include('dashboard.content', ['contents' => $contents])
                        <!--フロントに全部出すデータ-->
                        <br>
                        <div class="h-16 flex items-center justify-center">
                            <a href="content" class="inline-block text-center font-semibold text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-opacity-50 bg-teal-400 text-white rounded-sm py-3 px-6">{{ __('もっと見る') }}</a>
                        </div>
                            
                    </div>
                </div>
                
                <div>
                    <div>
                        <br>
                        <a href="{{ route('service') }}"><img src="{{ asset('images/banner01.png') }}" alt="" class="mx-auto"></a>
                    </div>
                    <!--シェアボタン-->
                    <div class="container">
                        <br>
                        <div class="mx-auto" style="max-width: 300px;">
                            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </x-app-layout>
    </body>
