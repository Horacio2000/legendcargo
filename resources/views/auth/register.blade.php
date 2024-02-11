<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="text-center mt-2 font-bold text-xl sm:text-3xl mb-8">S'enregistrer</div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Firstname -->
        <div class="mt-4">
            <x-input-label for="firstname" :value="__('Prénom')" />
            <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')"
                required autofocus autocomplete="firstname" />
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmez le mot de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Country -->
        <div class="mt-4">
            <x-input-label for="country" :value="__('Pays / région')" />
            <select
                class="block w-full mt-1 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="country" name="country" required>
                <option value="" disabled selected>Sélectionnez un pays</option>
                <option value="AF">Afghanistan</option>
                <option value="AL">Albanie</option>
                <option value="DZ">Algérie</option>
                <option value="AD">Andorre</option>
                <option value="AO">Angola</option>
                <option value="AI">Anguilla</option>
                <option value="AQ">Antarctique</option>
                <option value="AG">Antigua-et-Barbuda</option>
                <option value="AR">Argentine</option>
                <option value="AM">Arménie</option>
                <option value="AW">Aruba</option>
                <option value="AU">Australie</option>
                <option value="AT">Autriche</option>
                <option value="AZ">Azerbaïdjan</option>
                <option value="BS">Bahamas</option>
                <option value="BH">Bahreïn</option>
                <option value="BD">Bangladesh</option>
                <option value="BB">Barbade</option>
                <option value="BY">Bélarus</option>
                <option value="BE">Belgique</option>
                <option value="BZ">Belize</option>
                <option value="BJ">Bénin</option>
                <option value="BM">Bermudes</option>
                <option value="BT">Bhoutan</option>
                <option value="BO">Bolivie</option>
                <option value="BQ">Bonaire, Saint-Eustache et Saba</option>
                <option value="BA">Bosnie-Herzégovine</option>
                <option value="BW">Botswana</option>
                <option value="BV">Île Bouvet</option>
                <option value="BR">Brésil</option>
                <option value="IO">Territoire britannique de l'océan Indien</option>
                <option value="BN">Brunéi Darussalam</option>
                <option value="BG">Bulgarie</option>
                <option value="BF">Burkina Faso</option>
                <option value="BI">Burundi</option>
                <option value="CV">Cap-Vert</option>
                <option value="KH">Cambodge</option>
                <option value="CM">Cameroun</option>
                <option value="CA">Canada</option>
                <option value="KY">Îles Caïmans</option>
                <option value="CF">République centrafricaine</option>
                <option value="TD">Tchad</option>
                <option value="CL">Chili</option>
                <option value="CN">Chine</option>
                <option value="CX">Île Christmas</option>
                <option value="CC">Îles Cocos (Keeling)</option>
                <option value="CO">Colombie</option>
                <option value="KM">Comores</option>
                <option value="CG">Congo</option>
                <option value="CD">République démocratique du Congo</option>
                <option value="CK">Îles Cook</option>
                <option value="CR">Costa Rica</option>
                <option value="HR">Croatie</option>
                <option value="CU">Cuba</option>
                <option value="CW">Curaçao</option>
                <option value="CY">Chypre</option>
                <option value="CZ">République tchèque</option>
                <option value="DK">Danemark</option>
                <option value="DJ">Djibouti</option>
                <option value="DM">Dominique</option>
                <option value="DO">République dominicaine</option>
                <option value="EC">Équateur</option>
                <option value="EG">Égypte</option>
                <option value="SV">El Salvador</option>
                <option value="GQ">Guinée équatoriale</option>
                <option value="ER">Érythrée</option>
                <option value="EE">Estonie</option>
                <option value="ET">Éthiopie</option>
                <option value="FK">Îles Malouines</option>
                <option value="FO">Îles Féroé</option>
                <option value="FJ">Fidji</option>
                <option value="FI">Finlande</option>
                <option value="FR">France</option>
                <option value="GF">Guyane française</option>
                <option value="PF">Polynésie française</option>
                <option value="TF">Terres australes et antarctiques françaises</option>
                <option value="GA">Gabon</option>
                <option value="GM">Gambie</option>
                <option value="GE">Géorgie</option>
                <option value="DE">Allemagne</option>
                <option value="GH">Ghana</option>
                <option value="GI">Gibraltar</option>
                <option value="GR">Grèce</option>
                <option value="GL">Groenland</option>
                <option value="GD">Grenade</option>
                <option value="GP">Guadeloupe</option>
                <option value="GU">Guam</option>
                <option value="GT">Guatemala</option>
                <option value="GG">Guernesey</option>
                <option value="GN">Guinée</option>
                <option value="GW">Guinée-Bissau</option>
                <option value="GY">Guyana</option>
                <option value="HT">Haïti</option>
                <option value="HM">Îles Heard et McDonald</option>
                <option value="VA">Saint-Siège</option>
                <option value="HN">Honduras</option>
                <option value="HK">Hong Kong</option>
                <option value="HU">Hongrie</option>
                <option value="IS">Islande</option>
                <option value="IN">Inde</option>
                <option value="ID">Indonésie</option>
                <option value="IR">Iran</option>
                <option value="IQ">Irak</option>
                <option value="IE">Irlande</option>
                <option value="IM">Île de Man</option>
                <option value="IL">Israël</option>
                <option value="IT">Italie</option>
                <option value="JM">Jamaïque</option>
                <option value="JP">Japon</option>
                <option value="JE">Jersey</option>
                <option value="JO">Jordanie</option>
                <option value="KZ">Kazakhstan</option>
                <option value="KE">Kenya</option>
                <option value="KI">Kiribati</option>
                <option value="KP">Corée du Nord</option>
                <option value="KR">Corée du Sud</option>
                <option value="KW">Koweït</option>
                <option value="KG">Kirghizistan</option>
                <option value="LA">Laos</option>
                <option value="LV">Lettonie</option>
                <option value="LB">Liban</option>
                <option value="LS">Lesotho</option>
                <option value="LR">Libéria</option>
                <option value="LY">Libye</option>
                <option value="LI">Liechtenstein</option>
                <option value="LT">Lituanie</option>
                <option value="LU">Luxembourg</option>
                <option value="MO">Macao</option>
                <option value="MK">Macédoine du Nord</option>
                <option value="MG">Madagascar</option>
                <option value="MW">Malawi</option>
                <option value="MY">Malaisie</option>
                <option value="MV">Maldives</option>
                <option value="ML">Mali</option>
                <option value="MT">Malte</option>
                <option value="MH">Îles Marshall</option>
                <option value="MQ">Martinique</option>
                <option value="MR">Mauritanie</option>
                <option value="MU">Maurice</option>
                <option value="YT">Mayotte</option>
                <option value="MX">Mexique</option>
                <option value="FM">Micronésie</option>
                <option value="MD">Moldavie</option>
                <option value="MC">Monaco</option>
                <option value="MN">Mongolie</option>
                <option value="ME">Monténégro</option>
                <option value="MS">Montserrat</option>
                <option value="MA">Maroc</option>
                <option value="MZ">Mozambique</option>
                <option value="MM">Myanmar</option>
                <option value="NA">Namibie</option>
                <option value="NR">Nauru</option>
                <option value="NP">Népal</option>
                <option value="NL">Pays-Bas</option>
                <option value="NC">Nouvelle-Calédonie</option>
                <option value="NZ">Nouvelle-Zélande</option>
                <option value="NI">Nicaragua</option>
                <option value="NE">Niger</option>
                <option value="NG">Nigéria</option>
                <option value="NU">Niué</option>
                <option value="NF">Île Norfolk</option>
                <option value="MP">Îles Mariannes du Nord</option>
                <option value="NO">Norvège</option>
                <option value="OM">Oman</option>
                <option value="PK">Pakistan</option>
                <option value="PW">Palaos</option>
                <option value="PS">Palestine, État de</option>
                <option value="PA">Panama</option>
                <option value="PG">Papouasie-Nouvelle-Guinée</option>
                <option value="PY">Paraguay</option>
                <option value="PE">Pérou</option>
                <option value="PH">Philippines</option>
                <option value="PN">Îles Pitcairn</option>
                <option value="PL">Pologne</option>
                <option value="PT">Portugal</option>
                <option value="PR">Porto Rico</option>
                <option value="QA">Qatar</option>
                <option value="RE">Réunion</option>
                <option value="RO">Roumanie</option>
                <option value="RU">Russie</option>
                <option value="RW">Rwanda</option>
                <option value="BL">Saint-Barthélemy</option>
                <option value="SH">Sainte-Hélène, Ascension et Tristan da Cunha</option>
                <option value="KN">Saint-Christophe-et-Niévès</option>
                <option value="LC">Sainte-Lucie</option>
                <option value="MF">Saint-Martin (partie française)</option>
                <option value="PM">Saint-Pierre-et-Miquelon</option>
                <option value="VC">Saint-Vincent-et-les-Grenadines</option>
                <option value="WS">Samoa</option>
                <option value="SM">Saint-Marin</option>
                <option value="ST">Sao Tomé-et-Principe</option>
                <option value="SA">Arabie saoudite</option>
                <option value="SN">Sénégal</option>
                <option value="RS">Serbie</option>
                <option value="SC">Seychelles</option>
                <option value="SL">Sierra Leone</option>
                <option value="SG">Singapour</option>
                <option value="SX">Saint-Martin (partie néerlandaise)</option>
                <option value="SK">Slovaquie</option>
                <option value="SI">Slovénie</option>
                <option value="SB">Îles Salomon</option>
                <option value="SO">Somalie</option>
                <option value="ZA">Afrique du Sud</option>
                <option value="GS">Géorgie du Sud-et-les Îles Sandwich du Sud</option>
                <option value="SS">Soudan du Sud</option>
                <option value="ES">Espagne</option>
                <option value="LK">Sri Lanka</option>
                <option value="SD">Soudan</option>
                <option value="SR">Suriname</option>
                <option value="SJ">Svalbard et Jan Mayen</option>
                <option value="SZ">Eswatini</option>
                <option value="SE">Suède</option>
                <option value="CH">Suisse</option>
                <option value="SY">Syrie</option>
                <option value="TW">Taïwan</option>
                <option value="TJ">Tadjikistan</option>
                <option value="TZ">Tanzanie</option>
                <option value="TH">Thaïlande</option>
                <option value="TL">Timor-Leste</option>
                <option value="TG">Togo</option>
                <option value="TK">Tokelau</option>
                <option value="TO">Tonga</option>
                <option value="TT">Trinité-et-Tobago</option>
                <option value="TN">Tunisie</option>
                <option value="TR">Turquie</option>
                <option value="TM">Turkménistan</option>
                <option value="TC">Îles Turques-et-Caïques</option>
                <option value="TV">Tuvalu</option>
                <option value="UG">Ouganda</option>
                <option value="UA">Ukraine</option>
                <option value="AE">Émirats arabes unis</option>
                <option value="GB">Royaume-Uni</option>
                <option value="US">États-Unis</option>
                <option value="UY">Uruguay</option>
                <option value="UZ">Ouzbékistan</option>
                <option value="VU">Vanuatu</option>
                <option value="VE">Venezuela</option>
                <option value="VN">Vietnam</option>
                <option value="VG">Îles Vierges britanniques</option>
                <option value="VI">Îles Vierges des États-Unis</option>
                <option value="WF">Wallis-et-Futuna</option>
                <option value="EH">Sahara occidental</option>
                <option value="YE">Yémen</option>
                <option value="ZM">Zambie</option>
                <option value="ZW">Zimbabwe</option>
            </select>

        </div>

        <!-- City -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('Ville')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"
                required autofocus autocomplete="city" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Téléphone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <input type="hidden" value="Customer" name="role">

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Déja enregistré?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __("S'inscrire") }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
