<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <ol class="dark:text-gray-100">
        <li>Nome: {{ $nameUser }}</li>
        <li>Document: {{ $document }}</li>
        <li>Status da assinatura: {{ $status }}</li>
        <li>Bebida: {{ $params }}</li>
    </ol>
</x-app-layout>
