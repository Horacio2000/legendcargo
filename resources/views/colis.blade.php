@extends('_layouts.master')

@section('body')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-2xl font-bold">Liste des colis</h2>
      <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Ajouter</button>
    </div>
    <form>
      <div class="mb-4">
        <input type="text" class="w-48 py-2 px-4 rounded-md" placeholder="Recherche">
        <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md ml-2">Rechercher</button>
      </div>
    </form>
    <div class="flex flex-col mt-8">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Type d'expédition</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">N° Suivi</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Net à payer</th>

                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                1
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">Aérien</div>

                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">AX999292DHDH26</div>

                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Non reçu</span>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">10000 FCFA</td>


                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>

@endsection
