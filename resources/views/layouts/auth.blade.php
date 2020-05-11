<!DOCTYPE html>
<html lang="en">


    @include('layouts.head')


<body class="page-header-fixed">

    <div style="margin-top: 10%;"></div>

    <div class="container-fluid">
        @yield('content')
    </div>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>



</body>
</html>
