<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".heroSlider", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>

<!-- jQuery -->
<script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('asset/plugins/toastr/toastr.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<!-- AOS -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        offset: 120,
    });
</script>

<script src="{{ asset('frontend/main.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : '{{ csrf_token() }}'}
    });

    $(document).on('submit', '#addWishList', function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.ajax({
            url:url,
            method:'POST',
            data:data,
            success:function(data){
                toastr.success(data);
                $('#wishlistReload').load(location.href+" #wishlistReload>*","");
            },
            error: function(xhr) {
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    toastr.error(xhr.responseJSON.error);
                } else {
                    toastr.error('Something went wrong.');
                }
            }
        });
    });
    $(document).on('submit', '#addCart', function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.ajax({
            url:url,
            method:'POST',
            data:data,
            success:function(data){
                toastr.success(data);
                $('#cartQuantity').load(location.href+" #cartQuantity>*","");
            },
            error: function(xhr) {
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    toastr.error(xhr.responseJSON.error);
                } else {
                    toastr.error('Something went wrong.');
                }
            }
        });
    });
    
    $(document).on('click', '.delete-btn-reload', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#deleted_form').attr('action', url);

            $.ajax({
                url: url,
                type: 'DELETE',
                processData: false,
                dataType: false,
                cache: false,
                success: function (data){
                    toastr.success(data);
                    $('#ajax-reload').load(" #ajax-reload > *");
                    $('#wishlistReload').load(" #wishlistReload > *");
                },
                error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        toastr.error(xhr.responseJSON.error);
                    } else {
                        toastr.error('An error occurred.');
                    }
                }
            });

    });

    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#deleted_form').attr('action', url);
        console.log(url);

        $.confirm({
            title: 'Confirmation!',
            content: 'Are you sure?',
            buttons: {
                confirm: function() {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        processData: false,
                        dataType: false,
                        cache: false,
                        success: function (data){
                            toastr.error(data);
                            $('.dataTable').DataTable().ajax.reload();
                        }
                    });
                },

                somethingElse: {
                    text: 'Cancel',
                    btnClass: 'btn-blue',
                    keys: ['enter', 'shift'],
                },
            }
        });
    });
</script>

<script>
    @if(session('errors'))
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(isset($success))
        toastr.success("{{ $success }}");
    @endif

    @if(session('info'))
        toastr.info("{{ session('info') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>

