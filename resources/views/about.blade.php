@extends('layouts.app')

@section('content')

<!-- MAIN  -->
<main class="about">
    <div class="container">
        <h2 class="about__heading display-4 my-5 py-3">
            GIỚI THIỆU ROOMBOOKING.COM
        </h2>
        <div class="row">
            <div class="col-3">
                <div class="about__sidebar">
                    <ul class="about__sidebar-list">
                        <li class="about__sidebar-item d-flex justify-content-between align-items-center active">
                            <span class="active">
                                GIỚI THIỆU
                            </span>
                            <i class="fas fa-angle-right active"></i>
                        </li>
                        <li class="about__sidebar-item d-flex justify-content-between align-items-center">
                            <span>
                                TẦM NHÌN
                            </span>
                            <i class="fas fa-angle-right"></i>
                        </li>
                        <li class="about__sidebar-item d-flex justify-content-between align-items-center">
                            <span>
                                SỨ MỆNH
                            </span>
                            <i class="fas fa-angle-right "></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-9">
                <div class="about__img-bg text-center mb-4">
                    <img src="https://storage.googleapis.com/fe-production/images/logo-baochi/gioi-thieu-ve-xe-re.png" alt="" class="w-100">
                </div>
                <ul class="about__content-list">
                    <li class="about__content-item active">
                        <h4 class="about__title  ">
                            Giới thiệu
                        </h4>
                        <p class="about__content">
                        Với mong muốn xây dựng một trang web thật PRO chuyên cung cấp thông tin nhà trọ phòng trọ cho mọi người, khi mà ngày nay nhu cầu nhà trọ phòng trọ ngày càng tăng ở các thành phố lớn nhất là Hà Nội và TP. Hồ Chí Minh.

Đối với cách tiếp cận thông tin truyền thống đã không được truyền đến mọi người một cách kịp thời đúng lúc.

Chính vì nắm bắt được tình hình thực tế đó mà chúng tôi đã thành lập website  với mong muốn trở thành một kênh truyền thông phổ biến nhà trọ, phòng trọ hữu ích cho mọi người.

Nếu trước đây việc cho thuê nhà, cho thuê phòng trọ đều dán giấy đăng quảng cáo ở các nơi công cộng rất là mất vẽ mỹ quang đô thị. Thì ngày nay các bạn có thể đăng tin trên đây rất tiện lợi, với phương tiện truyền thông được phổ biến rộng rãi tin đăng của bạn sẽ được hàng ngàn người biết đến.

Website ra đời sẽ góp phần giải quyết được các vấn đề thuê trọ hiện nay, và giúp mọi người tìm kiếm nhà trọ, chỗ ở phù hợp và dễ dàng. Hy vọng Phongtro123.com sẽ là địa chỉ quen thuộc cho mọi người.

Website với giao diện thân thiện dễ sử dụng và hướng đến người dùng, các chuyên mục được phân chia rất rõ ràng và tim kiếm tin đăng rất chi tiết.
                        </p>
                    </li>
                    <li class="about__content-item">
                        <h4 class="about__title  ">
                        Bạn có thể tìm phòng trọ nhà trọ, tìm người ở ghép, tìm nhà cho thuê theo:
                        </h4>
                        <p class="about__content">
                            <h5 style="font-size: 24px; font-weight: 400;" class="my-4">Góp phần cho hành trình của bạn
                                hạnh phúc hơn</h5>
                                + Quận huyện, chuyên mục, theo giá, theo diện tích.

- Đăng tin cho thuê phòng trọ, nhà trọ, nhà nguyên căn, cho thuê căn hộ chung cư với đầy đủ tính năng

+ Chức năng quản lý bài viết cho mỗi thành viên

+ Chức năng đăng tin lên top cho người đăng tin

+ Chức năng xóa, sửa, hạ tin đăng nhưng vẫn còn lưu trên hệ thống vv...
                        </p>
                    </li>
                    <li class="about__content-item">
                        <h4 class="about__title ">
                            Các dịch vụ chính:
                        </h4>
                        <h5 style="font-size: 24px; font-weight: 400;" class="my-4">Góp phần cho hành trình của bạn
                            hạnh phúc hơn</h5>
                        <p class="about__content">
                        - Đăng thông tin quảng cáo cho thuê phòng trọ, nhà trọ, thuê nhà nguyên căn, cho thuê căn hộ, tìm người ở ghép...

- Đăng banner quảng cáo.

- Dịch vụ chụp ảnh tận nhà, miễn phí hoàn toàn cho chủ nhà trọ, phòng trọ, nhà  nguyên căn.

Chúng tôi luôn cố gắng đem lại những thông tin nhanh chóng và chính xác cho mọi người. Rất mong nhận được sự ủng hộ giúp đỡ của mọi người cùng nhau xây dựng một kênh thông tin truyền thông về nhà trọ.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main>


@endsection

@section('script')
<script>
        let aboutSiderbarItem = document.querySelectorAll(".about__sidebar-list .about__sidebar-item ");
        let aboutSiderbarItemIcon = document.querySelectorAll(".about__sidebar-list .about__sidebar-item i");
        console.log(aboutSiderbarItemIcon);

        let aboutItem = document.querySelectorAll(".about__content-item");
        aboutSiderbarItem.forEach((item, index) => {
            item.addEventListener('click', function () {
                aboutSiderbarItem.forEach(item => {
                    item.classList.remove('active');
                })
                aboutSiderbarItemIcon.forEach(item => {
                    item.classList.remove('active');
                })
                aboutItem.forEach(item => {
                    item.classList.remove('active');
                })
                this.classList.add('active');
                aboutSiderbarItemIcon[index].classList.add('active');
                aboutItem[index].classList.add('active');

            })
        })        
    </script>   
@endsection