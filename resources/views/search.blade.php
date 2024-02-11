@extends('_layouts.master')

@section('body')
<div class="container mx-auto p-4">
    <h2 class="text-2xl mb-4">Suivi des colis et des livraisons</h2>
    <div class="bg-white rounded-lg shadow-md p-4">
      <form action="{{ route('showColis') }}" method="POST">
        @csrf
        <div class="flex flex-col md:flex-row md:items-center">
          <div class="w-full md:w-3/4 mb-4 md:mb-0 md:mr-4">
            <input id="tracking_number" name="tracking_number" type="text" placeholder="Entrez le numéro de suivi" class="form-input w-full" value="{{ request()->tracking_number }}">
          </div>
          <div class="w-full md:w-1/4">
            <button type="submit" class="bg-blue text-white px-4 py-2 rounded-md hover:bg-blue-600 block md:inline-block">Rechercher</button>
          </div>
        </div>
      </form>
    </div>
  </div>

@endsection
