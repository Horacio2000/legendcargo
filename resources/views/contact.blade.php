<x-app-layout>
    <section class="bg-cover bg-center h-96 bg-gray-900 text-white py-16 px-4 sm:px-6 lg:px-8"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/02.jpg') }}')"
        data-aos="fade-up">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col-reverse md:flex-row items-center justify-between mt-8">
                <div class="md:w-1/2" data-aos="fade-right">
                    <h1 class="text-3xl sm:text-5xl font-extrabold my-8">Nous contactez</h1>

                </div>
            </div>
        </div>
    </section>
    <section class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <img src="{{ asset('images/contact-us.jpg') }}" alt="Contactez Legend Cargo" class="w-full rounded-lg shadow-md">
                </div>
                <div class="md:w-1/2 md:pl-8">
                    <h2 class="text-xl sm:text-3xl font-bold mb-8">Envoyer un message à Legend Cargo</h2>
                    <form class="w-full max-w-lg">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    Nom
                                </label>
                                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Entrez votre nom">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                    Email
                                </label>
                                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Entrez votre email">
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="w-full px-3">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                                    Message
                                </label>
                                <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" rows="5" placeholder="Entrez votre message"></textarea>
                            </div>
                        </div>
                        <div class="md:flex md:items-center">
                            <button class="shadow bg-blue-300 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                Envoyer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
