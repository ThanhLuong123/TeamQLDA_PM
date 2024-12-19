            </div>
        </section>
        
        <!-- Top products -->

        <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer mobile-app">
                            <h3>Mobile Apps</h3>
                            <div class="app-button">
                                <a href="javascript:void(0)" class="btn">
                                    <i class="lni lni-play-store"></i>
                                    <span class="text">
                                        <span class="small-text">Tải nó trên</span>
                                        Google Play
                                    </span>
                                </a>
                                <a href="javascript:void(0)" class="btn">
                                    <i class="lni lni-apple"></i>
                                    <span class="text">
                                        <span class="small-text">Tải nó trên</span>
                                        App Store
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>Danh sách sản phẩm</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <ul>
                                        <?php foreach ($danhmuc as $d): ?>
                                            <li><a href="?action=group&id=<?php echo $d["id"]; ?>">
                                            <?php echo $d["tendanhmuc"]; ?></a></li>
                                        <?php endforeach; ?>    
                                    </ul>
                                </div>                               
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>Về chúng tôi</h3>
                            <ul>
                                <li><a href="">Giới thiệu</a></li>
                                <li><a href="">Liên kết</a></li>
                                <li><a href="">Blog</a></li>
                                <li><a href="">Giúp đỡ & hỗ trợ</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-contact">
                            <h3>Đia chỉ</h3>
                            <ul>
                                <li>80, Phường Bình Đức<br> Thành phố Long Xuyên, An Giang</li>
                                <li>Sđt. +(038) 1234567 <br> Mail. thanh@gmail.com</li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-12">
                            <div class="content">
                                <p class="copyright-text">Thiết kế và phát triển by <a href="https://www.facebook.com/ngocthanh.luong.391420"
                                        rel="nofollow" target="_blank">Lương Ngọc Thanh</a>
                                </p>
                                <ul class="footer-social">
                                    <li><a href="https://www.facebook.com/ngocthanh.luong.391420"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-youtube"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/tiny-slider.js"></script>
    <script src="../assets/js/glightbox.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script type="text/javascript">
        //========= Category Slider 
        tns({
            container: '.category-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 2,
                },
                768: {
                    items: 4,
                },
                992: {
                    items: 5,
                },
                1170: {
                    items: 6,
                }
            }
        });
    </script>
    </body>
</html>
