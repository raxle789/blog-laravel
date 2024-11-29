<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100" data-theme="fantasy">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full antialiased">
    <div class="min-h-full">
        <x-navbar></x-navbar>

        <x-header>{{ $headerTitle }}</x-header>

        <main>
            {{ $slot }}
            {{-- <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8"> --}}
            <!-- Your content -->
            {{-- <button class="btn btn-secondary mb-5">Button</button> --}}
            {{-- <div class="card bg-base-100 w-96 shadow-xl">
                    <figure>
                        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                            alt="Shoes" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">Shoes!</h2>
                        <p>If a dog chews shoes whose shoes does he choose?</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary">Buy Now</button>
                        </div>
                    </div>
                </div> --}}
            {{-- </div> --}}
            {{-- <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <!-- Open the modal using ID.showModal() method -->
                <button class="btn" onclick="my_modal_2.showModal()">open modal</button>
                <dialog id="my_modal_2" class="modal">
                    <div class="modal-box">
                        <h3 class="text-lg font-bold">Hello!</h3>
                        <p class="py-4">Press ESC key or click outside to close</p>
                    </div>
                    <form method="dialog" class="modal-backdrop">
                        <button>close</button>
                    </form>
                </dialog>
            </div> --}}
        </main>
    </div>
</body>

</html>
