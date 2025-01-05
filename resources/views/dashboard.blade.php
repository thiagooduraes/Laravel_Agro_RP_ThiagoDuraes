<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Página Inicial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mt-4">
                            <a href="{{ route('users.index') }}" class="text-gray-900 dark:text-gray-100 hover:underline">
                                {{ __('Usuários') }}
                            </a>
                        </div>
                    </div>
            </div>
    </div>
</x-app-layout>
