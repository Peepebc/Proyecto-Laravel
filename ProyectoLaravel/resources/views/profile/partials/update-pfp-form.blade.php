<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Pfp') }}
        </h2>
    </header>

    <form method="post" action="{{ route('pfp.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mt-4">
            <x-input-label for="pfpf" :value="__('Imagen perfil')" />

            <x-text-input id="pfp" class="block mt-1 w-full" type="file"
                name="pfp" autocomplete="" required/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Cambiar Pfp') }}</x-primary-button>
        </div>
    </form>
</section>
