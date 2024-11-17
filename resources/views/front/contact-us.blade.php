@extends('front.layouts.app')

@section('content')
    <section class="section-5 pt-3 pb-3 mb-3 bg-light">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item">Contact-Us</li>
                </ol>
            </div>
        </div>
    </section>
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 mb-4 mb-md-2">
                    <div class="contact-info p-4 bg-white shadow-sm rounded d-flex align-items-center">
                        <!-- Image on the left -->
                        <div class="contact-image me-4">
                            <img src="{{ asset('uploads/contact-us/contactus.jpg') }}" alt="Contact Us"
                                class="img-fluid rounded-circle shadow-lg" style="max-width: 100px; height: auto;">
                        </div>
                        <!-- Contact info -->
                        <div class="contact-text">
                            <h5 class="mb-0 text-uppercase pb-2">Infomation</h5>
                            <p class="mb-0">Address: {{ __('Phu Dien, Bac Tu Liem, Hanoi') }} </p>
                            <p class="mb-0">Phone: 0369955555</p>
                            <p class="mb-0">Email: anhtustore@gmail.com</p>
                        </div>



                    </div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59584.985396598146!2d105.7494735101101!3d21.03022160428619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab5756f91033%3A0x576917442d674bfd!2zQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1731033483382!5m2!1svi!2s"
                        width="630" height="300" style="border:0; margin-top: 40px" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>

                <div class="col-md-6 bg-white shadow-sm rounded p-2">
                    <form class="shake" role="form" method="post" id="contactForm" name="contactForm">
                        @csrf
                        <div class="mb-3">
                            <label class="mb-2" for="name">Your Name</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="John Doe"
                                data-error="Please enter your name">
                            <p class="help-block with-errors"></p>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2" for="email">Email Address</label>
                            <input class="form-control" id="email" type="email" name="email"
                                placeholder="youremail@example.com" data-error="Please enter your Email">
                            <p class="help-block with-errors"></p>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2" for="subject">Subject</label>
                            <input class="form-control" id="subject" type="text" name="subject"
                                placeholder="Your Subject" data-error="Please enter your message subject">
                            <p class="help-block with-errors"></p>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2" for="message">Your Message</label>
                            <textarea class="form-control" rows="4" id="message" name="message" placeholder="Write your message here"
                                data-error="Write your message"></textarea>
                            <p class="help-block with-errors"></p>
                        </div>

                        <div class="form-submit text-center">
                            <button class="btn btn-dark btn-lg" type="submit" id="form-submit"><i
                                    class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
        $("#contactForm").submit(function(event) {
            event.preventDefault();
            $('#form-submit').prop('disabled', true);
            $.ajax({
                url: '{{ route('front.sendContactEmail') }}',
                type: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    $('#form-submit').prop('disabled', false);
                    if (response.status == true) {
                        window.location.href = "{{ route('front.contactUs') }}";
                    }
                }
            });
        });
    </script>
@endsection
