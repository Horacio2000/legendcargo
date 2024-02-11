@extends('staff.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Créer un colis</h2>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('courier.store') }}" method="POST" id="form">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="mb-2 text-uppercase">Informations sur l'expéditeur<hr></h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="sender_name" style="text-transform: uppercase;"><strong>Nom de l'expéditeur&nbsp;<span class="mark">*</span></strong></label>
                                            <input class="form-control form-control-lg" type="text" id="sender_name" name="sender_name" value="{{ old('sender_name') }}" placeholder="Nom de l'expéditeur">
                                            <input type="hidden" name="sender_branch_id" value="{{ Auth::user()->branch_id }}">
                                            <input type="hidden" name="sender_branch_staff_id" value="{{ Auth::user()->id }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="sender_phone" style="text-transform: uppercase;"><strong>Téléphone de l'expéditeur&nbsp;<span class="mark">*</span></strong></label>
                                            <input class="form-control form-control-lg" type="text" id="sender_phone" name="sender_phone" value="{{ old('sender_phone') }}" placeholder="Téléphone de l'expéditeur">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="sender_email" style="text-transform: uppercase;"><strong>E-mail de l'expéditeur</strong></label>
                                            <input class="form-control form-control-lg" type="text" name="sender_email" value="{{ old('sender_email') }}" placeholder="E-mail de l'expéditeur">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="sender_address" style="text-transform: uppercase;"><strong>Adresse de l'expéditeur&nbsp;</strong></label>
                                            <textarea class="form-control  form-control-lg" rows="1" name="sender_address" placeholder="Adresse de l'expéditeur">{{ old('sender_address') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="mb-2 text-uppercase">Informations sur le destinataire<hr></h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="receiver_branch_id" style="text-transform: uppercase;"><strong>Succursale destinataire&nbsp;<span class="mark">*</span></strong></label>
                                            <select class="form-control form-control-lg" name="receiver_branch_id" id="receiver_branch_id">
                                                @foreach($branchList as $branch)
                                                <option value="{{ $branch->id }}" {{ old('receiver_branch_id')==$branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="receiver_name" style="text-transform: uppercase;"><strong>Nom du destinataire&nbsp;<span class="mark">*</span></strong></label>
                                            <input class="form-control form-control-lg mb-3" type="text" id="receiver_name" name="receiver_name" value="{{ old('receiver_name') }}" placeholder="Nom du destinataire">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="receiver_phone" style="text-transform: uppercase;"><strong>Téléphone du destinataire&nbsp;<span class="mark">*</span></strong></label>
                                            <input class="form-control form-control-lg mb-3" type="text" id="receiver_phone" name="receiver_phone" value="{{ old('receiver_phone') }}" placeholder="Téléphone du destinataire">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="receiver_email" style="text-transform: uppercase;"><strong>Email du destinataire</strong></label>
                                            <input class="form-control form-control-lg mb-3" type="text" name="receiver_email" value="{{ old('receiver_email') }}" placeholder="Email du destinataire">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="receiver_address" style="text-transform: uppercase;"><strong>Adresse du destinataire&nbsp;</strong></label>
                                            <textarea class="form-control  form-control-lg" rows="1" name="receiver_address" placeholder="Adresse du destinataire">{{ old('receiver_address') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="mb-2 text-uppercase">Détails du colis<hr></h3>
                                <div id="courierDetailsRow" class="courierDetailsRow">
                                    <div class="RowDiv_0">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="shipment_mode" class="text-uppercase"><strong>Type d'expédition&nbsp;<span class="mark">*</span></strong></label>
                                                    <select class="form-control form-control-lg shipment_mode requiredSK" name="shipment_mode[]" id="shipment_mode_0" onchange="updateCourierTypes(this, 0)">

                                                        <option value="">Type</option>
                                                        @foreach($shipmentModes as $mode)
                                                        <option value="{{ $mode->id }}">{{ $mode->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="courier_type" class="text-uppercase"><strong>Type de colis&nbsp;<span class="mark">*</span></strong></label>
                                                    <select class="form-control form-control-lg courier_type requiredSK" name="courier_type[]" id="courier_type_0" onchange="courier_type(0)">
                                                        <option value="">Type</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-2">
                                                <label for="courier_quantity" class="text-uppercase"><strong>Quantité&nbsp;<span class="mark">*</span></strong></label>
                                                <div class="input-group input-group-lg">
                                                    <input class="form-control courier_quantity_0 courier_quantity requiredSK" min="0.1" max="300" step="0.1" type="number" name="courier_quantity[]" disabled onchange="courier_quantity(0)" onkeyup="courier_quantity(0)"  placeholder="Quantité">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="unit_0"><i class="fas fa-balance-scale"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="row no-gutters">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="courier_fee" class="text-uppercase"><strong>Frais du colis&nbsp;<span class="mark">*</span></strong></label>
                                                            <input class="form-control form-control-lg mb-3 courier_fee_0 courier_fee" max="300" type="text" readonly=""  name="courier_fee[]" placeholder="Frais du colis">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 pt-3">
                                                        <div id="rate_0" class="text-info font-weight-bold pt-4" style="font-size:14px;">&nbsp;</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="btnAddNewRow" name="btnAddNewRow" class="btn btn-primary float-right"><i class="fa fa-plus"></i>&nbsp;Ajouter nouveau</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Créer un nouveau colis</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
@section('script')

<script type="text/javascript">
    $("#receiver_branch_id").select2({
        theme: "bootstrap"
    });
    $("#home").addClass("active");
    $("#siddebar").addClass("toggled");
    $("form").submit(function (e) {
        if ($('#sender_name').val() == '') {
            e.preventDefault();
            toastr.error("Le champ du nom de l'expéditeur est obligatoire");
        }
        if ($('#sender_phone').val() == '') {
            e.preventDefault();
            toastr.error("Le champ téléphone de l'expéditeur est obligatoire");
        }
        if ($('#receiver_name').val() == '') {
            e.preventDefault();
            toastr.error("Le champ du nom du destinataire est obligatoire");
        }
        if ($('#receiver_phone').val() == '') {
            e.preventDefault();
            toastr.error("Le champ téléphone du destinataire est obligatoire");
        }
        $(".courier_type").each(function () {
            if ($(this).val() === '') {
                toastr.error("Le champ type de colis est obligatoire");
            }
        });
        $(".shipment_mode").each(function () {
            if ($(this).val() === '') {
                toastr.error("Le champ type d'expédition est obligatoire");
            }
        });
        $(".courier_quantity").each(function () {
            if ($(this).val() === '') {
                toastr.error("Le champ de quantité de colis est requis");
            }
        });

    });
    function courier_type(id) {
        $(".courier_quantity_" + id).val('');
        $(".courier_fee_" + id).val('');
        $("#rate_" + id).html('');
        let shipmentMode = $("#shipment_mode_" + id).val();
        let
        unit = $("#courier_type_" + id).find(':selected').data('unit');
        let
        price = $("#courier_type_" + id).find(':selected').data('price');
        let
        currency = $("#courier_type_" + id).find(':selected').data('currency');

        $("#unit_" + id).html(unit);

        let minQuantity = shipmentMode == 2 ? 0.05 : 1;
        let step = shipmentMode == 2 ? 0.01 : 1;

        $(".courier_quantity_" + id).attr("min", minQuantity);
        $(".courier_quantity_" + id).attr("step", step);
        // Mode aerien
        if (shipmentMode == 1) {
            $("#rate_" + id).html(`&nbsp; [ 1 ${unit} = ${price} ${currency}]`);
        }
        // Mode maritime
        else if (shipmentMode == 2) {
            $("#rate_" + id).html(`&nbsp; [ 0.1 ${unit} = ${price} ${currency}]`);
        }
                if ($('#courier_type_' + id).val() == '') {
            $(".courier_quantity_" + id).attr("disabled", true);
            $("#rate_" + id).html('');
            $("#unit_" + id).html('<i class="fas fa-balance-scale"></i>');
        }
        if ($('#courier_type_' + id).val()) {
            $(".courier_quantity_" + id).removeAttr("disabled");
        }
    }
    function courier_quantity(id) {

        let quantity = parseFloat($(".courier_quantity_" + id).val());
        let
        price = $("#courier_type_" + id).find(':selected').data('price');
        let shipmentMode = $("#shipment_mode_" + id).val();
        let courierFee;

        if (shipmentMode == 1) {
            // mode aerien
            courierFee = quantity * price;
        } else if (shipmentMode == 2) {
            // mode maritime
            if (quantity <= 4) {

                courierFee = 260000; // Exemple de calcul pour quantité <= 4 CBM
            } else {
                courierFee = 250000; // Exemple de calcul pour quantité > 4 CBM
            }
        } else {
            // Valeur de mode d'expédition non valide
            courierFee = 0;
        }

        $(".courier_fee_" + id).val(courierFee);
    }

    function updateCourierTypes(selectElement, courierTypeId) {
    var courierTypeSelect = document.getElementById('courier_type_' + courierTypeId);
    courierTypeSelect.innerHTML = '<option value="">Type</option>';

    var selectedShipmentModeId = selectElement.value;

    if (selectedShipmentModeId) {
        @foreach($courierTypeList as $courierType)
        if ('{{ $courierType->shipment_mode_id }}' === selectedShipmentModeId) {
            var option = document.createElement('option');
            option.value = '{{ $courierType->id }}';
            option.textContent = '{{ $courierType->name }}';

            option.setAttribute('data-price', '{{ $courierType->price }}');
            option.setAttribute('data-currency', '{{ $gs->base_currency }}');
            option.setAttribute('data-unit', '{{ $courierType->unit->name }}');
            option.setAttribute('data-shipment', '{{ $courierType->shipmentMode->name }}');

            courierTypeSelect.appendChild(option);
        }
        @endforeach
    }
}


</script>
<script type="text/javascript">
    $(document).ready(function () {

        var id = 0;
        $("#btnAddNewRow").click(function () {
            var flag = 0;
            $(".courier_type").each(function () {
                if ($(this).val() === '') {
                    flag++;
                    $(this).addClass("is-invalid");
                    toastr.error("Le type de colis est obligatoire");
                }
            });
            $(".courier_quantity").each(function () {
                if ($(this).val() === '') {
                    flag++;
                    $(this).addClass("is-invalid");
                    toastr.error("La quantité de colis est requise");
                }
            });

            var fieldHTML = '';
            if (flag === 0) {
                id++;
                fieldHTML += '<div id="element_' + id + '">';
                fieldHTML += '<div class="clearfix"></div>';
                fieldHTML += '<div class="RowDiv_' + id + '">';
                fieldHTML += '<div class="row">';
                fieldHTML += '<div class="col-lg-3">';
                fieldHTML += '<div class="form-group">';
                fieldHTML += '<select class="form-control form-control-lg requiredSK shipment_mode" name="shipment_mode[]" onchange="updateCourierTypes(this, ' + id + ')" id="shipment_mode_' + id + '" >';
                fieldHTML += '<option value="">Type d\'expédition</option>';
                fieldHTML += '@foreach($shipmentModes as $mode)';
                fieldHTML += '<option value="{{ $mode->id }}" >{{ $mode->name }}</option>';
                fieldHTML += '@endforeach';
                fieldHTML += '</select>';
                fieldHTML += '</div>';
                fieldHTML += '</div>';
                fieldHTML += '<div class="col-lg-2">';
                fieldHTML += '<div class="form-group">';
                fieldHTML += '<select class="form-control form-control-lg requiredSK courier_type" name="courier_type[]" id="courier_type_' + id + '" onchange="courier_type(' + id + ')">';
                fieldHTML += '<option value="">Type</option>';
                fieldHTML += '@foreach($courierTypeList as $courierType)';
                fieldHTML += '<option value="{{ $courierType->id }}" data-price="{{ $courierType->price }}" data-currency="{{ $gs->base_currency }}" data-unit="{{ $courierType->unit->name }}" >{{ $courierType->name }}</option>';
                fieldHTML += '@endforeach';
                fieldHTML += '</select>';
                fieldHTML += '</div>';
                fieldHTML += '</div>';
                fieldHTML += '<div class="col-lg-2">';
                fieldHTML += '<div class="input-group input-group-lg">';
                fieldHTML += '<input class="form-control courier_quantity_' + id + ' courier_quantity requiredSK" min="0.1" max="300" step="0.1" type="number" name="courier_quantity[]" disabled onchange="courier_quantity(' + id + ')" onkeyup="courier_quantity(' + id + ')" placeholder="Quantité">';
                fieldHTML += '<div class="input-group-prepend">';
                fieldHTML += '<span class="input-group-text" id="unit_' + id + '"></span>';
                fieldHTML += '</div>';
                fieldHTML += '</div>';
                fieldHTML += '</div>';
                fieldHTML += '<div class="col-lg-5">';
                fieldHTML += '<div class="row no-gutters">';
                fieldHTML += '<div class="col-lg-6">';
                fieldHTML += '<div class="form-group">';
                fieldHTML += '<input class="form-control form-control-lg mb-3 courier_fee_' + id + ' courier_fee" type="text" readonly=""  name="courier_fee[]" placeholder="Frais du colis">';
                fieldHTML += '</div>';
                fieldHTML += '</div>';
                fieldHTML += '<div class="col-lg-4 pt-2">';
                fieldHTML += '<div id="rate_' + id + '" class="text-info font-weight-bold" style="font-size:14px;">&nbsp;</div>';
                fieldHTML += '</div>';
                fieldHTML += '<div class="col-lg-1">';
                fieldHTML += '<a href="javascript:void(0)" onclick="removeElement(' + id + ')"><span id="remove_' + id + '"><i class="far fa-times-circle fa-2x" style="color:red; border-radius:50%; margin-left:5px; margin-top: 5px;"></i></span></a>';
                fieldHTML += '</div>';
                fieldHTML += '</div>';
                fieldHTML += '</div>';
                fieldHTML += '</div>';
                fieldHTML += '</div>';
                fieldHTML += '</div>';
                fieldHTML += '</div>';
                fieldHTML += '</div>';
                $("#courierDetailsRow").append(fieldHTML);
            }
        });
    });
    function removeElement(id) {
        var set_id = "#element_" + id;
        if (id > 0) {
            $(set_id).remove();
        }
    }
    $(document).on("keyup change focusout", ".requiredSK", function () {
        if ($(this).val() == '') {
            $(this).addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid");
        }
    });
</script>
@endsection
