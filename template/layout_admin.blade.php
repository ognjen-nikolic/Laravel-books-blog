@include('admin.components.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('admin.components.header')
@include('admin.components.sidebar')
        @yield('content')

</div>
@include('admin.components.footer')
</body>
</html>