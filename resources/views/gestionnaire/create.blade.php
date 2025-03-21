<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Création Gestionnaire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.store') }}" method="POST" class="space-y-6">
                        @csrf

                        @if ($errors->any())
                            <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-400 rounded">
                                <ul class="list-disc pl-5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div>
                            <x-input-label for="name" :value="__('Nom Complet')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Adresse Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" />
                        </div>

                        <div>
                            <x-input-label for="adresse" :value="__('Adresse')" />
                            <x-text-input id="adresse" name="adresse" type="text" class="mt-1 block w-full" />
                        </div>

                        <div>
                            <x-input-label for="telephone" :value="__('Téléphone')" />
                            <x-text-input id="telephone" name="telephone" type="tel" class="mt-1 block w-full" />
                        </div>

                        <div>
                            <x-input-label for="password" :value="__('Mot de passe')" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" />
                        </div>

                        <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
