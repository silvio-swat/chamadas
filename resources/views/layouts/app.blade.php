<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
      

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <style>
            [x-cloak] { display: none; }
        </style>          

        @livewireStyles  
        {{-- @toastr_css --}}

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            @include('layouts.navigation')

            <!-- Page Heading -->
            <?php 
                    if(isset($header)) { ?>
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>   
            <?php   }
            ?>


            <!-- Page Content -->
            <main>
                <div>
                {{ $slot }}
                </div>
            </main>
        </div>

 
        <!-- Scripts -->


        @livewireScripts

        <script src="{{ asset('js/app.js') }}" defer></script>   
        
        {{-- Comentado Toast pois não está sendo usando --}}
        {{-- @jquery

        <script type="text/javascript" src="{{asset('lightbox/js/lightbox.js')}}"></script>
        
        @toastr_js
        @toastr_render
        
        <script>
            $("#toggle").click(function () {
                $(this).toggleClass("on")
                $("#resize").toggleClass("active")
            })
        </script>  --}}

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            window.addEventListener('alert', event => { 
                         toastr[event.detail.type](event.detail.message, 
                         event.detail.title ?? ''), toastr.options = {
                                "closeButton": true,
                                "progressBar": true,
                            }
                        });
            </script>        

    </body>
</html>
