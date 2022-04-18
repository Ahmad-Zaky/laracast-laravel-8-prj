
@props(['post'])

<tr class="mx-2">
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="text-sm font-medium text-gray-900">
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </div>
        </div>
    </td>

    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
    </td>

    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <form method="POST" action="{{ route('admin.posts.delete', $post->id) }}">
            @csrf
            @method('DELETE')

            <button class="text-xs text-gray-400">Delete</button>
        </form>
    </td>
</tr>