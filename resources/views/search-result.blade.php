@extends('_layouts.master')

@section('body')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-2xl font-bold">Résultat de la recherche</h2>
    </div>
    <div class="flex flex-col mt-8">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">N° Suivi</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Nom de l'expéditeur</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Tél de l'expéditeur</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Nom du destinataire</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Tél du destinataire</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Position</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Net à payer</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Statut du paiement</th>

                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @if($courier)
                        <tr>

                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{ App\Models\CourierProductInfo::where('courier_info_id', $courier->id)->first()->courier_code }}</div>

                            </td>

                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-sm leading-5 text-gray-500"> {{ $courier->sender_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-sm leading-5 text-gray-500">{{ $courier->sender_phone }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-sm leading-5 text-gray-500">{{ $courier->receiver_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-sm leading-5 text-gray-500">{{ $courier->receiver_phone }}</td>

                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                                @if ($courier->status == "Non reçu")
                                <span class="px-4 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">{{ $courier->status }}</span>
                                @else
                                <span class="px-4 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $courier->status }}</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-sm leading-5 text-gray-500">{{ $courier->payment_balance }} FCFA</td>

                            <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                                @if ($courier->payment_status == "Non payé")
                                <span class="px-4 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">{{ $courier->payment_status }}</span>
                                @elseif ($courier->payment_status == " Payé")
                                <span class="px-4 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $courier->payment_status }}</span>
                                @endif
                            </td>


                        </tr>
                        @else
                            <tr>
                                <td colspan="8" class="text-center">Aucune Information</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>

@endsection
