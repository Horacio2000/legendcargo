<x-app-layout>
    <section class="bg-cover bg-center h-96 bg-gray-900 text-white py-16 px-4 sm:px-6 lg:px-8"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/02.jpg') }}')"
        data-aos="fade-up">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col-reverse md:flex-row items-center justify-between mt-8">
                <div class="md:w-1/2" data-aos="fade-right">
                    <h1 class="text-3xl sm:text-5xl font-extrabold my-8">Comment fonctionne Legend Cargo ?</h1>

                </div>
            </div>
        </div>
    </section>
    <section class="py-12 md:py-20 bg-white px-4" data-aos="fade-up">
        <h3 class="text-center text-xl sm:text-4xl font-bold mb-8 text-blue">Comment fonctionne LegendCargo ?</h3>
        <div class="flex flex-wrap justify-center">
            <!-- Étape 1: Création de compte -->
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <div class="text-center">
                    <i class="fa fa-user text-4xl text-blue2 mx-auto mb-4"></i>
                    <h3 class="text-lg font-semibold mb-2">Création de compte</h3>
                    <p class="text-gray-600">Inscrivez-vous pour accéder à notre système de gestion des colis.</p>
                </div>
            </div>

            <!-- Étape 2: Téléchargement des adresses des entrepôts -->
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <div class="text-center">
                    <i class="fas fa-download text-4xl text-blue2 mx-auto mb-4"></i>
                    <h3 class="text-lg font-semibold mb-2"> Téléchargement des adresses</h3>
                    <p class="text-gray-600">Téléchargez les adresses de nos entrepôts pour faciliter l'enregistrement
                        de vos colis.</p>
                </div>
            </div>

            <!-- Étape 3: Enregistrement du colis -->
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <div class="text-center">
                    <i class="fa-solid fa-box text-4xl text-blue2 mx-auto mb-4"></i>
                    <h3 class="text-lg font-semibold mb-2">Enregistrement du colis</h3>
                    <p class="text-gray-600">Enregistrez les détails de votre colis dans notre système.</p>
                </div>
            </div>

            <!-- Étape 4: Suivi du colis -->
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <div class="text-center">
                    <i class="fa-solid fa-map-location text-4xl text-blue2 mx-auto mb-4"></i>
                    <h3 class="text-lg font-semibold mb-2">Suivi du colis</h3>
                    <p class="text-gray-600">Suivez l'emplacement et l'état de votre colis en temps réel.</p>
                </div>
            </div>

            <!-- Étape 5: Confirmation du colis et retrait du colis -->
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <div class="text-center">
                    <i class="fa-solid fa-check-double text-4xl text-blue2 mx-auto mb-4"></i>
                    <h3 class="text-lg font-semibold mb-2">Confirmation du colis</h3>
                    <p class="text-gray-600">Confirmez la livraison du colis.</p>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <div class="text-center">
                    <i class="fa-solid fa-boxes-packing text-4xl text-blue2 mx-auto mb-4"></i>
                    <h3 class="text-lg font-semibold mb-2">Retrait du colis</h3>
                    <p class="text-gray-600">Retirez votre colis dans l'un de nos points de
                        retrait.</p>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
