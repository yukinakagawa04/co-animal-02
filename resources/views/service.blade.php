<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>co-animalについて</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div class="p-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                    <div class="object-fit">
                        <img src="{{ asset('images/logo02.png') }}" class="w-1/2 mx-auto" alt="">
                    </div>
                    <div class=" mx-auto text-center ">
                        <h1 class="text-teal-400 text-xl font-bold">動物のお話で癒される<br>飼育員の声でお届けする<br>音声配信サービス</h1>
                        <br>
                        <!--シェアボタン-->
                              <div class="container">
                                  <br>
                                  <div class="mx-auto" style="max-width: 100px;">
                                      <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
                                      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                  </div>
                              </div>
                        <br>
                    </div>
                    <div class="mx-auto max-w-3xl">
                        <p class="font-bold">水族館の生き物ってこんなに個性的なんだ。生き物のこういうところに着目すると面白いよ。最近生まれたこんな赤ちゃんがいるよ。など、全国の飼育員の生き物好き！な気持ちが集まって、皆さんの心に癒しをお届けするプラットフォームを目指しています。</p>
                        <br>
                        <p class="font-bold">生き物の魅力や楽しみ方がたくさんの人に広まれば、友人・家族など、大切な人と一緒に行きたい場所が見つかるかもしれない。推しの水族館・動物園が見つかるかもしれない。生き物と人々との関わりの選択肢をもっと広がるような活動をしていきたいと思います。</p>
                        <br>
                    </div>
                    <div class="object-fit border-rounded-lg">
                        <img src="{{ asset('images/lp_image05.jpeg') }}" class="mx-auto" alt="">
                    </div>
                    <div class="mx-auto text-center max-w-3xl py-4">
                        <br>
                        <h2 class="text-teal-400 text-xl font-bold">co-animalでやりたいこと</h2>
                        <br>
                        <div class="flex justify-center">
                            <div class="w-1/3 mx-auto">
                                <img src="{{ asset('images/icon01.png') }}" class="w-100px mx-auto sm:w-1/2" alt="">
                                <br>
                                <p class="text-teal-400 font-bold">生き物の様子を<br>
                                音声配信でお届け</p>
                            </div>
                            <div class="w-1/3 mx-auto">
                                <img src="{{ asset('images/icon02.png') }}" class="w-100px mx-auto sm:w-1/2" alt="">
                                <br>
                                <p class="text-slate-500 font-bold">推しの生き物で<br>
                                共鳴する</p>
                            </div>
                            <div class="w-1/3 mx-auto">
                                <img src="{{ asset('images/icon02.png') }}" class="w-100px mx-auto sm:w-1/2" alt="">
                                <br>
                                <p class="text-slate-500 font-bold">推しの生き物に<br>
                                投げエサできる</p>
                            </div>
                            <br>
                        </div>
                    </div>
                    
                    <div>
                        <div class=" py-2 mx-auto text-center max-w-xl  mx-auto sm:px-6 lg:px-8  bg-teal-100 overflow-hidden shadow-sm sm:rounded-lg ">
        
                            <p class="text-teal-400 text-xl font-bold">【β版公開中】生き物好きのみなさんへ</p>
                            <br>
                            <p class="font-bold">サービスのβ版をクローズで公開しており、サービスに関するアドバイスをしてくださるユーザーさんを募集しています。</p>
                            <br>
                        </div>
                        
                        <div class="mb-4 mx-auto text-center bg-white">
                            <br>
                            <button onclick="window.history.back();" class="mx-auto inline-block px-4 py-2 rounded-full border-2 border-teal-400 text-teal-400 bg-teal-white font-bold hover:bg-teal-400 hover:text-white">{{ __('ユーザー登録する') }}</button>
                        </div>
                        
                    </div>
                    
            </div>
        </div>
    </div>
</body>
    
