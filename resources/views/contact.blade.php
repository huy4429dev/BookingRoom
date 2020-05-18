@extends('layouts.app')

@section('title','contact')

@section('content')
  <main class="contact">
        <div class="container">
            <h2 class="contact__heading display-4 my-5 py-3">
                LIÊN HỆ
            </h2>
            <div class="row">
                <div class="col-3">
                    <span>BAN QUẢN TRỊ WEBSITE VEXERE.COM</span>
                    <span>Goolge Map</span>
                </div>
                <div class="col-9">
                    <div class="contact__content">
                        <h4 class="contact__heading">
                            BIỂN SỐ XE
                        </h4>
                        <form action="" class="contact__form">
                            <div class="contact__form-group">
                                <label for="" class="contact__form-label" name="">
                                    Biển số xe
                                </label>
                                <input type="text" class="contact__form-input">
                            </div>
                            <div class="contact__form-group">
                                <label for="" class="contact__form-label">
                                    Nội dung
                                </label>
                                <textarea class="contact__form-textarea" name="" id="" cols="30" rows="5"></textarea>
                            </div>

                            <h4 class="contact__heading">
                                THÔNG TIN NGƯỜI LIÊN HỆ
                            </h4>
                            <div class="contact__form-group">
                                <label for="" class="contact__form-label" name="">
                                    Họ tên
                                </label>
                                <input type="text" class="contact__form-input">
                            </div>
                            <div class="contact__form-group">
                                <label for="" class="contact__form-label" name="">
                                    Điện thoại
                                </label>
                                <input type="text" class="contact__form-input">
                            </div>
                            <div class="contact__form-group">
                                <label for="" class="contact__form-label" name="">
                                    Email
                                </label>
                                <input type="text" class="contact__form-input">
                            </div>
                            <button class="btn contact__btn" type="submit">GỬi</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')

@endsection