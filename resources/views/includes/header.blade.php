<div class="navbar bg-base-100">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                <li><a>Item 1</a></li>
                <li><a>Item 3</a></li>
            </ul>
        </div>
        <a class="btn btn-ghost text-xl" href="/">{{ config('app.name') }}</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="{{ route('products') }}">Products</a></li>
            <li><a href="{{ route('sets') }}">Sets</a></li>
            <li><a href="{{ route('cards') }}">Cards</a></li>
            <li><a href="{{ route('scribe') }}">Docs</a></li>
        </ul>
    </div>
    <div class="navbar-end">
        @if (Route::has('login'))
            @auth
                <a class="btn btn-sm">Dashboard</a>
            @else
                <a class="btn btn-sm">Log in</a>

                @if (Route::has('register'))
                    <a class="btn btn-sm">Create Account</a>
                @endif
            @endauth
        @endif
    </div>
</div>