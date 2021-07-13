
<div x-data="{
        ShowSubscribe : false,
        ShowSuccess: false,
        }"
        class="flex flex-col w-screen h-screen bg-indigo-900 ">
        <nav class="container flex justify-between pt-5 mx-auto text-indigo-200">
            <a href="/" class="text-4xl font-bold">
                <x-application-logo  class="w-16 h-16 fill-current"></x-application-logo>
            </a>
            <div class="flex justify-end">
                <!--validacion en caso de que el usuario este logeado se ir al dashboard-->
                @auth
                    <a href ="{{route('dashboard')}}">Dashboard</a>
                @else
                    <a href ="{{route('login')}}">Login</a>
                @endauth
            </div>
        </nav>
        <div class="container flex items-center h-full mx-auto">
            <div class="flex flex-col items-start w-1/3">
                <h1 class="mb-4 text-5xl font-bold leading-tight text-white">
                    Pagina simple para suscribirse
                </h1>
                <p class="mb-10 text-xl text-indigo-200">
                    Probando la <span class="font-bold underline">TALL </span> stack para este curso, quieres suscribirte?
                </p>
                <x-button x-on:click="ShowSubscribe = true" class="px-8 py-3 bg-red-500 hover:bg-red-600">
                    Suscribir
                </x-button>
            </div>
        </div>
        <x-modal class="bg-pink-500"  trigger="ShowSubscribe">
            <p class="text-5xl font-extrabold text-center text-white">
                Hagamoslo!
            </p>
            <form class="flex flex-col items-center p-24"
                    wire:submit.prevent="subscribe"
            >
                <x-input wire:model='email' class="px-5 py-3 border border-blue-400 w-80" type="email" name="email" placeholder="tu correo">
                </x-input>
                <span class="text-xs text-gray-100">
                    <!-- mostrar error variable email -->
                    {{
                        $errors->has('email')
                        #detalle del error
                        ? $errors -> first('email')
                        #en caso de no tener error
                        : 'Te enviaremos un correo'
                    }}
                </span>
                <x-button class="justify-center px-5 py-3 mt-5 bg-blue-500 w-80">Enviar</x-button>
            </form>
        </x-modal>
        <x-modal class="bg-green-500" trigger="ShowSuccess">
            <p class="font-extrabold text-center text-white text-9xl animate-pulse">
                &check;
            </p>
            <p class="mt-16 text-5xl font-extrabold text-center text-white">
                Genial!
            </p>
            <p class="text-3xl text-center text-white ">
                Nos vemos en tu mail!
            </p>
        </x-modal>
</div>


