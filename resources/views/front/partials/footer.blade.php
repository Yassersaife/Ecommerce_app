<footer class="footer">
    <div class="container">
        <div class="row">
            <!-- معلومات عن Tsunami Phone -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="{{ route('front.index') }}">
                            <img src="{{ asset('logo.png') }}" alt="Logo" width="120" style="margin-right: -20px">
                        </a>
                    </div>
                    <p>
                        Tsunami Phone هو وجهتك المثالية لأحدث الجوالات والاكسسوارات المميزة. نسعى لتقديم منتجات عالية
                        الجودة وخدمة استثنائية.
                    </p>
                    <a href="#">
                        <img src="{{ asset('assets-front/img/payment.png') }}" alt="طرق الدفع">
                    </a>
                </div>
            </div>
            <!-- قائمة المنتجات -->
            <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>المنتجات</h6>
                    <ul>
                        <li><a href="{{ route('front.shop') }}">الجوالات</a></li>
                        <li><a href="{{ route('front.shop') }}">الاكسسوارات</a></li>
                        <li><a href="{{ route('front.shop') }}">الساعات الذكية</a></li>
                        <li><a href="{{ route('front.shop') }}">عروض خاصة</a></li>
                    </ul>
                </div>
            </div>
            <!-- خدمة العملاء -->
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>خدمة العملاء</h6>
                    <ul>
                        <li><a href="{{ route('front.contact') }}">اتصل بنا</a></li>
                        <li><a href="{{ route('front.shop') }}">طرق الدفع</a></li>
                        <li><a href="{{ route('front.shop') }}">الشحن</a></li>
                        <li><a href="{{ route('front.shop') }}">الاسترجاع والتبديل</a></li>
                    </ul>
                </div>
            </div>
            <!-- الاشتراك في النشرة الإخبارية -->
            <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6>النشرة الإخبارية</h6>
                    <div class="footer__newsletter">
                        <p>
                            اشترك لتصلك أحدث العروض والتحديثات والمنتجات الجديدة مباشرة إلى بريدك الإلكتروني.
                        </p>
                        <form action="{{ route('front.shop') }}" method="post">
                            @csrf
                            <input type="email" name="email" placeholder="بريدك الإلكتروني" required>
                            <button type="submit"><span class="icon_mail_alt"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- حقوق النشر -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="footer__copyright__text">
                    <p>&copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> Tsunami Phone. جميع الحقوق محفوظة.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
