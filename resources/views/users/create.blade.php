<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Novo Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        @if ($errors->has('email'))
                            <div class="mt-4 text-red-500 text-sm">
                                {{ $errors->first('email') }}
                            </div>
                        @endif

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Nome') }}
                            </label>
                            <input type="text" name="name" id="name"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-700"
                                   required>
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('E-mail') }}
                            </label>
                            <input type="email" name="email" id="email"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-700"
                                   required>
                        </div>

                        <div class="mt-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Senha') }}
                            </label>
                            <input type="password" name="password" id="password"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-700"
                                   required>
                        </div>

                        <div class="mt-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Confirme a Senha') }}
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-700"
                                   required>
                        </div>

                        <div class="mt-6 flex justify-end space-x-4">
                            <a href="{{ route('users.index') }}"
                               class="px-4 py-2 bg-gray-300 text-white font-semibold rounded-md hover:bg-blue-700 text-gray-700">
                                {{ __('Cancelar') }}
                            </a>

                            <button type="reset"
                                    class="px-4 py-2 bg-gray-300 text-white font-semibold rounded-md hover:bg-blue-700">
                                {{ __('Limpar') }}
                            </button>

                            <button type="submit"
                                    class="px-4 py-2 bg-gray-300 text-white font-semibold rounded-md hover:bg-blue-700">
                                {{ __('Salvar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
