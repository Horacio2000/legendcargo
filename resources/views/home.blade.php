<x-app-layout>
    <section class="py-12 md:py-24 h-148 overflow-hidden" data-aos="fade-up"
        style="background: linear-gradient(to right, rgb(253, 219, 145), rgb(255, 181, 71) 99%);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:flex lg:justify-between">
                <div class="lg:w-1/2">
                    <h2 class="text-4xl leading-10 font-bold text-blue sm:text-3xl sm:leading-none md:text-5xl">
                        Bienvenue sur <br>Legend Cargo

                    </h2>
                    <p class="mt-4 text-xl text-blue2">Suivez facilement vos colis en quelques clics.</p>
                    <div class="mt-8 sm:flex">
                        <div class="rounded-md shadow">
                            <a href="{{ route('register') }}"
                                class="flex items-center justify-center w-full px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">Créer
                                un compte</a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="https://www.facebook.com/legendcargoafrique"
                                class="flex items-center justify-center w-full px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">En
                                savoir plus</a>
                        </div>
                    </div>
                </div>
                <div class="mt-12 lg:mt-0 lg:w-1/2 flex items-center justify-center">
                    <div class="h-full w-full">
                        <img class="h-full w-full object-cover object-center rounded-lg"
                            src="{{ asset('images/1.png') }}" alt="Image de suivi de colis">
                    </div>
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

    <section class="py-8">
        <div class="container mx-auto px-4" data-aos="fade-up">
            <h2 class="text-xl sm:text-3xl font-bold text-center mb-8 text-blue">Pourquoi nous choisir ?</h2>
            <p class="text-center mb-8">
                Chez <span class="font-bold">LegendCargo</span>, nous nous efforçons de fournir le meilleur service de
                livraison pour répondre à vos besoins. Nous comprenons l'importance de la rapidité, de la sécurité et
                d'un excellent service client et nous sommes déterminés à offrir une expérience de livraison
                exceptionnelle.
            </p>
            <div class="grid gap-6 grid-cols-1 md:grid-cols-2">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-shipping-fast text-3xl text-blue2"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-blue2">Livraison rapide</h3>
                    <p class="text-gray-600">Nous assurons une livraison rapide de vos colis pour une expérience sans
                        stress.</p>
                </div>


                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-lock text-3xl text-blue2"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-blue2">Sécurité garantie</h3>
                    <p class="text-gray-600">La sécurité de vos colis est notre priorité. Nous utilisons des mesures de
                        sécurité avancées pour protéger vos envois.</p>
                </div>


                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-headphones text-3xl text-blue2"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-blue2">Service clientèle réactif</h3>
                    <p class="text-gray-600">Notre équipe de service clientèle est disponible pour répondre à toutes vos
                        questions et préoccupations.</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-clock text-3xl text-blue2"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-blue2">Suivi en temps réel</h3>
                    <p class="text-gray-600">Restez informé de l'emplacement de vos colis grâce à notre système de suivi
                        en temps réel. Vous pouvez suivre vos envois du début à la fin, en toute transparence.</p>
                </div>

            </div>
        </div>
    </section>

    <section class="py-8 bg-white">
        <div class="container mx-auto px-4">
            <div class="md:flex md:items-center">
                <div class="md:w-1/2 flex flex-col" data-aos="fade-right">
                    <h2 class="text-2xl sm:text-3xl font-bold text-left mb-8">Expédier avec Legend Cargo</h2>
                    <p class="text-gray-600 leading-7">Envoyez votre colis depuis la Chine vers le Bénin à partir de
                        8000F CFA seulement. Nous proposons des solutions logistiques complètes via notre service
                        d'expédition depuis la Chine, avec un ramassage de colis disponible dans plus de 60 villes à
                        travers la Chine. Avec Legend Cargo, envoyer des colis depuis la Chine n'a jamais été aussi
                        simple et faites livrer votre envoi depuis la Chine en seulement 10 jours.</p>

                    <a href="{{ route('login') }}"
                        class="w-72 mt-8 flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">Suivre
                        un colis</a>
                </div>
                <div class="md:w-1/2 flex justify-center mt-8 md:mt-0" data-aos="fade-left">
                    <div class="flex items-end">
                        <img src="{{ asset('images/5.png') }}" alt="Image" class="max-w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="flex justify-center">
        <div class="max-w-2xl w-full px-4" data-aos="fade-up">
            <h2 class="text-2xl sm:text-4xl font-bold text-center mb-6 pt-8">Nos Tarifs de livraison Chine - Bénin</h2>

            <div class="flex flex-wrap justify-center">
                <!-- Mode aérien -->
                <div class="bg-white rounded-lg shadow-lg p-6 m-4 flex flex-col ">
                    <h3 class="text-xl font-bold mb-4 text-blue">Mode aérien</h3>

                    <!-- Articles normaux -->
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold mb-2">Articles normaux</h4>
                        <ul class="list-disc pl-3">
                            <li>Prix : 8000FCFA / Kg</li>
                            <li>Tous les articles en dehors des autres catégories</li>
                            <li>Vêtements</li>
                            <li>Chaussures</li>
                            <li>Articles quotidiens</li>
                        </ul>
                    </div>

                    <!-- Articles spéciaux -->
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold mb-2">Articles spéciaux</h4>
                        <ul class="list-disc pl-3">
                            <li>Prix : 9000FCFA / Kg</li>
                            <li>Liquides, poudres et articles à batterie</li>
                            <li>Liquides</li>
                            <li>Cosmétiques</li>
                            <li>Articles à batterie</li>
                        </ul>
                    </div>

                    <!-- Téléphones -->
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold mb-2">Téléphones</h4>
                        <p>Prix : 10000FCFA / Kg</p>
                    </div>

                    <!-- Tablettes -->
                    <div>
                        <h4 class="text-lg font-semibold mb-2">Tablettes</h4>
                        <p>Prix : 12000FCFA / Kg</p>
                        <p class="mt-8 font-bold">Délai de livraison : 10 à 15 jours</p>
                    </div>
                </div>

                <!-- Mode maritime -->
                <div class="bg-white rounded-lg shadow-lg p-6 m-4 flex flex-col">
                    <h3 class="text-xl font-bold mb-4 text-blue">Mode maritime</h3>
                    <p>Prix : 260000F CFA de 0,05 jusqu'à 4 CBM</p>
                    <p>Prix : 250000F CFA à partir de 5CBM</p>
                    <p class="font-bold">Délai : 6 à 8 semaines</p>
                    <p>Minimum comptable : 0,05 CBM</p>
                </div>
            </div>
            <div class="flex items-center justify-center my-4 ">
                <i class="fas fa-hand-point-right text-blue-300 mr-2"></i>
                <p class="font-bold text-blue-300">
                    Chez <strong class="text-black">Legend Cargo</strong>, nous n'expédions pas les produits pharmaceutiques !!!
                </p>
            </div>


        </div>
    </div>

    <section class="bg-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-6 py-10" id="contact">
                <!-- Contact Info -->
                <div class="flex-1">
                    <div class="text-2xl sm:text-3xl font-bold">Contactez-nous</div>
                    <p class="mt-2">Avez-vous une préoccupation particulière ? Contactez-nous directement ou remplissez le formulaire et faites-nous savoir comment nous pouvons vous aider.</p>
                    <div class="text-xl font-bold mt-6">Contact</div>
                    <div class="mt-4">
                        <!--<p>
                            <i class="fa fa-map-marker-alt"></i>
                        </p>-->
                        <p class="mb-2">
                            <i class="fa fa-phone"></i> +86 13724831507
                        </p>
                        <p class="mb-2">
                            <i class="fa fa-envelope"></i><a href="mailto:contact@legendecargo.com"> contact@legendecargo.com</a>
                        </p>
                        <p class="mt-4">
                            <a href="https://www.facebook.com/legendcargoafrique" class="text-blue-400 mr-2 text-3xl"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-purple-500 mr-2 text-3xl"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-blue-400 text-3xl"><i class="fab fa-linkedin"></i></a>
                        </p>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="flex-1 shadow-lg p-5 rounded-lg bg-white">
                    <form class="space-y-4">
                        <div class="form-group">
                            <label class="text-lg font-bold">Nom</label>
                            <input type="text" class="form-input w-full rounded-md" placeholder="Entrez votre nom">
                        </div>
                        <div class="form-group">
                            <label class="text-lg font-bold">Email</label>
                            <input type="email" class="form-input w-full rounded-md" placeholder="Entrez votre email">
                        </div>
                        <div class="form-group">
                            <label class="text-lg font-bold">Message</label>
                            <textarea class="form-textarea w-full rounded-md" rows="4" placeholder="Saisissez votre message"></textarea>
                        </div>
                        <button type="submit" class="shadow bg-blue-300 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </section>



</x-app-layout>
