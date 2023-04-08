<head>
  <title>co-animal｜お問い合わせ</title>
</head>

<x-app-layout>
    <div class="mx-auto">
        <div class="mt-4" style="width:100%;">
            <div class="max-w-screen-md mx-auto sm:px-6 lg:px-8  bg-teal-100 overflow-hidden shadow-sm sm:rounded-lg ">
                <h1 class="text-3xl text-teal-400 font-bold my-1">チャンネル開設までの流れ</h1>
                
                <div class="flex items-center lg:px-8">
                  <div class="text-lg font-bold mt-4 text-slate-700">①お問い合わせ</div>
                </div>
                <div class="flex items-center lg:px-8">
                  <div class="text-lg font-bold mt-4 text-slate-700">②担当者とお打ち合わせ</div>
                </div>
                <div class="flex items-center lg:px-8">
                  <div class="text-lg font-bold mt-4 text-slate-700">③チャンネル設定して放送スタート</div>
                </div>
                <br>
                <div class="mb-4 mx-auto ">
                    <a href="{{ route('service') }}" class=" mx-auto inline-block px-2 py-2 rounded-full border-2 border-teal-400 text-teal-400 bg-teal-white font-bold hover:bg-teal-400 hover:text-white">{{ __('co-animalをよく知る') }}</a>
                </div>
            </div>
        </div>
        <!--google formをiframeで置く-->
        <div class="max-w-screen-md mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeMMGU7-kuX_w9CPukS_pE1sE8ObSv0PvK5P_CTKCIaAgY5kQ/viewform?embedded=true" 
                  frameborder="0" 
                  marginheight="0" 
                  marginwidth="0"
                  height="600px">
            読み込んでいます…
          </iframe>
        </div>
    </div>
</x-app-layout>