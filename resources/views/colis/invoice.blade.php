@extends('_layouts.master')

@section('content')
<div class="p-4">
    <h2 class="mb-4 text-uppercase">Facture du colis<hr></h2>
    <div class="card">
      <div id="printDiv">
        <div class="card-header">
          <div class="flex justify-between">
            <div class="w-1/2">
              <strong>No de facture : {{ $courierInfo->invoice_id }}</strong>
            </div>
            <div class="w-1/2">
              <span class="float-right">
                <strong>Statut:&nbsp;&nbsp;</strong>
                @if($courierInfo->status == 'Non reçu')
                <span class="inline-block px-3 py-1 text-white bg-red-500">{{ $courierInfo->status }}</span>
                @else
                <span class="inline-block px-3 py-1 text-white bg-green-500">{{ $courierInfo->status }}</span>
                @endif
              </span>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="container">
            <div class="text-center mb-4">
              <div class="grid grid-cols-3 gap-4">
                <div class="barcode col-span-1">
                  {!! $code !!}
                </div>
                <div class="col-span-1">
                  <strong style="font-size:18px;">
                    <img src="{{ asset('images/logo-legend.jpg') }}" alt="Legend Cargo logo" height="40" width="180">
                  </strong>
                </div>
                <div class="col-span-1">
                  <strong>Date de réception :</strong>
                  <p style="font-size:16px;">{{ $courierInfo->created_at->toDateString() }}</p>
                </div>
              </div>
            </div>
            <hr>
          </div>
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="col-span-1">
              <h6 class="mb-2">Détails de l'expéditeur:</h6>
              <div><strong>Nom&nbsp;&nbsp;&nbsp;&nbsp;:</strong>&nbsp;{{ $courierInfo->sender_name }}</div>
              @if($courierInfo->sender_email)
              <div><strong>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>&nbsp;{{ $courierInfo->sender_email }}</div>
              @endif
              <div><strong>Téléphone&nbsp;&nbsp;&nbsp;&nbsp;:</strong>&nbsp;{{ $courierInfo->sender_phone }}</div>
              @if($courierInfo->sender_address)
              <div><strong>Adresse&nbsp;:</strong>&nbsp;{!! $courierInfo->sender_address !!}</div>
              @endif
            </div>
            <div class="col-span-1">
              <h6 class="mb-2">Détails du destinataire:</h6>
              <div><strong>Nom&nbsp;&nbsp;&nbsp;&nbsp;:</strong>&nbsp;{{ $courierInfo->receiver_name }}</div>
              @if($courierInfo->receiver_email)
              <div><strong>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>&nbsp;{{ $courierInfo->receiver_email }}</div>
              @endif
              <div><strong>Téléphone&nbsp;&nbsp;&nbsp;&nbsp;:</strong>&nbsp;{{ $courierInfo->receiver_phone }}</div>
              @if($courierInfo->receiver_address)
              <div><strong>Adresse&nbsp;:</strong>&nbsp;{{ $courierInfo->receiver_address }}</div>
              @endif
            </div>
          </div>
          <div class="container">
            <div class="table-responsive-sm">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Type de colis</th>
                    <th>Date d'envoi</th>
                    <th>Quantité de colis</th>
                    <th>Frais du colis</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($courierProductInfoList as $key=>$courierProductInfo)
                  <tr>
                    <td class="text-center">{{ $key+1 }}</td>
                    <td class="text-left">{{ $courierProductInfo->courier_types->name ?? 'N/A' }}</td>
                    <td class="text-right">{{ $courierProductInfo->created_at->toDateTimeString() }}</td>
                    <td class="text-right">{{ $courierProductInfo->courier_quantity }}&nbsp;{{ $courierProductInfo->courier_types->unit->name ?? 'n/a' }}</td>
                    <td class="text-center fee">{{ $courierProductInfo->courier_fee }} {{ $gs->base_currency_symbol }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="grid grid-cols-2">
              <div class="col-span-1"></div>
              <div class="col-span-1 ml-auto">
                <table class="table table-clear">
                  <tbody>
                    <tr>
                      <td class="text-left">
                        <strong>Total</strong>
                      </td>
                      <td class="text-right">
                        <strong><span class="totalPrice">450</span> {{ $gs->base_currency_symbol }}</strong>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-left">
                        <strong>Statut du paiement</strong>
                      </td>
                      <td class="text-right">
                        @if($courierInfo->payment_status == 'Non payé')
                        <strong><span class="" style="color: red;">{{ $courierInfo->payment_status }}</span></strong>
                        @elseif ($courierInfo->payment_status == 'Payé')
                        <strong><span class="" style="color: green;">{{ $courierInfo->payment_status }}</span></strong>
                        @endif
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-1 mb-2 ml-2">
        <div class="container">
          <button type="button" onclick="printDiv();" value="print" class="btn btn-info razu"><i class="fa fa-print"></i>&nbsp;Imprimer le colis</button>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
    $("#home").addClass("active");
    $(document).ready(function () {
        totalPrice = 0;
        $(".fee").each(function () {
            totalPrice += parseInt($(this).html());
        });
        $(".totalPrice").text(totalPrice);
    });

    function printDiv()
    {

        var divToPrint = document.getElementById('printDiv');
        var newWin = window.open('', 'Print-Window');
        newWin.document.open();
        newWin.document.write('<html><head><title> LegendCargo | Service de livraison de colis</title></head>');
        newWin.document.write('<body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
        newWin.document.write('<link rel="stylesheet" href="{{asset('assets/user/css/bootstrap.min.css')}}">');
        newWin.document.close();
        setTimeout(function () {
            newWin.close();
        }, 1000);

    }
</script>
@endsection

