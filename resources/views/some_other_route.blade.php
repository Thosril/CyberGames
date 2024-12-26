<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Vos forfaits') }}
                    </h2>
                    <ul>
                        @forelse (Auth::user()->forfaits as $forfait)
                            <li>{{ $forfait->nom }} - {{ $forfait->prix }} €</li>
                        @empty
                            <li>Aucun forfait acheté</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

</x-app-layout>
