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

                    <form method="POST" action="{{ route('github.update', $profile->id) }}">
                        <div class="mt-4">
                            <img src="{{ $profile->avatar_url }}" alt="Avatar" width="100">
                        </div>
                        @csrf
                        @method('PUT')
                        <div class="mt-4">
                            <input type="hidden" name="username" value="{{ $profile['login'] }}">
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-white">{{ __('Nome') }}</label>
                                <input type="text" name="name" id="name" value="{{ $profile['name'] ?? 'N/A' }}" class="mt-2 px-4 py-2 border rounded w-full text-gray-700">
                            </div>
                            <div class="mb-4">
                                <label for="company" class="block text-sm font-medium text-white">{{ __('Empresa') }}</label>
                                <input type="text" name="company" id="company" value="{{ $profile['company'] ?? 'N/A' }}" class="mt-2 px-4 py-2 border rounded w-full text-gray-700">
                            </div>
                            <div class="mb-4">
                                <label for="bio" class="block text-sm font-medium text-white">{{ __('Bio') }}</label>
                                <textarea name="bio" id="bio" class="mt-2 px-4 py-2 border rounded w-full text-gray-700">{{ $profile['bio'] ?? 'N/A' }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="location" class="block text-sm font-medium text-white">{{ __('Localização') }}</label>
                                <input type="text" name="location" id="location" value="{{ $profile['location'] ?? 'N/A' }}" class="mt-2 px-4 py-2 border rounded w-full text-gray-700">
                            </div>
                            <div class="mb-4">
                                <label for="blog" class="block text-sm font-medium text-white">{{ __('Blog') }}</label>
                                <input type="url" name="blog" id="blog" value="{{ $profile['blog'] ?? '' }}" class="mt-2 px-4 py-2 border rounded w-full text-gray-700">
                            </div>
                            <div class="mb-4">
                                <label for="public_repos" class="block text-sm font-medium text-white">{{ __('Repositórios Públicos') }}</label>
                                <input type="number" name="public_repos" id="public_repos" value="{{ $profile['public_repos'] ?? 0 }}" class="mt-2 px-4 py-2 border rounded w-full text-gray-700">
                            </div>
                            <div class="mb-4">
                                <label for="avatar_url" class="block text-sm font-medium text-white">{{ __('Avatar URL') }}</label>
                                <input type="text" name="avatar_url" id="avatar_url" value="{{ $profile['avatar_url'] ?? 'N/A' }}" class="mt-2 px-4 py-2 border rounded w-full text-gray-700">
                            </div>
                        <div class="mt-6 flex justify-end space-x-4">
                            <form action="{{ route('github.index') }}" method="GET">
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
                        </div>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>