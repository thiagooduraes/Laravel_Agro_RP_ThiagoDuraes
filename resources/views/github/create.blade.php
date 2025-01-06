<!-- resources/views/github/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Adicionar Novo Perfil do GitHub') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Formulário de busca -->
                    <form action="{{ route('github.search') }}" method="GET">
                        @csrf
                        <label for="username" class="block text-sm font-medium text-white">{{ __('Nome de Usuário no GitHub') }}</label>
                        <input type="text" name="username" id="username" class="border rounded p-2 text-gray-700" required>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            {{ __('Buscar Perfil') }}
                        </button>
                    </form>

                    <!-- Exibir dados da API se disponíveis -->
                    @if (!empty($githubData) && is_array($githubData))
                        
                        @if ($errors->has('username'))
                            <div class="mt-4 text-red-500 text-sm">
                                {{ $errors->first('username') }}
                            </div>
                        @endif
                        
                        <div class="mt-6">
                            <h3 class="text-xl font-bold">{{ __('Dados do Perfil do GitHub') }}</h3>
                            <form action="{{ route('github.store') }}" method="POST">
                                @csrf
                                <div class="mt-4">
                                    <input type="hidden" name="username" value="{{ $githubData['login'] }}">
                                    <div class="mb-4">
                                        <label for="name" class="block text-sm font-medium text-white">{{ __('Nome') }}</label>
                                        <input type="text" name="name" id="name" value="{{ $githubData['name'] ?? 'N/A' }}" class="mt-2 px-4 py-2 border rounded w-full text-gray-700">
                                    </div>
                                    <div class="mb-4">
                                        <label for="company" class="block text-sm font-medium text-white">{{ __('Empresa') }}</label>
                                        <input type="text" name="company" id="company" value="{{ $githubData['company'] ?? 'N/A' }}" class="mt-2 px-4 py-2 border rounded w-full text-gray-700">
                                    </div>
                                    <div class="mb-4">
                                        <label for="bio" class="block text-sm font-medium text-white">{{ __('Bio') }}</label>
                                        <textarea name="bio" id="bio" class="mt-2 px-4 py-2 border rounded w-full text-gray-700">{{ $githubData['bio'] ?? 'N/A' }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="location" class="block text-sm font-medium text-white">{{ __('Localização') }}</label>
                                        <input type="text" name="location" id="location" value="{{ $githubData['location'] ?? 'N/A' }}" class="mt-2 px-4 py-2 border rounded w-full text-gray-700">
                                    </div>
                                    <div class="mb-4">
                                        <label for="blog" class="block text-sm font-medium text-white">{{ __('Blog') }}</label>
                                        <input type="url" name="blog" id="blog" value="{{ $githubData['blog'] ?? 'N/A' }}" class="mt-2 px-4 py-2 border rounded w-full text-gray-700">
                                    </div>
                                    <div class="mb-4">
                                        <label for="public_repos" class="block text-sm font-medium text-white">{{ __('Repositórios Públicos') }}</label>
                                        <input type="number" name="public_repos" id="public_repos" value="{{ $githubData['public_repos'] ?? 0 }}" class="mt-2 px-4 py-2 border rounded w-full text-gray-700">
                                    </div>
                                    <div class="mb-4">
                                        <label for="avatar_url" class="block text-sm font-medium text-white">{{ __('Avatar URL') }}</label>
                                        <input type="text" name="avatar_url" id="avatar_url" value="{{ $githubData['avatar_url'] ?? 'N/A' }}" class="mt-2 px-4 py-2 border rounded w-full text-gray-700">
                                    </div>
                                    <div class="mt-6 flex justify-end space-x-4">
                                        <button type="submit"
                                                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                                            {{ __('Salvar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
