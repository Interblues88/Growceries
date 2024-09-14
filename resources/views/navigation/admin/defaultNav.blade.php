<nav class="navbars">
    <a class="centerLogo" href="{{ route('admin.home') }}">
      <img src="{{ asset('image/logoGrowceries.png') }}" alt="GrowCeries">
    </a>
    @auth('admin')
      <div class="dropDown">
        <div class="dropDownList">
          <form action="{{ route('admin.logout') }}" method="POST" class="dropDownListButton"
              role="menuitem" tabindex="-1" id="user-menu-item-2">
              @csrf
              <button class="logOut">Log out</button>
          </form>
        </div>
      </div>
      @endauth
    </nav>
  
  
  <style>
  </style>
  