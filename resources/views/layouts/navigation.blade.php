<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 ">
  <!-- Primary Navigation Menu -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
          <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 " />
          </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
          <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('co-animal TOP') }}
          </x-nav-link>
        </div>
        <!-- 🔽 一覧ページへのリンクを追加 -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
          <x-nav-link :href="route('content.index')" :active="request()->routeIs('content.index')">
            {{ __('コンテンツ一覧') }}
          </x-nav-link>
        </div>
        
        <!-- 🔽 作成ページへのリンクを追加 -->
        @can('business-higher')　{{-- 管理者に表示される --}}
          @if (Auth::user()->role >= 11 && Auth::user()->role <= 20)
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
              <x-nav-link :href="route('content.create')" :active="request()->routeIs('content.create')" class="">
                {{ __('コンテンツを作成する') }}
              </x-nav-link>
            </div>
          @endif
        @endcan
        <!-- 🔽 マイページへのリンクを追加 -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
          <x-nav-link :href="route('content.mypage')" :active="request()->routeIs('content.mypage')" class="hidden">
            {{ __('あなたのコンテンツ') }}
          </x-nav-link>
        </div>

      </div>

      <!-- Settings Dropdown -->
      <div class="hidden sm:flex sm:items-center sm:ml-6">
      <!--🔽 contact-->
      <!--<div class="inline-block h-15 w-56 text-center font-semibold text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-opacity-50 bg-teal-400 text-white rounded-sm py-2">-->
      <a href="{{ route('contact') }}" >{{ __('飼育員の方へ') }}<br>{{ __('チャンネル開設のお申し込み') }}</a>
      <!--</div>-->
        <div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
          <button @click="open = !open" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
            <!--ユーザーネーム表示：飼育員はadmin、ユーザーはuser-->
            <div>
              @if(Auth::guard('admin')->check())
              {{ Auth::guard('admin')->user()->name }}
              @else
              {{ Auth::user()->name }}
              @endif
            </div>
        
        
            <div class="ml-1">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24">
                <path fill="#21CCC0" d="M256,288c70.7,0,128-57.3,128-128S326.7,32,256,32S128,89.3,128,160S185.3,288,256,288z M256,352c-58.8,0-111.6,28.6-144.6,72.6 C123,454.9,135,480,157.2,480h197.6c22.2,0,34.2-25.1,21.8-39.4C367.6,380.6,314.8,352,256,352z" />
              </svg>
            </div>
          </button>
        
          <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0" style="display: none;" @click="open = false">
            <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
              <x-dropdown-link :href="route('profile.edit')">
                {{ __('プロフィール') }}
              </x-dropdown-link>
              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                  {{ __('ログアウト') }}
                </x-dropdown-link>
              </form>
            </div>
          </div>
        </div>

      </div>

      <!-- Hamburger -->
      <div class="-mr-2 flex items-center sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500  hover:bg-gray-100  focus:outline-none focus:bg-gray-100  focus:text-gray-500  transition duration-150 ease-in-out">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
      <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('co-animal｜TOP！') }}
      </x-responsive-nav-link>
    </div>
    <!-- 🔽 一覧ページへのリンクを追加 -->
    <div class="pt-2 pb-3 space-y-1">
      <x-responsive-nav-link :href="route('content.index')" :active="request()->routeIs('content.index')">
        {{ __('コンテンツ一覧') }}
      </x-responsive-nav-link>
    </div>
    
    <!-- 🔽 作成ページへのリンクを追加 -->
        @can('business-higher')　{{-- 管理者に表示される --}}
          @if (Auth::user()->role >= 11 && Auth::user()->role <= 20)
          <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('content.create')" :active="request()->routeIs('content.create')">
              {{ __('コンテンツを作成する') }}
            </x-responsive-nav-link>
          </div>
          @endif
        @endcan
          
    <!-- 🔽 マイページへのリンクを追加 -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
          <x-nav-link :href="route('content.mypage')" :active="request()->routeIs('content.mypage')" class="hidden">
            {{ __('あなたのコンテンツ') }}
          </x-nav-link>
        </div>

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200 ">
      <!--🔽 contact-->
      <div class="bg-teal-300">
        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
            {{ __('飼育員の方へチャンネル開設のお申し込み') }}
          </x-nav-link>
         
         <!--<a href="{{ route('contact') }}"><p class="mx-auto text-base text-blue-600">【飼育員の方へ】<br>チャンネル開設のお申し込み</p></a>-->
      </div>
      <div class="px-4">
        <div class="font-medium text-base text-gray-800 ">{{ Auth::user()->name }}</div>
        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
      </div>

      <div class="mt-3 space-y-1">
        <x-responsive-nav-link :href="route('profile.edit')">
          {{ __('Profile') }}
        </x-responsive-nav-link>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
            this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-responsive-nav-link>
        </form>
      </div>
    </div>
  </div>
</nav>

