<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Nome') }}
                            </label>
                            <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus
                                   class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm mt-1 block w-full">
                        </div>
                        <div class="mt-4">
                            <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Email') }}
                            </label>
                            <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required
                                   class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm mt-1 block w-full">
                        </div>
                        <div class="mt-6 flex justify-end space-x-4">
                            <form action="{{ route('users.index') }}" method="GET">
                                <button type="submit"
                                        class="px-4 py-2 bg-gray-300 text-gray-700 font-semibold rounded-md hover:bg-gray-400 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                                    {{ __('Cancelar') }}
                                </button>
                            </form>

                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                                {{ __('Salvar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
