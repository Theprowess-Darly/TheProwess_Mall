<x-guest-layout>
    <div class="fixed inset-0 bg-cover bg-center -z-10" style="background-image: url('{{ asset('images/background.jpg') }}');"></div>        
    <div class="w-full sm:max-w-md px-2 py-4 bg-white/70 shadow-md overflow-hidden sm:rounded-lg">
        <div class=" flex flex-col bg-white/70  sm:justify-center items-center sm:pt-0 relative z-10">
            <div class="w-24 h-24 mb-4">
                <img loading="lazy" src="{{ asset('images/logos/tpmlogo.png') }}" alt="TPM Logo" class="w-full h-full">
            </div>
        </div> 
        <h2 class="text-center text-2xl font-bold text-green-950 mb-6">{{ __('Créer un compte') }}</h2>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nom')" class="text-green-950" />
                <x-text-input id="name" class="block mt-1 w-full border-green-950 focus:border-yellow-700 focus:ring-yellow-700" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="text-green-950" />
                <x-text-input id="email" class="block mt-1 w-full border-green-950 focus:border-yellow-700 focus:ring-yellow-700" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Two columns layout for Phone and Town -->
            <div class="mt-4 flex space-x-4">
                <div class="w-1/2">
                    <x-input-label for="phone" :value="__('Téléphone')" class="text-green-950" />
                    <x-text-input id="phone" class="block mt-1 w-full border-green-950 focus:border-yellow-700 focus:ring-yellow-700" type="text" name="phone" :value="old('phone')" autocomplete="tel" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
                <div class="w-1/2">
                    <x-input-label for="town" :value="__('Ville')" class="text-green-950" />
                    <x-text-input id="town" class="block mt-1 w-full border-green-950 focus:border-yellow-700 focus:ring-yellow-700" type="text" name="town" :value="old('town')" autocomplete="address-level2" />
                    <x-input-error :messages="$errors->get('town')" class="mt-2" />
                </div>
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Adresse')" class="text-green-950" />
                <x-text-input id="address" class="block mt-1 w-full border-green-950 focus:border-yellow-700 focus:ring-yellow-700" type="text" name="address" :value="old('address')" autocomplete="street-address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- Two columns layout for Password fields -->
            <div class="mt-4 flex space-x-4">
                <div class="w-1/2">
                    <x-input-label for="password" :value="__('Mot de passe')" class="text-green-950" />
                    <x-text-input id="password" class="block mt-1 w-full border-green-950 focus:border-yellow-700 focus:ring-yellow-700"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="w-1/2">
                    <x-input-label for="password_confirmation" :value="__('Confirmer')" class="text-green-950" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border-green-950 focus:border-yellow-700 focus:ring-yellow-700"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>
            {{-- acepter la politique de confidentialité --}}
            <div class="mt-4">
                <label for="terms" class="inline-flex items-center">
                    <input id="terms" type="checkbox" class="rounded border-green-950 text-yellow-700 shadow-sm focus:ring-yellow-700" name="terms" required>
                    <span class="ml-2 text-sm text-gray-600">
                        {{ __('J\'accepte la') }} 
                        <a href="{{ route('privacy-policy') }}" class="text-yellow-700 hover:underline" target="_blank">{{ __('politique de confidentialité') }}</a>
                        {{ __('et les') }}
                        <a href="{{ route('terms-of-sale') }}" class="text-yellow-700 hover:underline" target="_blank">{{ __('conditions générales de vente') }}</a>
                    </span>
                </label>
                <x-input-error :messages="$errors->get('terms')" class="mt-2" />
            </div>

            <!-- Add this at the bottom of the form, just before the closing </form> tag -->
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">
                    {{ __('Vous êtes un marchand?') }} 
                    <a href="{{ route('vendor.register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        {{ __('Inscrivez-vous ici') }}
                    </a>
                </p>
            </div>
            <div class="flex items-center justify-end mt-6">
                <a class="underline text-sm text-green-950 hover:text-yellow-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-700" href="{{ route('login') }}">
                    {{ __('Déjà inscrit?') }}
                </a>
                <x-primary-button class="ms-4 bg-yellow-700 hover:bg-yellow-800 focus:bg-yellow-800">
                    {{ __('S\'inscrire') }}
                </x-primary-button>
            </div>
        </form>
    </div>
   
</x-guest-layout>
