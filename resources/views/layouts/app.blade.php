<!DOCTYPE html>
<html>

@include('layouts.head')
    <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">

      @include('layouts.topbar')
      @include('layouts.sidebar')

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                  @yield('content')
              </section>
          </div>
          <!-- /.content-wrapper -->

             @include('layouts.footer')

      <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
      </div><!-- ./wrapper -->

      @include('layouts.javascript')

    </body>
</html>
