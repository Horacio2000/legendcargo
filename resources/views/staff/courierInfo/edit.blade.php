@extends('staff.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Modifier le statut du colis
        <a href="{{ route('courier.index') }}" class="btn btn-primary btn-md float-right">
            <i class="fa fa-list"></i>   Voir le colis
        </a>
    </h2>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('courier.update', $courierInfo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12  container-fluid">
                        <div class="form-group">
                            <input type="hidden" name="courierId" value="{{ $courierInfo->id }}">
                            <label for="code" style="text-transform: uppercase;"><strong>No de suivi &nbsp;<span class="mark">*</span></strong></label>
                            <input class="form-control form-control-lg mb-3" type="text" name="code"  value="{{ $courierInfo->code ?? old('code') }}" placeholder="Code" readonly>
                        </div>
                    </div>
                    <div class="col-md-12  container-fluid">
                        <div class="form-group">
                            <label for="sender_name" style="text-transform: uppercase;"><strong>Nom de l'expéditeur&nbsp;<span class="mark">*</span></strong></label>
                            <input class="form-control form-control-lg mb-3" type="text" name="sender_name"  value="{{ $courierInfo->sender_name ?? old('sender_name') }}" placeholder="Nom de l'expéditeur">
                        </div>
                    </div>
                    <div class="col-md-12  container-fluid">
                        <div class="form-group">
                            <label for="sender_phone" style="text-transform: uppercase;"><strong>Téléphone de l'expéditeur&nbsp;<span class="mark">*</span></strong></label>
                            <input class="form-control form-control-lg mb-3" type="text" name="sender_phone"  value="{{ $courierInfo->sender_phone ?? old('sender_phone') }}" placeholder="Téléphone de l'expéditeur">
                        </div>
                    </div>
                    <div class="col-md-12 container-fluid">
                        <div class="form-group">
                            <label for="receiver_name" style="text-transform: uppercase;"><strong>Nom du destinataire&nbsp;<span class="mark">*</span></strong></label>
                            <input class="form-control form-control-lg mb-3" type="text" name="receiver_name"  value="{{ $courierInfo->receiver_name ?? old('receiver_name') }}" placeholder="Nom du destinataire">
                        </div>
                    </div>
                    <div class="col-md-12 container-fluid">
                        <div class="form-group">
                            <label for="receiver_phone" style="text-transform: uppercase;"><strong>Téléphone du destinataire&nbsp;<span class="mark">*</span></strong></label>
                            <input class="form-control form-control-lg mb-3" type="text" name="receiver_phone"  value="{{ $courierInfo->receiver_phone ?? old('receiver_phone') }}" placeholder="Téléphone du destinataire">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="status" style="text-transform: uppercase;"><strong>Statut du colis</strong></label>
                            <select name="status" id="status" class="form-control">
                                <option value="Non reçu" @if($courierInfo->status == 'Non reçu') selected @endif>Non Reçu</option>
                                <option value="Reçu" @if($courierInfo->status == 'Reçu') selected @endif>Reçu</option>
                                <option value="Chargé" @if($courierInfo->status == 'Chargé') selected @endif>Chargé</option>
                                <option value="Arrivé à destination" @if($courierInfo->status == 'Arrivé à destination') selected @endif>Arrivé à destination</option>
                                <option value="Retiré" @if($courierInfo->status == 'Retiré') selected @endif>Retiré</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Modifier</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
