<x-layout.app>
    <section class="px-6 py-6">
        <main class="max-w-lg mx-auto mt-10">
            <x-layout.reuse.panel>
                <h1 class="text-center font-bold text-lg mb-10">Login !</h1>
    
                    {{-- All in one place --}}
                    @if ($errors->any())
                        <ul class="bg-red-100 border border-red-200 rounded-xl m-6">
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500 text-xs m-3">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                <form method="POST" action="{{route('login')}}">
                    
                    @csrf
    
                    <x-layout.form.input :name="'email'" :type="'email'" :required="1" :value="old('email')" :autocomplete="'username'" />
    
                    <x-layout.form.input :name="'password'" :type="'password'" :required="1" :autocomplete="'current-password'" />
    
                    <div class="mb-6">
                        <x-layout.reuse.button.primary>
                            Login
                        </x-layout.reuse.button.primary> 
                    </div>
    
                </form>
            </x-layout.reuse.panel>
 
        </main>
    </section>
</x-layout.app>
