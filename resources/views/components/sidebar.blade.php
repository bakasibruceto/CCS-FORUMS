  <!--   start::Sidebar    -->
  <div class="hidden sm:block lg:block bg-white w-56 overflow-y-auto pt-40">
    <div class="px-4 pb-6 fixed pt-20">
        <ul class="flex flex-col w-full font-semibold">
            <li class="my-px">
                <a href="#"
                    class="flex flex-row items-center h-10 px-3 rounded-lg text-gray-800 hover:bg-gray-100 hover:text-gray-700">
                    <span class="flex items-center justify-center text-lg text-gray-700">
                        <ion-icon name="grid-outline"></ion-icon>
                    </span>
                    <span class="ml-3">Feed</span>
                </a>
            </li>

            <li class="my-px">
                <a href="#"
                    class="flex flex-row items-center h-10 px-3 rounded-lg text-gray-800 hover:bg-gray-100 hover:text-gray-700">
                    <span class="flex items-center justify-center text-lg text-gray-700">
                        <ion-icon name="notifications-outline"></ion-icon>
                    </span>
                    <span class="ml-3">Notifications</span>
                    <span
                        class="flex items-center justify-center text-xs text-red-500 font-semibold bg-red-100 h-6 px-2 rounded-full ml-auto">10</span>
                </a>
            </li>

            <li class="my-px">
                <a href="{{ route('profile.show') }}"
                    class="flex flex-row items-center h-10 px-3 rounded-lg text-gray-800 hover:bg-gray-100 hover:text-gray-700">
                    <span class="flex items-center justify-center text-lg text-gray-700">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="ml-3">Settings</span>
                </a>
            </li>

            <li class="my-px">
                <a href="{{ route('user.show', ['user' => auth()->user()->username]) }}"
                    class="flex flex-row items-center h-10 px-3 rounded-lg text-gray-800 hover:bg-gray-100 hover:text-gray-700">
                    <span class="flex items-center justify-center text-lg text-gray-700">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <span class="ml-3">Profile</span>
                </a>
            </li>

            <li class="my-px">
                <a href="#"
                    class="flex flex-row items-center h-10 px-3 rounded-lg text-gray-800 hover:bg-gray-100 hover:text-gray-700">
                    <span class="flex items-center justify-center text-lg text-gray-700">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="ml-3">Sign out</span>
                </a>
            </li>

        </ul>
    </div>
</div>
<!--   end::Sidebar    -->
