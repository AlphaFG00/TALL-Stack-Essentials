<x-app-layout>
    <!--5.- crear la vista-->
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>
                        Subscribers
                    </p>
                    <!--validar que haya registros en subscribers-->
                    @if ($subscribers->isEmpty())
                        <div class="flex w-full p-5 bg-red-100 rounded-lg">
                            <p class="text-red-400">no hay suscriptores</p>
                        </div>
                    @else
                        <table class="w-full">
                            <thead
                                class="text-indigo-600 border-b-2 border-gray-300"
                            >
                                <tr>
                                    <th class="px-6 py-3 text-left">Email</th>
                                    <th class="px-6 py-3 text-left">Verification</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribers as $subscriber)
                                    <tr class="pt-4 pb-4 text-sm text-indigo-900 border-b border-gray-900">
                                        <td class="">
                                            {{ $subscriber->email }}
                                        </td>
                                        <td>
                                            {{ optional($subscriber->email_verified_at)->diffForHumans() ?? 'no verificado' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
