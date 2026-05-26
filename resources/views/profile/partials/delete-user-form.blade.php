<section class="space-y-6 font-sans">
    <header>
        <h2 class="text-lg font-bold text-red-600">
            Eliminar Cuenta
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Una vez que se elimine su cuenta, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminar su cuenta, por favor descargue cualquier dato o información que desee conservar del inventario.
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="inline-flex items-center px-6 py-2 bg-red-600 border border-transparent rounded-md font-bold text-white tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm transform hover:-translate-y-0.5"
    >
        Eliminar Cuenta
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 font-sans">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-gray-900">
                ¿Está seguro de que desea eliminar su cuenta?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Una vez que se elimine su cuenta, todos sus recursos y datos se eliminarán permanentemente. Por favor, ingrese su contraseña para confirmar que desea eliminar su cuenta de forma permanente.
            </p>

            <div class="mt-6">
                <label for="password" class="sr-only">Contraseña</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 border-gray-300 rounded-md focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50 transition-colors"
                    placeholder="Ingrese su contraseña"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-bold text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition ease-in-out duration-150">
                    Cancelar
                </button>

                <button type="submit" class="inline-flex items-center px-6 py-2 bg-red-600 border border-transparent rounded-md font-bold text-white tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm transform hover:-translate-y-0.5">
                    Eliminar Definitivamente
                </button>
            </div>
        </form>
    </x-modal>
</section>