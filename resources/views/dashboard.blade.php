{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User-Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}

@auth
    @if (auth()->user()->role === 'user')
        <script>window.location.href = "{{ route('user.index') }}";</script>
    @elseif (auth()->user()->role === 'admin')
        <script>window.location.href = "{{ route('admin.index') }}";</script>
    @endif
@else
    <script>window.location.href = "{{ route('login') }}";</script>
@endauth


