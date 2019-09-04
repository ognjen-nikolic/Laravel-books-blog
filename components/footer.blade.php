<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
        <p class="m-0 text-center text-white"><a href="dokumentacija.pdf">Dokumentacija</a></p>
    </div>
    <!-- /.container -->
</footer>
<script>
    const BASE_URL = "<?php echo url("/"); ?>";
</script>
<!-- Bootstrap core JavaScript -->
<script src="{{ asset('/') }}vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('/') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}js/knjige.js"></script>

@yield('footer')
</body>

</html>
