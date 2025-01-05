<!-- resources/views/github/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Perfil do GitHub') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold">{{ $profile->login }} - Perfil Completo</h1>

                    <div class="mt-4">
                        <p><strong>{{ __('Nome') }}:</strong> {{ $profile->name }}</p>
                        <p><strong>{{ __('Bio') }}:</strong> {{ $profile->bio }}</p>
                        <p><strong>{{ __('Localização') }}:</strong> {{ $profile->location }}</p>
                        <p><strong>{{ __('Blog') }}:</strong> <a href="{{ $profile->blog }}" class="text-blue-500">{{ $profile->blog }}</a></p>
                        <p><strong>{{ __('Twitter') }}:</strong> {{ $profile->twitter_username }}</p>
                        <p><strong>{{ __('Repositórios Públicos') }}:</strong> {{ $profile->public_repos }}</p>

                        <div class="mt-4">
                            <img src="{{ $profile->avatar_url }}" alt="Avatar" width="100">
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('github.index') }}" class="text-blue-500 hover:underline">{{ __('Voltar à Lista') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>