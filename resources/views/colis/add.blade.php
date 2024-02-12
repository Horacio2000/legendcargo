@extends('_layouts.master')

@section('body')
    <div class="p-2">
        <h2 class="mb-4 text-xl font-bold text-blue">Nouveau colis</h2>
        <div class="mb-4">
            <div class="bg-white rounded shadow-sm p-4">
                <form action="{{ route('colis.store') }}" method="POST" id="form">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <div class="bg-white rounded shadow-sm p-4">
                                <h3 class="mb-4 font-bold text-xl">Informations sur l'expéditeur</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label for="sender_name" class="text-sm font-semibold">Nom <span
                                                class="mark">*</span></label>
                                        <input class="text-sm form-input w-full p-2 rounded-lg border-gray-300"
                                            type="text" id="sender_name" name="sender_name"
                                            value="{{ Auth::user()->name . ' ' . Auth::user()->firstname ?? old('sender_name') }}"
                                            placeholder="Nom de l'expéditeur">

                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    </div>
                                    <div>
                                        <label for="sender_phone" class="text-sm font-semibold">Téléphone <span
                                                class="mark">*</span></label>
                                        <input class="text-sm form-input w-full p-2 rounded-lg border-gray-300"
                                            type="text" id="sender_phone" name="sender_phone"
                                            value="{{ Auth::user()->phone ?? old('sender_phone') }}"
                                            placeholder="Téléphone de l'expéditeur">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="sender_email" class="text-sm font-semibold">E-mail</label>
                                        <input class="text-sm form-input w-full p-2 rounded-lg border-gray-300"
                                            type="text" name="sender_email"
                                            value="{{ Auth::user()->email ?? old('sender_email') }}"
                                            placeholder="E-mail de l'expéditeur">
                                    </div>
                                    <div>
                                        <label for="sender_address" class="text-sm font-semibold">Adresse </label>
                                        <textarea class="text-sm form-textarea w-full p-2 rounded-lg border-gray-300" rows="1" name="sender_address"
                                            placeholder="Adresse de l'expéditeur">{{ old('sender_address') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="bg-white rounded shadow-sm p-4">
                                <h3 class="mb-4 text-xl font-bold">Informations sur le destinataire</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label for="receiver_branch_id" class="text-sm font-semibold">Entrepôt
                                            destinataire<span class="mark">*</span></label>
                                        <select class="text-sm form-select w-full p-2 rounded-lg border-gray-300"
                                            name="receiver_branch_id" id="receiver_branch_id">
                                            <option value="">Sélectionnez l'Entrepôt</option>
                                            @foreach ($branchList as $branch)
                                                <option value="{{ $branch->id }}">
                                                    {{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="receiver_name" class="text-sm font-semibold">Nom du destinataire <span
                                                class="mark">*</span></label>
                                        <input class="text-sm form-input w-full p-2 rounded-lg border-gray-300"
                                            type="text" id="receiver_name" name="receiver_name"
                                            value="{{ old('receiver_name') }}" placeholder="Nom du destinataire">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
                                    <div>
                                        <label for="receiver_phone" class="text-sm font-semibold">Téléphone du destinataire
                                            <span class="mark">*</span></label>
                                        <input class="text-sm form-input w-full p-2 rounded-lg border-gray-300"
                                            type="text" id="receiver_phone" name="receiver_phone"
                                            value="{{ old('receiver_phone') }}" placeholder="Téléphone du destinataire">
                                    </div>
                                    <div>
                                        <label for="receiver_email" class="text-sm font-semibold">Email du
                                            destinataire</label>
                                        <input class="text-sm form-input w-full p-2 rounded-lg border-gray-300"
                                            type="text" name="receiver_email" value="{{ old('receiver_email') }}"
                                            placeholder="Email du destinataire">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1">
                                    <div>
                                        <label for="receiver_address" class="text-sm font-semibold">Adresse du
                                            destinataire</label>
                                        <textarea class="text-sm form-textarea w-full p-2 rounded-lg border-gray-300" rows="1" name="receiver_address"
                                            placeholder="Adresse du destinataire">{{ old('receiver_address') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="bg-white rounded shadow-sm p-4">
                            <h3 class="mb-4 font-bold text-xl">Détails du colis</h3>
                            <div id="courierDetailsRow" class="courierDetailsRow">
                                <div class="RowDiv_0">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <label for="shipment_mode" class="text-sm font-semibold">Type d'expédition
                                                <span class="mark">*</span></label>
                                            <select
                                                class="text-sm form-select w-full p-2 rounded-lg border-gray-300 shipment_mode requiredSK"
                                                name="shipment_mode[]" id="shipment_mode_0"
                                                onchange="updateCourierTypes(this, 0)">
                                                <option value="">Type</option>
                                                @foreach($shipmentModes as $mode)
                                                <option value="{{ $mode->id }}">{{ $mode->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label for="courier_type" class="text-sm font-semibold">Type de colis <span
                                                    class="mark">*</span></label>
                                            <select
                                                class="text-sm form-select w-full p-2 rounded-lg border-gray-300 courier_type requiredSK"
                                                name="courier_type[]" id="courier_type_0" onchange="courier_type(0)">
                                                <option value="">Type</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid grid-col-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="courier_content" class="text-sm font-semibold">Contenu du colis<span
                                                    class="mark">*</span></label>
                                            <input class="text-sm form-input w-full p-2 rounded-lg border-gray-300 requiredSK" type="text" id="courier_content" name="courier_content"
                                             placeholder="" >
                                        </div>
                                        <div>
                                        <label for="courier_article_number" class="text-sm font-semibold">Quantité<span
                                                    class="mark">*</span></label>
                                            <input class="text-sm form-input w-full p-2 rounded-lg border-gray-300 requiredSK" type="number" id="courier_article_number" name="courier_article_number"
                                             placeholder="Saisissez le nombre d'articles">
                                        </div>
                                    </div>
                                    <div class="grid grid-col-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="courier_price" class="text-sm font-semibold">Prix d'achat(CFA)<span
                                                    class="mark">*</span></label>
                                            <input class="text-sm form-input w-full p-2 rounded-lg border-gray-300 requiredSK" type="number" id="courier_price" name="courier_price"
                                             placeholder="">
                                        </div>
                                        <div>
                                        <label for="courier_date_sent" class="text-sm font-semibold">Date d'envoi<span
                                                    class="mark">*</span></label>
                                            <input class="text-sm form-input w-full p-2 rounded-lg border-gray-300 requiredSK" type="date" id="courier_date_sent" name="courier_date_sent"
                                             placeholder="Date d'envoi du colis à notre adresse" >
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="courier_quantity" class="text-sm  font-semibold">Mesure(Poids du colis) <span
                                                    class="mark">*</span></label>
                                            <div class="flex justify-between items-center">
                                                <div class="w-full pr-2">
                                                    <input
                                                        class="text-sm form-input w-full p-2 rounded-lg border-gray-300 courier_quantity_0 courier_quantity requiredSK"
                                                        min="0.1" max="300" step="0.1" type="number"
                                                        name="courier_quantity[]" disabled onchange="courier_quantity(0)"
                                                        onkeyup="courier_quantity(0)" placeholder="Poids du colis">
                                                </div>
                                                <div>
                                                   <div> <span class="input-group-text" id="unit_0"><i
                                                    class="fa fa-balance-scale" aria-hidden="true"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label for="courier_fee" class="text-sm font-semibold">Frais du colis
                                                        <span class="mark">*</span></label>
                                                    <input
                                                        class="text-sm form-input w-full p-2 rounded-lg border-gray-300 mb-3 courier_fee_0 courier_fee"
                                                        max="300" type="text" readonly name="courier_fee[]"
                                                        placeholder="Frais du colis">
                                                </div>
                                                <div class="pt-3">
                                                    <div id="rate_0" class="text-xs text-info font-bold pt-4"
                                                        style="font-size:14px;">&nbsp;</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="btnAddNewRow" name="btnAddNewRow"
                                class="bg-blue2 hover:bg-blue2 text-white py-2 px-4 rounded-md text-sm float-right"><i
                                    class="fa fa-plus"></i> Ajouter nouveau</button>
                        </div>
                    </div>
                    <div class="flex justify-center mt-8">
                        <button type="submit"
                            class="bg-blue hover:bg-blue2 text-white w-full py-2 px-4 rounded-md text-sm">Créer un nouveau
                            colis</button>
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
document.addEventListener('DOMContentLoaded', function() {
    var id = 0;
    document.getElementById('btnAddNewRow').addEventListener('click', function() {
        var flag = 0;
        document.querySelectorAll('.courier_type').forEach(function(element) {
            if (element.value === '') {
                flag++;
                element.classList.add('is-invalid');
                toastr.error('Le type de colis est obligatoire');
            }
        });
        document.querySelectorAll('.courier_quantity').forEach(function(element) {
            if (element.value === '') {
                flag++;
                element.classList.add('is-invalid');
                toastr.error('La quantité de colis est requise');
            }
        });

        var fieldHTML = '';
        if (flag === 0) {
            id++;
            fieldHTML += '<div id="element_' + id + '">';
            fieldHTML += '<div class="clearfix"></div>';
            fieldHTML += '<div class="RowDiv_' + id + '">';
            fieldHTML += '<div class="grid grid-cols-1 md:grid-cols-2 gap-4">';
            fieldHTML += '<div class="">';
            fieldHTML += '<select class="text-sm form-select w-full p-2 rounded-lg border-gray-300 shipment_mode requiredSK" name="shipment_mode[]" onchange="updateCourierTypes(this, ' + id + ')" id="shipment_mode_' + id + '" >';
            fieldHTML += '<option value="">Type d\'expédition</option>';
            fieldHTML += '@foreach($shipmentModes as $mode)';
            fieldHTML += '<option value="{{ $mode->id }}" >{{ $mode->name }}</option>';
            fieldHTML += '@endforeach';
            fieldHTML += '</select>';
            fieldHTML += '</div>';
            fieldHTML += '<div class="">';
            fieldHTML += '<select class="text-sm form-select w-full p-2 rounded-lg border-gray-300 courier_type requiredSK" name="courier_type[]" id="courier_type_' + id + '" onchange="courier_type(' + id + ')">';
            fieldHTML += '<option value="">Type</option>';
            fieldHTML += '@foreach($courierTypeList as $courierType)';
            fieldHTML += '<option value="{{ $courierType->id }}" data-price="{{ $courierType->price }}" data-currency="{{ $gs->base_currency }}" data-unit="{{ $courierType->unit->name }}" >{{ $courierType->name }}</option>';
            fieldHTML += '@endforeach';
            fieldHTML += '</select>';
            fieldHTML += '</div>';
            fieldHTML += '<div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">';
            fieldHTML += '<div class="flex items-center justify-between w-full">';
            fieldHTML += '<div class="w-full pr-2">';
            fieldHTML += '<input class="text-sm form-input w-full p-2 rounded-lg border-gray-300 courier_quantity_' + id + ' courier_quantity requiredSK" min="0.1" max="300" step="0.1" type="number" name="courier_quantity[]" disabled onchange="courier_quantity(' + id + ')" onkeyup="courier_quantity(' + id + ')" placeholder="Quantité">';
            fieldHTML += '</div>';
            fieldHTML += '<div class="">';
            fieldHTML += '<span class="input-group-text" id="unit_' + id + '"><i class="fa fa-balance-scale" aria-hidden="true"></i></span>';
            fieldHTML += '</div>';
            fieldHTML += '</div>';
            fieldHTML += '</div>';
            fieldHTML += '<div class="grid grid-cols-1 md:grid-cols-3 gap-4">';
            //fieldHTML += '<div class="flex items-center justify-between w-full">';
            fieldHTML += '<div class="w-full">';
            fieldHTML += '<input class="text-sm form-input w-full p-2 rounded-lg border-gray-300 mb-3 courier_fee_' + id + ' courier_fee" type="text" readonly=""  name="courier_fee[]" placeholder="Frais du colis">';
            fieldHTML += '</div>';
            fieldHTML += '<div class="px-1">';
            fieldHTML += '<div id="rate_' + id + '" class="text-info font-bold text-xs" style="font-size:14px;">&nbsp;</div>';
            fieldHTML += '</div>';
            fieldHTML += '<div class="pl-4">';
            fieldHTML += '<a href="javascript:void(0)" onclick="removeElement(' + id + ')"><span id="remove_' + id + '"><i class="fa fa-trash" aria-hidden="true" style="color:red; border-radius:50%;"></i></span></a>';
            fieldHTML += '</div>';
            //fieldHTML += '</div>';
            fieldHTML += '</div>';
            fieldHTML += '</div>';
            fieldHTML += '</div>';
            fieldHTML += '</div>';
            $("#courierDetailsRow").append(fieldHTML);
        }
    });

    function removeElement(id) {
        var set_id = "#element_" + id;
        if (id > 0) {
            $(set_id).remove();
        }
    }

    document.addEventListener('keyup', function(event) {
        if (event.target.classList.contains('requiredSK')) {
            if (event.target.value === '') {
                event.target.classList.add('is-invalid');
            } else {
                event.target.classList.remove('is-invalid');
            }
        }
    });
});
</script>
@endsection
