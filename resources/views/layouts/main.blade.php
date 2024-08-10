<!doctype html>
<html lang="en">
    @include('includes.head')
    
    <body>
      @include('includes.preload')
      
    
        <main>
          @include('includes.navbar')


          @yield('content')



        </main>

          @include('includes.footer')

          @yield('team')

          @include('includes.javascript_files')


    </body>
</html>         