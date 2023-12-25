<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                <a class="breadcrumb-item text-dark" href="index.php?act=sanpham">Shop</a>
                <span class="breadcrumb-item active">Contact</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Liên hệ với chúng tôi</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Họ và Tên"
                                required="required" data-validation-required-message="Vui lòng nhập tên của bạn" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Email"
                                required="required" data-validation-required-message="Vui lòng nhập Email của bạn" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Số điện thoại"
                                required="required" data-validation-required-message="Vui lòng nhập số điện thoại của bạn" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="6" id="message" placeholder="Lời nhắn"
                                required="required"
                                data-validation-required-message="Vui lòng nhập lời nhắn của bạn"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Gửi thắc mắc của bạn cho chúng tôi</h5>
                <p>Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc lại với bạn sớm nhất có thể .</p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Chi nhánh 1</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Công viên phần mềm Quang Trung, phường Tân Chánh Hiệp, Q.12, TPHCM</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>nhanbaoslv@gmail.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>0906443902</p>
                </div>
                <div class="d-flex flex-column">
                    <h5 class="font-weight-semi-bold mb-3">Chi Nhánh 2</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Tổ 6, Khu phố 9, Xã Suối Cát, Huyện Xuân Lộc, Tỉnh Đồng Nai</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>thaobuibui@gmail.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>0969184609</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->