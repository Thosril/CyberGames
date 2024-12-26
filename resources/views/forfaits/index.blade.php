@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-center my-6">Forfaits disponibles</h1>
    
    <div class="container mx-auto">
        <div class="row justify-content-center">
            @foreach ($forfaits as $forfait)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg rounded-lg overflow-hidden">
                        <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Forfait Image">
                        <div class="card-body">
                            <h5 class="card-title text-xl font-semibold text-gray-800">{{ $forfait->nom }}</h5>
                            <p class="card-text text-gray-600">{{ $forfait->description }}</p>
                            <p class="text-xl font-bold text-green-600">{{ $forfait->prix }} €</p>
                            <form action="{{ route('forfaits.acheter', $forfait->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="forfait_id" value="{{ $forfait->id }}">
                                <input type="hidden" name="forfait_nom" value="{{ $forfait->nom }}">
                                <input type="hidden" name="forfait_prix" value="{{ $forfait->prix }}">
                                <button type="submit" class="btn btn-primary btn-block py-2 mt-3 w-full text-white font-bold hover:bg-blue-600 transition duration-300">Acheter ce forfait</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
