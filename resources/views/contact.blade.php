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
                <span>BAN QUẢN TRỊ WEBSITE BOOKINGROOM.COM</span>
            </div>
            <div class="col-9">
                <div class="success-contact ml-4"></div>
                <div class=" ml-4">
                    <ul id="error-contact">
                    </ul>
                </div>
                <div class="contact__content">
                    <h4 class="contact__heading">
                        VẤN ĐỀ LIÊN HỆ
                    </h4>
                    <form class="contact__form">
                        @csrf
                        <div class="contact__form-group">
                            <label for="" class="contact__form-label">
                                Chủ đề
                            </label>
                            <input type="text" class="contact__form-input" name="title">
                        </div>
                        <div class="contact__form-group">
                            <label for="" class="contact__form-label">
                                Nội dung
                            </label>
                            <textarea class="contact__form-textarea" name="content" id="" cols="30" rows="5"></textarea>
                        </div>

                        <h4 class="contact__heading">
                            THÔNG TIN NGƯỜI LIÊN HỆ
                        </h4>
                        <div class="contact__form-group">
                            <label for="" class="contact__form-label">
                                Họ tên
                            </label>
                            <input type="text" class="contact__form-input" name="username">
                        </div>
                        <div class="contact__form-group">
                            <label for="" class="contact__form-label">
                                Điện thoại
                            </label>
                            <input type="text" class="contact__form-input" name="phone">
                        </div>
                        <div class="contact__form-group">
                            <label for="" class="contact__form-label">
                                Email
                            </label>
                            <input type="text" class="contact__form-input" name="email">
                        </div>
                        <div class="contact__form-group">
                            <label for="" class="contact__form-label">
                                Địa chỉ
                            </label>
                            <input type="text" class="contact__form-input" name="address">
                        </div>
                        <button id="submitContact" class="btn contact__btn" type="button">GỬi</button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('script')

<script>
    var url = "{{url('user/contact')}}";


    let submitContact = document.querySelector('#submitContact');
    let contactForm = document.querySelectorAll('.contact__form input');
    let listErr = document.querySelector('#error-contact');
    let ContactSuccess = document.querySelector('.success-contact');

    function sendContact() {
        let username = document.querySelector('input[name="username"]').value;
        let address = document.querySelector('input[name="address"]').value;
        let email = document.querySelector('input[name="email"]').value;
        let phone = document.querySelector('input[name="phone"]').value;
        let title = document.querySelector('input[name="title"]').value;
        let content = document.querySelector('textarea[name="content"]').value;

        let data = {

            username: username,
            address: address,
            email: email,
            phone: phone,
            title: title,
            content: content,
        };

        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {

                if (data.error != undefined) {
                    if (data.error.length > 0) {
                        listErr.innerHTML = '';
                        listErr.classList.add('alert', 'alert-danger');
                        data.error.forEach(err => {
                            listErr.innerHTML += '<li>' + err + '</li>';
                        });
                    }
                }
                else {
                        ContactSuccess.classList.add('alert', 'alert-success');
                        ContactSuccess.innerHTML = "Gửi liên hệ thành công."
                    }


            })
            .catch(err => {
                console.log(err);
            })
    }


    submitContact.addEventListener('click', sendContact);
</script>

@endsection