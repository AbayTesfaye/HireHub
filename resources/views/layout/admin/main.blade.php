@include('layout.admin.header')

<body class="sb-nav-fixed">
    @include('layout.admin.navbar')
    <div id="layoutSidenav">
        @include('layout.admin.sidebar')
        <div id="layoutSidenav_content">
            @include('layout.admin.body')
            @include('layout.admin.footer')
        </div>
    </div>
</body>

</html>
