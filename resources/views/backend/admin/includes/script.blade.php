<!-- bundle -->
<script src="{{asset('/')}}backend/assets/js/vendor.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/app.min.js"></script>

<!-- third party js -->
<script src="{{asset('/')}}backend/assets/js/vendor/apexcharts.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/dataTables.bootstrap5.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/responsive.bootstrap5.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/buttons.bootstrap5.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/buttons.html5.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/buttons.flash.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/buttons.print.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/dataTables.keyTable.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/dataTables.select.min.js"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{asset('/')}}backend/assets/js/pages/demo.datatable-init.js"></script>
<script src="{{asset('/')}}backend/assets/js/pages/demo.dashboard.js"></script>
<script src="{{ asset('backend/assets/js/lib/dropify.js') }}"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
@yield('script')
<script>

    //Website Context Menu
    @if(get_setting('website_context_menu'))
        document.addEventListener('contextmenu', function(event) {
            event.preventDefault();
        });
    @endif



    //Setup Ajax Headers
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Dropify Image Viewer
    $('.dropify').dropify();

    //Set Course Id From Admin Course
    function setId(id) {
        $.post('{{ route('set-course-id') }}' , {course_id:id} , function (response) {
            $.NotificationApp.send("Success","Course Selected","top-right","green","Icon")
            console.log(response);
        });

    }

    //Show Delete Everyting Swal
    function deleteData(id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }


</script>
