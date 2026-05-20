<section>
    <header>
        <h2 class="text-lg font-bold text-gray-900">
            Actualizar Contraseña
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Asegúrese de que su cuenta utilice una contraseña larga y aleatoria para mantenerse segura.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6 font-sans">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block font-bold text-sm text-gray-700">Contraseña Actual</label>
            <input id="update_password_current_password" name="current_password" type="password" class="block mt-1 w-full border-gray-300 rounded-md focus:border-amarillo-fuerte focus:ring focus:ring-amarillo-fuerte focus:ring-opacity-50 transition-colors" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-sm text-red-600" />
        </div>

        <div>
            <label for="update_password_password" class="block font-bold text-sm text-gray-700">Nueva Contraseña</label>
            <input id="update_password_password" name="password" type="password" class="block mt-1 w-full border-gray-300 rounded-md focus:border-amarillo-fuerte focus:ring focus:ring-amarillo-fuerte focus:ring-opacity-50 transition-colors" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-sm text-red-600" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block font-bold text-sm text-gray-700">Confirmar Nueva Contraseña</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="block mt-1 w-full border-gray-300 rounded-md focus:border-amarillo-fuerte focus:ring focus:ring-amarillo-fuerte focus:ring-opacity-50 transition-colors" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center px-6 py-2 bg-amarillo-fuerte border border-transparent rounded-md font-bold text-gray-900 tracking-widest hover:bg-amarillo-oscuro focus:bg-amarillo-oscuro active:bg-amarillo-oscuro focus:outline-none focus:ring-2 focus:ring-amarillo-fuerte focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm transform hover:-translate-y-0.5">
                Guardar
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-bold text-green-600 bg-green-50 px-3 py-1 rounded-md"
                >Contraseña actualizada.</p>
            @endif
        </div>
    </form>
</section>