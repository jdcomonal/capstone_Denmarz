<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pizza House') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <!-- Fonts -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> --}}
    
    


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen ">

        {{-- @include('layouts.navigation') --}}
       
        @include('layouts.nav')
        @include('layouts.aside')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="">
            {{-- {{ $slot }} --}}
            @yield('content')
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="{{ asset('js/imagePreview.js') }}"></script>
    <script src="{{ asset('js/TableSearch.js') }}"></script>
    @include('sweetalert::alert')

    <!-- Your HTML content above this line -->

    {{-- for edit-pizza.blade --}}
    {{-- <script>
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(this.files[0]);
            }
        });
    </script> --}}
    {{-- --------- --}}

{{-- <script>
    // Get the input field and table
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('myTable');
    const rows = table.getElementsByTagName('tr');

    // Add an event listener to the search input
    searchInput.addEventListener('keyup', function () {
        const filter = searchInput.value.toLowerCase();

        // Loop through all table rows and hide those that don't match the search input
        for (let i = 1; i < rows.length; i++) {
            const row = rows[i];
            const cells = row.getElementsByTagName('td');
            let shouldHide = true;

            for (let j = 0; j < cells.length; j++) {
                const cell = cells[j];
                if (cell) {
                    const text = cell.textContent || cell.innerText;
                    if (text.toLowerCase().indexOf(filter) > -1) {
                        shouldHide = false;
                        break;
                    }
                }
            }

            row.style.display = shouldHide ? 'none' : '';
        }
    });
</script> --}}
  
   

</body>

</html>


