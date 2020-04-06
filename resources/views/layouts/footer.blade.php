<!-- Footer Section Start -->
<footer>
    <!-- Footer Area Start -->
    <section class="footer-Content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                    <h3 class="block-title"><a href="{{ config('app.url') }}" class="text-white" id="about_us">Sobre Bachecubano</a></h3>
                    <p>Web de negocios, tiendas y clasificados en Cuba. Especialidad en computadoras, celulares, accesorios, electrodomésticos, casas y carros así como sorteos y compras online.</p>
                    <p>Potenciando desde 2014 el comercio electrónico en Cuba, innovando y conectando vendedores con compradores a través de la internet cubana.</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                    <div class="widget">
                        <h3 class="block-title"><a href="{{ config('app.url') }}" class="text-white">eCommerce en Cuba</a></h3>
                        <!--
                        <ul class="media-content-list">
                            <li>
                                <div class="media-left">
                                    <img class="img-fluid" src="https://img.bachecubano.com/uploads/1249/151756.jpg" alt="Xiaomi Mi Band 4" loading=lazy>
                                    <div class="overlay">
                                        <span class="price">$ 50</span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title"><a href="http://bit.ly/2n117oq">Xiaomi Mi Band 4</a></h4>
                                    <span class="date">5 514 9081</span>
                                </div>
                            </li>
                        </ul>
                        -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                    <div class="widget">
                        <h3 class="block-title">Ayuda & soporte</h3>
                        <ul class="menu">
                            <li><a href="{{ route('blog_index') }}">Blog Bachecubano</a></li>
                            <li><a href="https://m.me/Bachecubano">Chatea con Bachecubano</a></li>
                            <li><a href="#privacy-page">Política de Privacidad</a></li>
                            <li><a href="#report-user">Protección de compras</a></li>
                            <li><a href="{{ route('terms') }}">Términos y Condiciones</a></li>
                            <li><a href="{{ route('contact') }}">Contáctanos</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
                    <div class="widget">
                        <h3 class="block-title">Subscríbete a nosotros</h3>
                        <p class="text-sub">Llevamos más de {{ date('Y') - 2014 }} años ofreciendo lo mejor de la compra venta en Cuba, subscríbete a nuestras alertas de gangas por correo.</p>

                        <form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=bachecubano/XeKg', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
                            <div class="form-group is-empty">
                                <input type="hidden" value="bachecubano/XeKg" name="uri" />
                                <input type="hidden" name="loc" value="es_ES" />
                                <input type="email" name="email" class="form-control" id="email" placeholder="Dirección de correo" required="" />
                                <button type="submit" value="Subscribe" class="btn btn-common btn-block mt-1">Suscribirme</button>
                            </div>
                        </form>

                        <ul class="footer-social">
                            <li><a class="facebook" href="https://www.facebook.com/Bachecubano" rel="nofollow"><i class="lni-facebook"></i></a></li>
                            <li><a class="instagram" href="https://www.instagram.com/Bachecubano" rel="nofollow"><i class="lni-instagram"></i></a></li>
                            <li><a class="twitter" href="https://www.twitter.com/Bachecubano" rel="nofollow"><i class="lni-twitter"></i></a></li>
                            <li><a class="linkedin" href="https://www.linkedin.com/company/bachecubano"><i class="lni-linkedin"></i></a></li>
                            <li><a class="pinterest" href="https://www.pinterest.com/bachecubano"><i class="lni-pinterest"></i></a></li>
                            <li><a class="telegram" href="https://t.me/elBacheChannel"><i class="lni-telegram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer area End -->

    <!-- Copyright Start  -->
    <div id="copyright">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-info float-left">
                        <p>Todos los derechos reservados &copy; {{ date("Y") }} - Desarrollado por <a href="https://www.qvaqui.com">QvaQui</a></p>
                    </div>
                    <!--
                    <div class="float-right">
                        <ul class="bottom-card">
                            <li>
                                <a href="https://www.qvapay.com"><img src="https://www.qvapay.com/favicon-32x32.png" alt="Pasarela de pagos QvaPay" width="34" height="22"></a>
                            </li>
                        </ul>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

</footer>
<!-- Footer Section End -->