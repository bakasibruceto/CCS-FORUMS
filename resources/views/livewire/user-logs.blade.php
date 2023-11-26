<div>
    <div class="container mx-auto px-4 sm:px-8 mt-6 ">
        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table wire:poll class="table-auto w-full">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 uppercase tracking-wider">
                            date and time
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 uppercase tracking-wider">
                            id
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 uppercase tracking-wider">
                            username
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 uppercase tracking-wider">
                            status
                        </th>
                    </tr>
                </thead>

                @foreach ($logs as $log)
                <tbody>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $log->created_at }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $log->user_id }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $log->user->username }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $log->actions }}
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>