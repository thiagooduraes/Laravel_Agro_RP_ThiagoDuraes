<!-- resources/views/github/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Perfis do GitHub') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">{{ __('Lista de Perfis') }}</h1>
                        <a href="{{ route('github.create') }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
                            </svg>
                            {{ __('Novo Perfil') }}
                        </a>
                    </div>

                    <form action="{{ route('github.index') }}" method="GET" class="mb-6">
                        <input type="text" name="search" placeholder="Buscar por login" class="border rounded p-2 text-gray-700">
                        <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Buscar</button>
                    </form>

                    @if ($profiles->count() == 0)
                        <p>{{ __('Nenhum perfil encontrado.') }}</p>
                    @else
                        <ul>
                            @foreach ($profiles as $profile)
                                <li class="border-b border-gray-300 dark:border-gray-700 py-4 flex justify-between items-center">
                                    <div>
                                        <span class="font-medium">{{ $profile->login }}</span> - 
                                        <span class="text-sm">{{ $profile->name }}</span>
                                    </div>
                                    <div class="flex items-center" style="gap: 10px;">
                                        <a href="{{ route('github.show', $profile->id) }}" 
                                        class="text-blue-500 hover:underline flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" 
                                                class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M17.414 2.586a2 2 0 010 2.828L7.707 15.121a1 1 0 01-.293.207l-4 2A1 1 0 012 17.586l2-4a1 1 0 01.207-.293L14.586 2.586a2 2 0 012.828 0zM16 5l-1-1-9.293 9.293L5 15l1.707-.707L16 5z" />
                                            </svg>
                                            {{ __('Ver Detalhes') }}
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>