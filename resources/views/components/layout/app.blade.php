<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('/style.css') }}" rel="stylesheet">

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                
                <x-layout.dropdown>
                    <x-slot name="trigger">

                        <button class="text-xs font-bold uppercase w-full lg:w-44 flex lg:inline-flex">
                            
                            Welcome, {{ auth()->user()->name }} ! 
                            
                            <x-layout.icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"></x-layout.icon>
                            
                        </button>
                        
                    </x-slot>
                    
                        @admin
                            <x-layout.dropdown-item 
                                href="{{ route('admin.dashboard') }}"
                                :active="request()->routeIs('admin.dashboard')"
                            >
                                Dashboard
                            </x-layout.dropdown-item>
                        @endadmin
                        
                        <x-layout.dropdown-item 
                            href="javascript:void(0)"
                            x-dataj="{}"
                            @click.prevent="document.querySelector('#logout').submit()"
                        >
                            Log Out
                        </x-layout.dropdown-item>
                        
                        {{-- Log Out Form --}}
                        <form id="logout" method="POST" action="{{route('logout')}}"> @csrf </form>

                    </x-layout.dropdown>

                @else 
                    <a href="{{ route('register') }}" class="text-xs font-bold uppercase">Register</a> 
                    <a href="{{ route('login') }}" class="text-xs font-bold uppercase text-blue-500 ml-6">Login</a> 
                @endauth
                
                <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}
        
        <footer  class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div id="newsletter" class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="{{ route('newsletter') }}" class="lg:flex text-sm">
                        
                        @csrf

                            <div class="lg:py-3 lg:px-5">
                                <div class="flex items-center">
                                    <label for="email" class="hidden lg:inline-block">
                                        <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                                    </label>
                                    <input 
                                        id="email"
                                        name="email"
                                        type="text"
                                        placeholder="Your email address"
                                        class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none"
                                    >
                                </div>
                                <x-layout.reuse.inline-error :field="'email'" />
                            </div>
                            
                            

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
    
    {{-- Flash Messages --}}
    <x-layout.flash.msg />
    
    <script src="/script.js"></script>
</body>
