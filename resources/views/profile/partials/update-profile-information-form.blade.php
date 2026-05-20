<section>
    <header>
        <h2 class="text-lg font-bold text-gray-900">
            Información del Perfil
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Actualice la información del perfil y la dirección de correo electrónico de su cuenta.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 font-sans">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block font-bold text-sm text-gray-700">Nombre</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md focus:border-amarillo-fuerte focus:ring focus:ring-amarillo-fuerte focus:ring-opacity-50 transition-colors" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="block font-bold text-sm text-gray-700">Correo Electrónico</label>
            <input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md focus:border-amarillo-fuerte focus:ring focus:ring-amarillo-fuerte focus:ring-opacity-50 transition-colors" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        Su dirección de correo electrónico no está verificada.

                        <button form="send-verification" class="underline text-sm font-medium text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amarillo-fuerte transition-colors">
                            Haga clic aquí para reenviar el correo de verificación.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            Se ha enviado un nuevo enlace de verificación a su correo electrónico.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center px-6 py-2 bg-amarillo-fuerte border border-transparent rounded-md font-bold text-gray-900 tracking-widest hover:bg-amarillo-oscuro focus:bg-amarillo-oscuro active:bg-amarillo-oscuro focus:outline-none focus:ring-2 focus:ring-amarillo-fuerte focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm transform hover:-translate-y-0.5">
                Guardar
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-bold text-green-600 bg-green-50 px-3 py-1 rounded-md"
                >Guardado.</p>
            @endif
        </div>
    </form>
</section>