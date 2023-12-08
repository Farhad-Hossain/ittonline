<!DOCTYPE html>
<html lang="en">
@include('inc.head')
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->
    @include('inc.topbar')

    @if( route('welcome') == url()->full() )
        @include('inc.navbar_with_carousel')
    @else
        @include('inc.navbar')
    @endif
    
    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

    

    @yield('contents')
    
    @include('inc.footer')
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend')}}/lib/wow/wow.min.js"></script>
    <script src="{{asset('frontend')}}/lib/easing/easing.min.js"></script>
    <script src="{{asset('frontend')}}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{asset('frontend')}}/lib/counterup/counterup.min.js"></script>
    <script src="{{asset('frontend')}}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('frontend')}}/js/main.js"></script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('submit', '#quote-request-form', function (event) {
                event.preventDefault();
                let target = $(this).attr('action');
                let formData = $("#quote-request-form").serialize();
                $.ajax({
                    type: 'POST',
                    url: target,
                    data: formData,
                    processData:false,
                    ContentType:false,
                    success: function (data) {
                        $("#quote-msg").text(data.message).removeClass('d-none');
                        $("#quote-request-form").trigger('reset');
                    }
                });
            });
            $(document).on('submit', '#contact-form', function (event) {
                event.preventDefault();
                $(".contact-submit-btn").text('Processing...');
                let target = $(this).attr('action');
                let formData = $("#contact-form").serialize();
                $.ajax({
                    type: 'POST',
                    url: target,
                    data: formData,
                    processData:false,
                    ContentType:false,
                    success: function (data) {
                        $("#contact-msg").text(data.message).removeClass('d-none');
                        $(".contact-submit-btn").text('Send Message');
                        $("#contact-form").trigger('reset');
                    }
                });
            });
        });
        
    </script>
    @stack('custom_scripts')
</body>

</html>