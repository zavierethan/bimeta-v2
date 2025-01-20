<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <link href="{{asset('asset/dist/images/logo.svg')}}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Enigma admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Enigma Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Bimeta Karnusa Versi 2.0</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('assets/dist/css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/dist/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.tailwindcss.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('css')
    <style>
        table.dataTable thead {background-color: rgb(12 74 110);}
    </style>
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5 md:py-0">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Midone - HTML Admin Template" class="w-6" src="{{asset('assets/dist/images/logo.svg')}}">
            </a>
            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <div class="scrollable" id='appMenusMobile'>
        </div>
    </div>
    <!-- END: Mobile Menu -->
    <!-- BEGIN: Top Bar -->
    <div class="top-bar-boxed top-bar-boxed--top-menu h-[70px] md:h-[65px] z-[51] border-b border-white/[0.08] mt-12 md:mt-0 -mx-3 sm:-mx-8 md:-mx-0 px-3 md:border-b-0 relative md:fixed md:inset-x-0 md:top-0 sm:px-8 md:px-10 md:pt-10 md:bg-gradient-to-b md:from-slate-100 md:to-transparent dark:md:from-darkmode-700">
        <div class="h-full flex items-center">
            <!-- BEGIN: Logo -->
            <a href="" class="logo -intro-x hidden md:flex xl:w-[180px] block">
                <img alt="Midone - HTML Admin Template" class="logo__image w-6"
                    src="{{asset('assets/dist/images/logo.svg')}}">
                <span class="logo__text text-white text-lg ml-3"> BIMETA </span>
            </a>
            <!-- END: Logo -->
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
                <ol class="breadcrumb breadcrumb-light">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    @yield('active-url')
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-6">
                <div class="search hidden sm:block">

                </div>
            </div>
            <!-- END: Search -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                    <img alt="Midone - HTML Admin Template" src="{{asset('assets/dist/images/profile-1.jpg')}}">
                </div>
                <div class="dropdown-menu w-56">
                    <ul
                        class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                        <li class="p-2">
                            <div class="font-medium">{{Auth::user()->name}}</div>
                            <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">Production</div>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="user"
                                    class="w-4 h-4 mr-2"></i> Profile </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock"
                                    class="w-4 h-4 mr-2"></i> Reset Password </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle"
                                    class="w-4 h-4 mr-2"></i> Help </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i
                                    data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
    </div>
    <!-- END: Top Bar -->
    <!-- BEGIN: Top Menu -->
    <nav class="top-nav" id='appMenus'>
    </nav>
    <!-- END: Top Menu -->

    <!-- BEGIN: Content -->
    @yield('main-content')

    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script> -->
    <script src="{{asset('assets/dist/js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com/"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.tailwindcss.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.$token   = $("meta[name='csrf-token']").attr("content");
        site_url = `{{ url('/') }}`;
        loadMenus();

        function loadMenus() {
            var form = [];
            form.push(
                {name: "_token", value: $token},
                {name: "user_id", value: '<?=Auth::user()->id?>'},
            );
            $.ajax({
                url: site_url+`/loadMenus`,
                type: "POST",
                dataType: "json",
                cache: false,
                data: form,
                success:function(result){
                    console.log(result);
                    var data = result.data;
                    var app_menus = `<ul>`;
                    var app_menus_mobile = `<ul class="scrollable__content py-2">`;
                    for (let iMenus = 0; iMenus < data.length; iMenus++) {
                       console.log(data[iMenus].title+' - '+data[iMenus].is_checked)
                       if (!data[iMenus].sub_menu) {
                            if (data[iMenus].is_checked==1) {
                                app_menus += `
                                <li>
                                    <a href="`+site_url+`/`+data[iMenus].url+`" class="top-menu">
                                        <div class="top-menu__icon"> <i class="`+data[iMenus].icon+`"></i> </div>
                                        <div class="top-menu__title"> `+data[iMenus].title+` </div>
                                    </a>
                                </li>`;
                                app_menus_mobile += `
                                <li>
                                    <a href="`+site_url+`/`+data[iMenus].url+`" class="menu menu--active">
                                        <div class="menu__icon"> <i class="`+data[iMenus].icon+`"></i> </div>
                                        <div class="menu__title"> `+data[iMenus].title+` </div>
                                    </a>
                                </li>`;
                            }
                       }else{
                            var res_submenus = JSON.parse(data[iMenus].sub_menu);
                            var app_submenus= '';
                            var app_submenus_mobile = '';
                            for (var iSubMenus = 0; iSubMenus < res_submenus.length; iSubMenus++) {
                                if (res_submenus[iSubMenus].is_checked == 1) {
                                    app_submenus += `
                                        <li>
                                            <a href="`+site_url+`/`+res_submenus[iSubMenus].url+`" class="top-menu">
                                                <div class="top-menu__icon"> <i class="`+res_submenus[iSubMenus].icon+`"></i> </div>
                                                <div class="top-menu__title"> `+res_submenus[iSubMenus].title+` </div>
                                            </a>
                                        </li>
                                    `;

                                    app_submenus_mobile += `
                                        <li>
                                            <a href="`+site_url+`/`+res_submenus[iSubMenus].url+`" class="menu menu--active">
                                                <div class="menu__icon"> <i class="`+res_submenus[iSubMenus].icon+`"></i> </div>
                                                <div class="menu__title"> `+res_submenus[iSubMenus].title+` </div>
                                            </a>
                                        </li>
                                    `;
                                }
                            }

                            if (data[iMenus].is_checked==1) {
                                app_menus += `
                                <li>
                                    <a href="javascript:;" class="top-menu">
                                        <div class="top-menu__icon"> <i class="`+data[iMenus].icon+`"></i> </div>
                                        <div class="top-menu__title"> `+data[iMenus].title+`
                                            <i data-lucide="chevron-down" class="top-menu__sub-icon"></i>
                                        </div>
                                    </a>
                                    <ul class="">
                                    `+app_submenus+`
                                    </ul>
                                </li>`;
                                // console.log(app_menus);

                                app_menus_mobile += `
                                <li>
                                    <a href="javascript:;" class="menu">
                                        <div class="menu__icon"> <i class="`+data[iMenus].icon+`"></i> </div>
                                        <div class="menu__title"> `+data[iMenus].title+` <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                                        </div>
                                    </a>
                                    <ul class="">
                                    `+app_submenus_mobile+`
                                    </ul>
                                </li>`;
                            }
                       }

                    }
                    app_menus += `</ul>`;
                    app_menus_mobile += `</ul>`;
                    $('#appMenus').html(app_menus);
                    $('#appMenusMobile').html(app_menus_mobile);
                }
            });
        }
    </script>
    @yield('script')
    <!-- END: JS Assets-->
</body>

</html>
