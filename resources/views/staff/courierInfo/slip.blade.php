@extends('staff.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Reçu du colis<hr></h2>
    <div class="card">
        <div  id="printDiv">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <strong>No Facture :
                            {{ $courierInfo->invoice_id }}
                        </strong>
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
                                <img src="{{asset('images/logo-legend.jpg')}}" alt="Legend Cargo logo" height="40" width="180">
                            </div>
                            <div class="col-md-4">
                                <strong>Date de réception : </strong><p style="font-size:16px;">{{ $courierInfo->created_at->toDateString() }}</p>
                            </div>
                        </div>
                    </div><hr>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4 offset-md-2">
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
                    <div class="col-md-4 offset-md-2">
                        <h6 class="mb-2"> Détails du destinataire :</h6>
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
            </div>
        </div>
        <div class="container mb-2">
            <button type="button" onclick="printDiv();" value="print" class="btn btn-primary razu"><i class="fa fa-print"></i>&nbsp;Imprimer le reçu</button>
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

