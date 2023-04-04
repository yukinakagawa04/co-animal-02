
    <head>
        <title>co-animal｜TOP</title>
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
                        <img src="{{ asset('images/lp_image03.png') }}" alt="">
                    </div>
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
                            <a href="partner" class="hidden">{{ __('もっと見る') }}</a>
                    </div>
                </div>
                
                <div>
                    <div>
                        <br>
                        <a href="{{ route('service') }}"><img src="{{ asset('images/banner01.png') }}" alt="" class="mx-auto"></a>
                    </div>
                </div>
            </div>
        </x-app-layout>
    </body>
