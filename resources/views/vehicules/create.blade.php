<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un nouveau véhicule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('vehicules.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="immatriculation" class="block text-sm font-medium text-gray-700">{{ __('Immatriculation') }}</label>
                            <input type="text" name="immatriculation" id="immatriculation" value="{{ old('immatriculation') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @error('immatriculation')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="marque" class="block text-sm font-medium text-gray-700">{{ __('Marque') }}</label>
                            <input type="text" name="marque" id="marque" value="{{ old('marque') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('marque')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="modele" class="block text-sm font-medium text-gray-700">{{ __('Modèle') }}</label>
                            <input type="text" name="modele" id="modele" value="{{ old('modele') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('modele')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="statu" class="block text-sm font-medium text-gray-700">{{ __('Statut') }}</label>
                            <select name="statu" id="statu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="">{{ __('Sélectionner un statut') }}</option>
                                <option value="disponible" {{ old('statu') == 'disponible' ? 'selected' : '' }}>{{ __('Disponible') }}</option>
                                <option value="en_maintenance" {{ old('statu') == 'en_maintenance' ? 'selected' : '' }}>{{ __('En maintenance') }}</option>
                                <option value="en_panne" {{ old('statu') == 'en_panne' ? 'selected' : '' }}>{{ __('En panne') }}</option>
                                <option value="en_trajet" {{ old('statu') == 'en_trajet' ? 'selected' : '' }}>{{ __('En trajet') }}</option>
                                <option value="hors_service" {{ old('statu') == 'hors_service' ? 'selected' : '' }}>{{ __('Hors service') }}</option>
                            </select>
                            @error('statu')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('vehicules.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Annuler') }}
                            </a>
                            <button type="submit" class="ms-4 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Ajouter le Véhicule') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
