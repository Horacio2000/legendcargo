<x-app-layout>
    <section class="bg-cover bg-center h-96 bg-gray-900 text-white py-16 px-4 sm:px-6 lg:px-8"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/02.jpg') }}')"
        data-aos="fade-up">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col-reverse md:flex-row items-center justify-between mt-8">
                <div class="md:w-1/2" data-aos="fade-right">
                    <h1 class="text-3xl sm:text-5xl font-extrabold my-8">À propos de nous</h1>

                </div>
            </div>
        </div>
    </section>
    <section class="bg-gray-100 py-12" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0" data-aos="fade-right">
                    <img src="{{ asset('images/about.jpg') }}" alt="À propos" class="w-full rounded-lg shadow-md">
                </div>
                <div class="md:w-1/2 md:pl-8">
                    <h2 class="text-2xl sm:text-3xl font-bold mb-4">À propos de Legend Cargo</h2>
                    <p class="text-gray-700 mb-6">
                        Nous sommes une entreprise de Fret, de transit et de logistique intercontinental. Notre
                        réputation se forge à travers le temps par notre professionnalisme exceptionnel ainsi que notre
                        fiabilité à toutes épreuves.
                    </p>
                    <p class="text-gray-700 mb-6">
                        Nous vous offrons notre efficient service de:
                        - Groupage aérien
                        - Groupage maritime de la Chine 🇨🇳 en direction du Bénin, du Burkina-Faso et du Togo à des
                        tarifs défiants toute concurrence.
                    </p>
                    <p class="text-gray-700">
                        Délais d’expédition :<br>
                        - Avion: 7-10 jours<br>
                        - Bateau: 45-50 jours
                    </p>
                    <p class="text-gray-700 mt-4">
                        ATTENTION !!!
                        - La sécurité de vos marchandises est 100% assurée 🔐 <br>

                        - Un nouveau départ de la Chine chaque semaine ✈️⛵ <br>

                        <strong>Contactez notre service clientèle directe ou Whatsapp: +86 13724831507</strong>
                    </p>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
