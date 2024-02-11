@extends('manager.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Facture du colis<hr></h2>
    <div class="card">
        <div  id="printDiv">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <strong>Facture No :
                            {{ $courierInfo->invoice_id }}</strong>
                    </div>

                    <div class="col-md-6">
                        <span class="float-right"> <strong>Status:&nbsp;&nbsp;</strong>
                            @if($courierInfo->status  == 'Non reçu')
                            <span class="btn btn-sm btn-danger text-uppercase">{{ $courierInfo->status }}</span>
                            @elseif ($courierInfo->status  == 'Retiré')
                            <span class="btn btn-sm btn-success text-uppercase">{{ $courierInfo->status }}</span>
                            @else
                            <span class="btn btn-sm btn-info text-uppercase">{{ $courierInfo->status }}</span>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="col-md-12 text-center mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                {!! $code !!}
                            </div>
                            <div class="col-md-4">
                                <strong  style="font-size:18px;"> <img src="{{asset('images/logo-legend.jpg')}}" alt="Legend Cargo logo" height="40" width="180"></strong>
                            </div>
                            <div class="col-md-4">
                                <strong>Date de réception : </strong><p style="font-size:16px;">{{ $courierInfo->created_at->toDateString() }}</p>
                            </div>
                        </div>
                    </div><hr>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4 offset-md-2">
                        <h6 class="mb-2">Détails de l'expéditeur :</h6>
                        <div><strong>Nom&nbsp;&nbsp;&nbsp;&nbsp;:</strong>&nbsp;{{ $courierInfo->sender_name }}</div>
                        @if($courierInfo->sender_email)
                        <div><strong>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>&nbsp;{{ $courierInfo->sender_email }}</div>
                        @endif
                        <div><strong>Téléphone&nbsp;&nbsp;&nbsp;&nbsp;:</strong>&nbsp;{{ $courierInfo->sender_phone }}</div>
                        @if($courierInfo->sender_address)
                        <div><strong>Adresse&nbsp;:</strong>&nbsp;{!! $courierInfo->sender_address !!}</div>
                        @endif
                    </div>
                    <div class="col-md-4 offset-md-2">
                        <h6 class="mb-2">Détails du destinataire :</h6>
                        <div><strong>Entrepôt&nbsp;&nbsp;:</strong>&nbsp;{{ $courierInfo->receiver_branch->name }}</div>
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
                                    <th class="center">#</th>
                                    <th>Type de Colis</th>
                                    <th>Date d'envoi</th>
                                    <th>Quantité de Colis</th>
                                    <th>Frais d'expédition</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courierProductInfoList as $key=>$courierProductInfo)
                                <tr>
                                    <td class="center">{{ $key+1 }}</td>
                                    <td class="left">{{ $courierProductInfo->courier_types->name }}</td>
                                    <td class="right">{{ $courierProductInfo->created_at->toDateTimeString() }}</td>
                                    <td class="right">{{ $courierProductInfo->courier_quantity }}&nbsp;{{ $courierProductInfo->courier_types->unit->name }} </td>
                                    <td class="center fee">{{ $courierProductInfo->courier_fee }} {{ $gs->base_currency_symbol }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                        </div>
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong><span class="totalPrice">450</span> {{ $gs->base_currency_symbol }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Statut de paiement</strong>
                                        </td>
                                        <td class="right">
                                            @if($courierInfo->payment_status=='Non payé')
                                            <strong><span class="btn btn-sm btn-danger text-uppercase">{{ $courierInfo->payment_status }}</span></strong>
                                            @else
                                            <strong><span class="btn btn-sm btn-success text-uppercase">{{ $courierInfo->payment_status }}</span></strong>
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
        <div class="row mb-2 ml-2">
            <div class="container">
                <button type="button" onclick="printDiv();" value="print" class="btn btn-info razu"><i class="fa fa-print"></i>&nbsp;Imprimer le colis</button>
                <a href="{{ route('manager.courier.slip',$courierInfo->id) }}" target="_blank"><button class="btn btn-primary"><i class="fa fa-print"></i> Imprimer le reçu</button></a>
                @if($courierInfo->payment_status == 'Non payé')
                <button type="button" class="btn btn-success btn-md delete_button" data-toggle="modal" data-target="#receive{{ $courierInfo->id }}">
                                <i class="fa fa-money-bill-alt"></i>  Effectuer le paiement
                            </button>
                            <div class="modal fade" id="receive{{ $courierInfo->id }}" role="dialog" aria-labelledby="#" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('courier.payment.manager') }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="receive{{ $courierInfo->id }}"><i class="fa fa-download"></i>&nbsp;Effectuer le paiement</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5 class="text-danger text-center font-weight-bold">Veuillez collecter {{ $courierInfo->payment_balance }}&nbsp;{{ $gs->base_currency }}</h5>
                                                <input type="hidden" name="id" value="{{ $courierInfo->id }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-primary">Oui,&nbsp;Payé</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                @endif
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#courierInfo").addClass("show");
    $("#courierInfo li:nth-child(1)").addClass("active");
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
        newWin.document.write('<html><head><title>LegendCargo | Service de livraison de colis</title></head>');
        newWin.document.write('<body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
        newWin.document.write('<link rel="stylesheet" href="{{asset('assets/user/css/bootstrap.min.css')}}">');
        newWin.document.close();
        setTimeout(function () {
            newWin.close();
        }, 1000);

    }
</script>
@endsection

