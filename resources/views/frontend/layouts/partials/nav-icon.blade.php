<nav>
    <div class="px-5 sm:px-10 py-6 w-full flex xl:hidden shadow justify-between items-center bg-white z-40">
        <a href="/" class="w-[140px] sm:w-[180px]">
            <img src="{{ asset('frontend/images/logo.png') ?? asset('frontend/images/logo.png') }}" alt="logo Img">
        </a>
        <button id="menu" aria-label="open menu"
            class="focus:outline-none focus:ring-2 focus:ring-gray-600 rounded-md"
            onclick="sidebarHandler(true)">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="4" y1="6" x2="20" y2="6" />
                <line x1="4" y1="12" x2="20" y2="12" />
                <line x1="4" y1="18" x2="20" y2="18" />
            </svg>
        </button>
    </div>
</nav>