@props(['title', 'text', 'route', 'icon' => '📁', 'color' => 'text-gray-700'])

<a href="{{ route($route) }}"
   class="w-full max-w-sm bg-white border border-gray-200 rounded-xl shadow-md hover:shadow-lg transition transform hover:scale-[1.02] duration-300 p-6 text-left">
    <div class="flex items-center space-x-4 mb-4">
        <div class="text-5xl {{ $color }}">{{ $icon }}</div>
        <h4 class="text-2xl font-bold text-gray-800">{{ $title }}</h4>
    </div>
    <p class="text-lg text-gray-600">{{ $text }}</p>
</a>
