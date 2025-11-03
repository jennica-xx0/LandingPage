<div class="navbar bg-[#134573CC] text-slate-50 shadow-md px-4 sm:px-8">
    <div class="navbar-start">
        <div class="flex items-center gap-3">
            <img src="/img/mandaluyonglogo.jpg" alt="Barangay Seal" class="rounded-full h-10">
            <img src="/img/barangaylogo.jpg" alt="City Seal" class="rounded-full h-10   ">
            <div>
                <p class="font-bold text-lg text-slate-50">Barangay Daang Bakal</p>
                <p class="text-xs text-slate-50">Mandaluyong City</p>
            </div>
        </div>
    </div>
    <div class="navbar-end hidden lg:flex">
        <ul class="menu menu-horizontal px-1 font-semibold">
            <li><a class="text-slate-50 hover:text-slate-200">Home</a></li>
            <li><a class="text-slate-50 hover:text-slate-200">Services</a></li>
            <li><a class="text-slate-50 hover:text-slate-200">About</a></li>
            <li><a href="{{ route('login') }}" class="btn btn-primary btn-sm ml-2">Login</a></li>
        </ul>
    </div>
    <div class="navbar-end lg:hidden">
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-[#2E5E85] text-slate-50 rounded-box w-52">
                <li><a class="hover:text-slate-200">Home</a></li>
                <li><a class="hover:text-slate-200">Services</a></li>
                <li><a class="hover:text-slate-200">About</a></li>
                <li><a href="{{ route('login') }}" class="hover:text-slate-200">Login</a></li>
            </ul>
        </div>
    </div>
</div>