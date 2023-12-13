<div class="hidden md:block lg:block w-65 ">

    <div class="flex flex-col justify-center items-center h-52 my-8">
        <div
            class="relative flex flex-col items-center shadow rounded-lg w-full mx-auto p-4 bg-white bg-clip-border shadow-3xl shadow-shadow-500 dark:!bg-navy-800 dark:text-white dark:!shadow-none">
            <div class="relative flex h-28 w-full justify-center rounded-xl bg-cover">
                <!-- for cover photo? -->

                @if (auth()->user()->bg_photo_path)
                    <img src="{{ asset('storage/' . auth()->user()->bg_photo_path) }}" alt=""
                        class="absolute flex h-28 w-full justify-center rounded-xl bg-cover">
                @endif

                <div class="absolute -bottom-12 flex h-28 w-28 items-center justify-center rounded-full border-[4px] border-white  dark:!border-navy-700">
                <a href="{{ route('user.show', auth()->user()->username) }}" class="h-full w-full">
                    <img class="h-full w-full rounded-full hover:ring-2 hover:ring-blue-600" src="{{ auth()->user()->profile_photo_url }}" alt="" />
                </a>
                </div>
            </div>
            <div class="mt-14 flex flex-col items-center">
                <h1 class="text-gray-800 font-bold">{{ auth()->user()->name }}</h1>
                <p class="text-base font-semibold text-gray-500">{{ auth()->user()->username }}</p>
                <p class="text-base font-normal text-gray-600 pt-4">Joined
                    {{ auth()->user()->created_at->format('d M Y') }}</p>
            </div>
        </div>
    </div>

    {{-- <div class="bg-white shadow rounded-lg mt-16 p-4 w-full h-52">
        <!--   content here   -->
        <p class="font-semibold text-gray-800 text-sm pb-2 border-b border-gray-200">Admins</p>
        @foreach ($admins as $admin)
            <p>{{ $admin->id }}</p>
        @endforeach
    </div> --}}

</div>
