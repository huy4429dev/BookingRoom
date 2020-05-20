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
                            Được thành lập từ năm 2013 với 3 đồng sáng lập: anh Trần Nguyễn Lê Văn, anh Đào Việt
                            Thắng và
                            anh Lương Ngọc Long, công ty cổ phần VeXeRe đã xây dựng được tên tuổi hàng đầu trong
                            ngành xe
                            khách, với bề dày hoạt động trong lĩnh vực Thương mại điện tử, Công nghệ và du lịch.
                            VeXeRe tự
                            hào là đơn vị đi đầu trong sự nghiệp cách mạng ngành xe khách Việt Nam bao gồm 3 giải
                            pháp: đặt
                            vé thông minh cho hành khách, phần mềm quản lí hiệu quả cho nhà xe (BMS - Bus Management
                            System)
                            và phần mềm hỗ trợ bán vé hiệu quả cho đại lý (AMS- Agent Management System).

                            Hiện tại, VeXeRe.com là hệ thống vé xe lớn nhất Việt Nam, với hơn 550 hãng xe hợp tác
                            bán vé với
                            VeXeRe, phủ rộng hơn 2600 tuyến đường trong và ngoài nước giúp người dùng có thể tìm
                            thông tin
                            chuyến xe, hãng xe, và mua vé trực tuyến dễ dàng. Đồng thời, VeXeRe.com còn cung cấp
                            những đánh
                            giá của các hành khách đã đi những hãng xe này. Hành khách có thể dễ dàng lựa chọn trước
                            chỗ
                            ngồi yêu thích, thanh toán vé trực tuyến, tiền mặt tại các cửa hàng tiện lợi trên cả
                            nước.

                            Phần mềm quản lý hãng xe VeXeRe (BMS ) đang được hơn 500 hãng xe cả nước tin dùng, phần
                            mềm hỗ
                            trợ các nhà xe thay đổi hình thức quản lý thủ công để quản lý hiệu quả và tối ưu hóa
                            doanh thu,
                            giảm thiểu chi phí. Đây là là cuộc cách mạng trọng việc công nghệ hóa ngành xe khách.

                            Phần mềm hỗ trợ đại lý bán vé AMS với hơn 5000 đại lý sử dụng, tăng doanh thu bán vé của
                            đại lý
                            và giúp đại lý hỗ trợ chăm sóc khách tốt hơn.

                            Những nổ lực của VeXeRe đã được 3 quỹ đầu tư mạo hiểm công nhận và đồng hành với tư cách
                            nhà đầu
                            tư: CyberAgent ventures - Nhật Bản, Pix Vine Capital - Singapore, Spiral Ventures -
                            Singapore.
                        </p>
                    </li>
                    <li class="about__content-item">
                        <h4 class="about__title  ">
                            TẦM NHÌN
                        </h4>
                        <p class="about__content">
                            <h5 style="font-size: 24px; font-weight: 400;" class="my-4">Góp phần cho hành trình của bạn
                                hạnh phúc hơn</h5>
                            Trải qua hàng nghìn năm, lịch sử nhân loại đã có những bước tiến nhảy vọt, chủ yếu do
                            cải thiện năng suất lao động. Tin tưởng vào điều này, VeXeRe mong muốn có thể góp phần
                            cải thiện và năng cao đời sống người dân thông qua khả năng sáng tạo đổi mới và ứng dụng
                            công nghệ, đáp ứng mọi nhu cầu trong mảng du lịch và ngành vận tải.
                        </p>
                    </li>
                    <li class="about__content-item">
                        <h4 class="about__title ">
                            Sứ mệnh
                        </h4>
                        <h5 style="font-size: 24px; font-weight: 400;" class="my-4">Góp phần cho hành trình của bạn
                            hạnh phúc hơn</h5>
                        <p class="about__content">
                            Mỗi chúng ta đều sẽ có những chuyến đi và chuyến đi có thể sẽ là khởi đầu cho những hành
                            trình thú vị và hạnh phúc, thay đổi cuộc đời của mỗi người. Vì vậy, sứ mệnh mà VeXeRe
                            hướng tới không chỉ gói gọn là những chuyến đi, mà đó chính là hành trình cuộc đời của
                            mỗi người. VeXeRe mong muốn đồng hành và góp phần cho mỗi hành trình ấy sẽ hạnh phúc
                            trọn vẹn hơn.

                            Đã hạnh phúc thì sẽ có hạnh phúc hơn: đó có thể là những chuyến đi giá rẻ hơn tạo điều
                            kiện cho nhiều người được đi du lịch hơn, nhiều người được tiếp cận với những dịch vụ
                            tốt hơn, với nhiều trải nghiệm hạnh phúc và ý nghĩa hơn.
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