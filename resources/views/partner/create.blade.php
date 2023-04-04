<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create New Account') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
          @include('common.errors')
          <form class="mb-6" action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!--チャンネルの画像-->
            <div class="flex flex-col mb-4">
              <x-input-label for="image_partner" :value="__('チャンネル画像')" />
              <x-text-input id="image_partner" class="block mt-1 w-full" type="file" name="image_partner" :value="old('image_partner')" required autofocus />
              <x-input-error :messages="$errors->get('image_partner')" class="mt-2" />
            </div>
            <!--チャンネルのタイトル-->
            <div class="flex flex-col mb-4">
              <x-input-label for="title_partner" :value="__('チャンネルのタイトル')" />
              <x-text-input id="title_partner" class="block mt-1 w-full" type="text" name="title_partner" :value="old('title_partner')" required autofocus />
              <x-input-error :messages="$errors->get('title_partner')" class="mt-2" />
            </div>
            <!--名前-->
            <div class="flex flex-col mb-4">
              <x-input-label for="name" :value="__('アカウント名')" />
              <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!--放送-->
            <div class="flex flex-col mb-4">
              <x-input-label for="description_partner" :value="__('放送の説明')" />
              <x-text-input id="description_partner" class="block mt-1 w-full" type="text" name="description_partner" :value="old('description_partner')" required autofocus />
              <x-input-error :messages="$errors->get('description_partner')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
              <x-primary-button class="ml-3">
                {{ __('登録する') }}
              </x-primary-button>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</x-app-layout>