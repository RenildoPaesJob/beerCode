<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Planos') }}
        </h2>
    </x-slot>

    <div class="flex md:flex-col sm:justify-center items-center sm:pt-0">
        <div class="w-full md:max-w-2xl mt-6 px-2 py-4 overflow-hidden">
            <form action="{{ route('plano.store') }}" method="post" class="flex flex-col gap-y-4 p-2 md:p-0">
                @csrf

                <div>
                    <x-input-label
						for="name"
						:value="__('Nome')"
					/>
                    <x-text-input
						id="name"
						class="block mt-1 w-full"
						type="text"
						name="name"
						placeholder="{{ __('Hard Plan') }}"
					/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label
						for="short_description"
						:value="__('Pequena Descrição')"
					/>
                    <x-text-input
						id="short_description"
						class="block mt-1 w-full"
						type="text"
                        name="short_description"
						placeholder="{{ __('Hard Plan to you') }}"
					/>
                    <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
                </div>

                <div>
                    <x-input-label
						for="price"
						:value="__('Preço (em centavos)')"
					/>
                    <x-text-input
						id="price"
						class="block mt-1 w-full"
						type="text"
						name="price"
						placeholder="{{ __('2990') }}"
					/>
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label
					for="cod"
					:value="__('Cod Plano')"
				/>
				<x-text-input
					id="cod"
					class="block mt-1 w-full"
					type="text"
					name="cod"
					placeholder="{{ __('AM456') }}"
				/>
                    <x-input-error :messages="$errors->get('cod')" class="mt-2" />
                </div>

                <hr>

                <div class="flex mt-6 justify-center">
                    <x-secondary-button x-on:click="$dispatch('close')" class="flex justify-center w-full text-center">
                        {{ __('Cancelar') }}
                    </x-secondary-button>

                    <x-primary-button class="ms-3 flex justify-center w-full text-center">
                        {{ __('Salvar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
