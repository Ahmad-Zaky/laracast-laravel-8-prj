<x-layout.app>
    <section class="px-6 py-6">
        <main class="max-w-lg mx-auto mt-10">
            <x-layout.reuse.panel>
            
                <h1 class="text-center font-bold text-lg mb-10">Register !</h1>

                <form method="POST" action="{{route('register')}}">
                    
                    @csrf
                    
                    <x-layout.form.input :name="'name'" :value="old('name')" :type="'text'" :required="1"/>
                    
                    <x-layout.form.input :name="'username'" :value="old('username')" :type="'text'" :required="1"/>
                    
                    <x-layout.form.input :name="'email'" :type="'email'" :required="1" :value="old('email')" :autocomplete="'username'" />

                    <x-layout.form.input :name="'password'" :type="'password'" :required="1" :autocomplete="'current-password'" />

                    <div class="mb-6">
                        <x-layout.reuse.button.primary>
                            Submit
                        </x-layout.reuse.button.primary> 
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
        </x-layout.reuse.panel>

        </main>
    </section>
</x-layout.app>
