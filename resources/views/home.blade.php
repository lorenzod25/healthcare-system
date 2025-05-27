<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
            @if ($visited)
                <h3 class="text-2xl font-bold text-green-600">Welcome back to the Healthcare Management System 👋</h3>
                <p class="mt-4 text-gray-600">You’ve been here before. Explore the dashboard or view patient records.</p>
            @else
                <h3 class="text-2xl font-bold text-blue-600">Hello and welcome! 👋</h3>
                <p class="mt-4 text-gray-600">We’ve just set a cookie for your session. Navigate using the menu above.</p>
            @endif
        </div>
    </div>
</x-app-layout>
