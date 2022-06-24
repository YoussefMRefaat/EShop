@props(['heading' => '' , 'content' => ''])

<!DOCTYPE html>
<html>
    <x-user.header></x-user.header>
    <body>
        <div class="container-fluid">
            <x-user.topbar></x-user.topbar>
            <x-user.headbar></x-user.headbar>
        </div>

        <div class="container-fluid">
            <div class="row border-top px-xl-5">
                <x-user.sidebar :categories="$categories"></x-user.sidebar>
                <x-user.navbar></x-user.navbar>
            </div>
        </div>

        {{$heading}}

        {{$content}}

        <x-user.footbar :categories="$categories"></x-user.footbar>

        <x-user.footer></x-user.footer>
    </body>
</html>
