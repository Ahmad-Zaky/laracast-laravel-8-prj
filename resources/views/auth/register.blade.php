<x-layout.app>
    <section class="px-6 py-6">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 rounded-xl p-6">
            
            <h1 class="text-center font-bold text-lg mb-10">Register !</h1>

            <form method="POST" action="{{route('register')}}">
                
                @csrf
                
                <div class="mb-6">
                    <label 
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="name" 
                    >
                        Name
                    </label>

                    <input 
                        class="border border-gray-400 p-2 w-full rounded" 
                        type="text" 
                        name="name"
                        id="name"
                        value="{{ old('name') }}" 
                        required
                    >

                    <x-layout.reuse.inline-error :field="'name'" />

                </div>

                <div class="mb-6">
                    <label 
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="username" 
                    >
                        Username
                    </label>

                    <input 
                        class="border border-gray-400 p-2 w-full rounded" 
                        type="text" 
                        name="username"
                        value="{{ old('username') }}" 
                        id="username" 
                        required
                    >

                    <x-layout.reuse.inline-error :field="'username'" />

                </div>

                <div class="mb-6">
                    <label 
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="email" 
                    >
                        Email
                    </label>

                    <input 
                        class="border border-gray-400 p-2 w-full rounded" 
                        type="email" 
                        name="email"
                        id="email"
                        value="{{ old('email') }}" 
                        required
                    >
                    
                    <x-layout.reuse.inline-error :field="'email'" />
                    
                </div>

                <div class="mb-6">
                    <label 
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="password" 
                    >
                        Password
                    </label>

                    <input  
                        class="border border-gray-400 p-2 w-full rounded" 
                        type="password" 
                        name="password"
                        id="password"
                        required
                    >
                    
                    <x-layout.reuse.inline-error :field="'password'" />

                </div>

                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Submit
                    </button>
                </div>

                {{-- All in one place --}}
                {{-- @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif --}}
            </form>
        </main>
    </section>
</x-layout.app>
