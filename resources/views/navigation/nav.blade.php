<nav class="sticky top-0 z-10 w-full navbars">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button"
          class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
          aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!--
              Icon when menu is closed.
  
              Menu open: "hidden", Menu closed: "block"
            -->
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
              Icon when menu is open.
  
              Menu open: "block", Menu closed: "hidden"
            -->
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-between">
        <a class="flex flex-shrink-0 items-center" href="{{ route('home') }}">
          <img class="h-8 w-auto" src="{{ asset('image/logoGrowceries.png') }}" alt="Your Company">
        </a>
        <div class="hidden sm:ml-10 sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{ route('home') }}" class="px-3 py-2 text-sm font-medium" aria-current="page"
              id="{{ Route::is('home') ? 'active' : 'notactive' }}">Home</a>
              <a href="{{ route('discover') }}" class="rounded-md px-3 py-2 text-sm font-medium"
                id="{{ Route::is('discover') ? 'active' : 'notactive' }}">Discover</a>
            <a href="{{ route('order') }}"
              class=" hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
              id="{{ Route::is('order') ? 'active' : 'notactive' }}">Order</a>
            <a href="{{ route('about') }}"
              class=" hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
              id="{{ Route::is('about') ? 'active' : 'notactive' }}">About</a>
          </div>
        </div>
        <div></div>
      </div>

      @guest
      <div class="relative ml-4">
        <div>
          <a href="{{ route('register') }}"
            class="relative flex rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
            <span class="rounded-md px-2 text-sm font-medium">Register</span>
          </a>
        </div>
      </div>
      @endguest
      @auth
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 pl-1">
          <a href="{{ route('cart') }}" class="icon-cart">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart"
              viewBox="0 0 16 16">
              <path
                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
            </svg>
            @if ($count > 10)
                <span class="moreThan10">{{$count ?? 0}}</span>
            @else
                <span>{{$count ?? 0}}</span>
                
            @endif
          </a>
          </button>

          <!-- Profile dropdown -->
          <div class="relative ml-4">
            <div>
              <button type="button"
                class="relative flex rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="absolute -inset-1.5"></span>
                <img class="h-8 w-8 rounded-full"
                  src="{{ Auth::user()->image() }}"
                  alt="">
                <span class="username rounded-md px-2 pt-1 text-sm font-medium">{{ Auth::user()->name }}</span>
              </button>
            </div>

          <!--
            Dropdown menu, show/hide based on menu state.
            
            Entering: "transition ease-out duration-100"
            From: "transform opacity-0 scale-95"
            To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
            From: "transform opacity-100 scale-100"
            To: "transform opacity-0 scale-95"
          -->
          <div
            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="{{route('profile')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
              id="user-menu-item-0">Your Profile</a>
            <a href="{{ route('address.index') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
              id="user-menu-item-1">My Address</a>
            <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 text-sm text-gray-700"
              role="menuitem" tabindex="-1" id="user-menu-item-2">
              @csrf
              <button>Log out</button>
            </form>
          </div>
        </div>
        @endauth
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="{{ route('home') }}" class="block rounded-md px-3 py-2 text-base font-medium"
        id="{{ Route::is('home') ? 'active' : 'notactive' }}">Home</a>
        <a href="{{ route('discover') }}"
          class="hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
          id="{{ Route::is('dicover') ? 'active' : 'notactive' }}">Discover</a>
      <a href="{{ route('order') }}"
        class="hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
        id="{{ Route::is('order') ? 'active' : 'notactive' }}">Order</a>
      <a href="{{ route('about') }}"
        class="hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
        id="{{ Route::is('about') ? 'active' : 'notactive' }}">About</a>
    </div>
  </div>

</nav>