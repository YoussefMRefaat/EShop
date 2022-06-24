@props(['search' => '' , 'rows' => ''])

<html lang="en">

<x-admin.header></x-admin.header>

    <body>
        <div class="container-scroller">
            <x-admin.navbar>
                <x-slot name="search">
                    {{$search}}
                </x-slot>
            </x-admin.navbar>

            <div class="container-fluid page-body-wrapper">
                <x-admin.sidebar></x-admin.sidebar>

                <div class="main-panel">
                    <div class="content-wrapper">
                        {{$rows}}
                    </div>
                    <x-admin.footer></x-admin.footer>
                </div>
            </div>
        </div>
    </body>
</html>
