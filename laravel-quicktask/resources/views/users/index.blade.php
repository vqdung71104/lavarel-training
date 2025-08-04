<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("User List") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-gray-900 dark:text-gray-100 px-4 py-2" scope="col">#</th>
                                <th class="text-gray-900 dark:text-gray-100 px-4 py-2" scope="col">Name</th>
                                <th class="text-gray-900 dark:text-gray-100 px-4 py-2" scope="col">Username</th>
                                <th class="text-gray-900 dark:text-gray-100 px-4 py-2" scope="col">Tasks</th>
                                <th class="text-gray-900 dark:text-gray-100 px-4 py-2" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-gray-900 dark:text-gray-100 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="text-gray-900 dark:text-gray-100 px-4 py-2 text-center">{{ $user->name }}</td>
                                    <td class="text-gray-900 dark:text-gray-100 px-4 py-2 text-center">{{ $user->username }}</td>
                                    <td class="text-gray-900 dark:text-gray-100 px-4 py-2 text-center">
                                        @foreach ($user->tasks as $task)
                                            <div>{{ $task->title }}</div>
                                        @endforeach
                                    </td>
                                    <td class="text-gray-900 dark:text-gray-100 px-4 py-2 text-center">
                                        <x-primary-button class="mt-4">
                                            {{ __("Create") }}
                                        </x-primary-button>
                                        <x-primary-button class="mt-4">
                                            {{ __("Edit") }}
                                        </x-primary-button>
                                        <x-danger-button class="mt-4" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                                            {{ __("Delete") }}
                                        </x-danger-button>
                                        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user) }}" method="POST" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>