<x-layout.app>
    <section class="px-6 py-6">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 rounded-xl p-6">
            
            <h1 class="text-center font-bold text-lg mb-10">Login !</h1>

                {{-- All in one place --}}
                @if ($errors->any())
                    <ul class="bg-red-100 border border-red-200 rounded-xl m-6">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-xs m-3">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                
            <form method="POST" action="{{route('auth.login')}}">
                
                @csrf

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
                    
                </div>

                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Login
                    </button>
                </div>

            </form>
        </main>
    </section>
</x-layout.app>
