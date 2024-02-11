<x-app-layout>
    <div class="flex flex-col justify-center items-center mb-8 min-h-screen">
        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</x-app-layout>
