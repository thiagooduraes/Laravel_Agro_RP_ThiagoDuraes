<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Busca GitHub') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="GET" action="{{ route('github.search') }}">
                        <div>
                            <label for="username" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Usuário do GitHub</label>
                            <input type="text" name="username" id="username"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                   required>
                        </div>
                        <div class="mt-4 flex justify-end space-x-4">
                            <button type="reset" class="px-4 py-2 bg-gray-600 text-white font-semibold rounded-md hover:bg-gray-700">
                                {{ __('Limpar') }}
                            </button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                                {{ __('Buscar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
