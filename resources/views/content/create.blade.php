<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('投稿を作成する') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white  border-b border-gray-200">
          @include('common.errors')
          <form class="mb-6" action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!--投稿のタイトル-->
            <div class="flex flex-col mb-4">
              <x-input-label for="title_content" :value="__('タイトル')" />
              <x-text-input id="title_content" class="block mt-1 w-full" type="text" name="title_content" :value="old('title_content')" required autofocus />
              <x-input-error :messages="$errors->get('title_content')" class="mt-2" />
            </div>
            <!--投稿の画像-->
            <div class="flex flex-col mb-4">
              <x-input-label for="image_content" :value="__('投稿の画像')" />
              <x-text-input id="image_content" class="block mt-1 w-full" type="file" name="image_content" :value="old('image_content')" required autofocus />
              <x-input-error :messages="$errors->get('image_content')" class="mt-2" />
            </div>
            <!--音声ファイル-->
            <div class="flex flex-col mb-4">
              <x-input-label for="audio" :value="__('音声ファイル')" />
              <x-text-input id="audio" class="block mt-1 w-full" type="file" name="audio" :value="old('audio')" required autofocus />
              <x-input-error :messages="$errors->get('audio')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
              <x-primary-button class="ml-3">
                {{ __('投稿する') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>