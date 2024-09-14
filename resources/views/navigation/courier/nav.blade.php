<nav class="sticky top-0 z-10 w-full navbars">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        </div>
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-between">
          <a class="flex flex-shrink-0 items-center" href="{{ route('courier.home') }}">
            <img class="h-8 w-auto" src="{{ asset('image/logoGrowceries.png') }}" alt="Your Company">
          </a>
        </div> 
        @auth('courier')
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 pl-1">  
            <!-- Profile dropdown -->
            <div class="relative ml-4">
              <div>
                <button type="button"
                  class="relative flex rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                  id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="username rounded-md px-2 pt-1 text-sm font-medium">Courier</span>
                </button>
              </div>

            <div
              class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
              role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <form action="{{ route('courier.logout') }}" method="POST" class="block px-4 py-2 text-sm text-gray-700"
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
  </nav>