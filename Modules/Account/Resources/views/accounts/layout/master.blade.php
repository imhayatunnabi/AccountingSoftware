<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}/{{ implode(' / ', array_map('ucfirst', request()->segments())) }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Standard -->
    <link rel="shortcut icon" href="{{ url('/image/favicon.svg') }}">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('/image/favicon.svg') }}">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('/image/favicon.svg') }}">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('/image/favicon.svg') }}">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('/image/favicon.svg') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('backend/input-tags/bootstrap-tagsinput') }}">
    <link href="{{ url('backend/css/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ url('backend/css/lib/chartist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ url('backend/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('backend/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ url('backend/css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ url('backend/css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ url('backend/css/lib/weather-icons.css') }}" rel="stylesheet" />
    <link href="{{ url('backend/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ url('backend/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('backend/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ url('backend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <link rel="stylesheet" href="{{ url('/backend/datatables/jquery.dataTables.min.css') }}">
    @yield('admin.master.css')
</head>

<body>
    {{-- sidebar starts here --}}
    @include('account::accounts.partials.sidebar')
    <!-- /# sidebar -->
    {{-- header section --}}
    @include('account::accounts.partials.header')
    {{-- header section --}}
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                {{-- forware backwaard --}}
                                <h1> <span><a href="javascript:history.back()" class="btn btn-primary"><i
                                                class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
                                    </span>{{ env('APP_NAME') }}/
                                    {{ implode(' / ', array_map('ucfirst', request()->segments())) }} <span><a
                                            href="javascript:history.forward()" class="btn btn-primary"><i
                                                class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# row -->
                <section id="main-content">
                    @yield('content')
                </section>
                {{-- footer starts here --}}
                @include('backend.fixed.footer')
            </div>
        </div>
    </div>
    {{-- bootstrap 5 input tags js --}}
    <script type="text/javascript" src="{{ url('backend/input-tags/bootstrap-tagsinput.js') }}"></script>
    <script type="text/javascript">
        $(".inputtags").tagsinput('items');
    </script>
    <!--toaster-->
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <!-- jquery vendor -->
    <script src="{{ url('backend/js/lib/jquery.min.js') }}"></script>
    <script src="{{ url('backend/js/lib/jquery.nanoscroller.min.js') }}"></script>
    <!-- nano scroller -->
    <script src="{{ url('backend/js/lib/menubar/sidebar.js') }}"></script>
    <script src="{{ url('backend/js/lib/preloader/pace.min.js') }}"></script>
    <!-- sidebar -->

    <script src="{{ url('backend/js/lib/bootstrap.min.js') }}"></script>
    <script src="{{ url('backend/js/scripts.js') }}"></script>
    <!-- bootstrap -->

    <script src="{{ url('backend/js/lib/calendar-2/moment.latest.min.js') }}"></script>
    <script src="{{ url('backend/js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
    <script src="{{ url('backend/js/lib/calendar-2/pignose.init.js') }}"></script>


    <script src="{{ url('backend/js/lib/weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ url('backend/js/lib/weather/weather-init.js') }}"></script>
    <script src="{{ url('backend/js/lib/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ url('backend/js/lib/circle-progress/circle-progress-init.js') }}"></script>
    <script src="{{ url('backend/js/lib/chartist/chartist.min.js') }}"></script>
    <script src="{{ url('backend/js/lib/sparklinechart/jquery.sparkline.min.js') }}"></script>
    <script src="{{ url('backend/js/lib/sparklinechart/sparkline.init.js') }}"></script>
    <script src="{{ url('backend/js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('backend/js/lib/owl-carousel/owl.carousel-init.js') }}"></script>
    <script src="{{ url('/backend/datatables/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#pagination').DataTable();
            $('#datatables').DataTable();
        });
    </script>
    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    @yield('admin.master.js')
    @if (env('APP_ENV') == 'production')
    <script>
        /**
             * Disable right-click of mouse, F12 key, and save key combinations on page
             */
            document.addEventListener("contextmenu", function(e) {
                e.preventDefault();
            }, false);
            document.addEventListener("keydown", function(e) {
                //document.onkeydown = function(e) {
                // "I" key
                if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                    disabledEvent(e);
                }
                // "J" key
                if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                    disabledEvent(e);
                }
                // "S" key + macOS
                if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                    disabledEvent(e);
                }
                // "U" key
                if (e.ctrlKey && e.keyCode == 85) {
                    disabledEvent(e);
                }
                // "F12" key
                if (event.keyCode == 123) {
                    disabledEvent(e);
                }
                // "C" key
                if (e.ctrlKey && event.keyCode == 67) {
                    disabledEvent(e);
                }
            }, false);

            function disabledEvent(e) {
                if (e.stopPropagation) {
                    e.stopPropagation();
                } else if (window.event) {
                    window.event.cancelBubble = true;
                }
                e.preventDefault();
                return false;
            }
    </script>
    @endif
    <script type="text/javascript" src="{{ url('/backend/ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#product_name_fr'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#termsAndCondition'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#privacyAndPolicy'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>
