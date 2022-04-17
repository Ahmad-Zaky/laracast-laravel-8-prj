<x-layout.reuse.panel>
    <p {{ $attributes(["class" => "font-semibold"])}}>
        <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a> or <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Log in</a> to leave a comment
    </p>
</x-layout.reuse.panel>