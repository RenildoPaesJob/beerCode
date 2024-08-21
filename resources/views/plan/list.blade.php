<x-app-layout>
    <x-slot name="header" class="flex">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Planos') }}
        </h2>

		<x-nav-link :href="route('plano.create')" :active="request()->routeIs('plano.create')" class="mt-2 dark:text-zinc-50">
			{{ __('Criar Plano') }}
		</x-nav-link>
    </x-slot>

    <div class="flex md:flex-col sm:justify-center items-center sm:pt-0">
        <div class="w-full md:max-w-2xl mt-6 px-2 py-4 overflow-hidden">
            <table class="table justify-center text-center w-full text-white">
                <thead>
                    <tr class="border-b-2">
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Cod</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($plans)
                        @foreach ($plans as $plan)
                            <tr class="border-b-[1px] border-gray-500">
                                <td>{{ $plan['name'] }}</td>
                                <td>{{ $plan['short_description'] }}</td>
                                <td>{{ $plan['price'] }}</td>
                                <td>{{ $plan['cod'] }}</td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
