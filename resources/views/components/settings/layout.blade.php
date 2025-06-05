<div class="flex items-start max-md:flex-col">
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <nav class="space-y-1">
            <a href="{{ route('settings.profile') }}" 
               wire:navigate 
               class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('settings.profile') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                {{ __('Profile') }}
            </a>
            <a href="{{ route('settings.password') }}" 
               wire:navigate 
               class="flex items-center px-3 py-2 text-sm font-medium rounded-md {{ request()->routeIs('settings.password') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                {{ __('Password') }}
            </a>
        </nav>
    </div>

    <div class="w-full h-px bg-gray-200 md:hidden my-4"></div>

    <div class="flex-1 self-stretch max-md:pt-6">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">{{ $heading ?? '' }}</h2>
        <p class="mt-1 text-sm text-gray-500">{{ $subheading ?? '' }}</p>

        <div class="mt-5 w-full max-w-lg">
            {{ $slot }}
        </div>
    </div>
</div>
