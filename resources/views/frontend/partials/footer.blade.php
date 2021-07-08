{{-- Js --}}
<footer id="footer">
    <div class="footer_top">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widget wow fadeInLeftBig">
                    <h2>Interact With Us</h2>
                    <ul class="tag_nav">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Twitter</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widget wow fadeInDown">
                    <h2>Jump To</h2>
                    <ul class="tag_nav">
                        <li><a href="#">Latest</a></li>
                        <li><a href="#">Popular</a></li>
                        <li><a href="#">Fashion</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="footer_widget wow fadeInRightBig">
                    <h2>Contact</h2>
                    <ul class="tag_nav">
                        <li>
                            <a href="#">Letters to the Editor</a>
                        </li>
                        <li>
                            <a href="{{route('sponsor')}}">Advertise in the Post</a>
                        </li>
                        <li>
                            <a href="#">Work for the Post</a>
                        </li>
                        <li>
                            <a href="#">Send us a tip</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <p class="copyright text-center">Copyright &copy; {{ date('Y') }}</p>
        <a href="#" class="scrollup" title="Goto Top" data-placement="top"></a>
    </div>
</footer>

<script src="{{ asset('js/jquery.min.js') }}"></script>
{{-- <script src="{{ asset('js/wow.min.js') }}"></script> --}}
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/jquery.li-scroller.1.0.js') }}"></script>
<script src="{{ asset('js/jquery.newsTicker.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@yield('scripts');
</body>
</html>