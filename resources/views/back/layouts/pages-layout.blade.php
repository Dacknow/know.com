<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>@yield('pageTitle')</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="/back/vendors/images/icon-k.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="/back/vendors/images/icon-k.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="/back/vendors/images/icon-k.png"
		/>
        
		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="/back/vendors/styles/coret.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="/back/vendors/styles/icon-font.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="/back/vendors/styles/style.css" />
        
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->
        @stack('stylesheet')
        @livewireStyles
    </head>
    <body>

        @include('back.layouts.inc.header')

        @yield('pageHeader')

        <div class="right-sidebar">
            <div class="sidebar-title">
                <h3 class="weight-600 font-16 text-blue">
                    Layout Settings
                    <span class="btn-block font-weight-400 font-12"
                        >User Interface Settings</span
                    >
                </h3>
                <div class="close-sidebar" data-toggle="right-sidebar-close">
                    <i class="icon-copy ion-close-round"></i>
                </div>
            </div>
            <div class="right-sidebar-body customscroll">
                <div class="right-sidebar-body-content">
                    <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                    <div class="sidebar-btn-group pb-30 mb-10">
                        <a
                            href="javascript:void(0);"
                            class="btn btn-outline-primary header-white active"
                            >White</a
                        >
                        <a
                            href="javascript:void(0);"
                            class="btn btn-outline-primary header-dark"
                            >Dark</a
                        >
                    </div>

                    <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                    <div class="sidebar-btn-group pb-30 mb-10">
                        <a
                            href="javascript:void(0);"
                            class="btn btn-outline-primary sidebar-light"
                            >White</a
                        >
                        <a
                            href="javascript:void(0);"
                            class="btn btn-outline-primary sidebar-dark active"
                            >Dark</a
                        >
                    </div>

                    <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                    <div class="sidebar-radio-group pb-10 mb-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input
                                type="radio"
                                id="sidebaricon-1"
                                name="menu-dropdown-icon"
                                class="custom-control-input"
                                value="icon-style-1"
                                checked=""
                            />
                            <label class="custom-control-label" for="sidebaricon-1"
                                ><i class="fa fa-angle-down"></i
                            ></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input
                                type="radio"
                                id="sidebaricon-2"
                                name="menu-dropdown-icon"
                                class="custom-control-input"
                                value="icon-style-2"
                            />
                            <label class="custom-control-label" for="sidebaricon-2"
                                ><i class="ion-plus-round"></i
                            ></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input
                                type="radio"
                                id="sidebaricon-3"
                                name="menu-dropdown-icon"
                                class="custom-control-input"
                                value="icon-style-3"
                            />
                            <label class="custom-control-label" for="sidebaricon-3"
                                ><i class="fa fa-angle-double-right"></i
                            ></label>
                        </div>
                    </div>

                    <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                    <div class="sidebar-radio-group pb-30 mb-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input
                                type="radio"
                                id="sidebariconlist-1"
                                name="menu-list-icon"
                                class="custom-control-input"
                                value="icon-list-style-1"
                                checked=""
                            />
                            <label class="custom-control-label" for="sidebariconlist-1"
                                ><i class="ion-minus-round"></i
                            ></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input
                                type="radio"
                                id="sidebariconlist-2"
                                name="menu-list-icon"
                                class="custom-control-input"
                                value="icon-list-style-2"
                            />
                            <label class="custom-control-label" for="sidebariconlist-2"
                                ><i class="fa fa-circle-o" aria-hidden="true"></i
                            ></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input
                                type="radio"
                                id="sidebariconlist-3"
                                name="menu-list-icon"
                                class="custom-control-input"
                                value="icon-list-style-3"
                            />
                            <label class="custom-control-label" for="sidebariconlist-3"
                                ><i class="dw dw-check"></i
                            ></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input
                                type="radio"
                                id="sidebariconlist-4"
                                name="menu-list-icon"
                                class="custom-control-input"
                                value="icon-list-style-4"
                                checked=""
                            />
                            <label class="custom-control-label" for="sidebariconlist-4"
                                ><i class="icon-copy dw dw-next-2"></i
                            ></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input
                                type="radio"
                                id="sidebariconlist-5"
                                name="menu-list-icon"
                                class="custom-control-input"
                                value="icon-list-style-5"
                            />
                            <label class="custom-control-label" for="sidebariconlist-5"
                                ><i class="dw dw-fast-forward-1"></i
                            ></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input
                                type="radio"
                                id="sidebariconlist-6"
                                name="menu-list-icon"
                                class="custom-control-input"
                                value="icon-list-style-6"
                            />
                            <label class="custom-control-label" for="sidebariconlist-6"
                                ><i class="dw dw-next"></i
                            ></label>
                        </div>
                    </div>

                    <div class="reset-options pt-30 text-center">
                        <button class="btn btn-danger" id="reset-settings">
                            Reset Settings
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="left-side-bar">
            <div class="brand-logo">
                <a href="{{route('author.home')}}">
                    <img src="/back/vendors/images/logo-dark.png" alt="" class="dark-logo" />
                    <img src="/back/vendors/images/logo.png" alt="" class="light-logo"/>
                </a>
                <div class="close-sidebar" data-toggle="left-sidebar-close">
                    <i class="ion-close-round"></i>
                </div>
            </div>
            <div class="menu-block customscroll">
                <div class="sidebar-menu">
                    <ul id="accordion-menu">
                        <li>
                            <a href="calendar.html" class="dropdown-toggle no-arrow">
                                <span class="micon bi bi-house"></span
                                ><span class="mtext">Inicio</span>
                            </a>
                        </li>
                        <li>
                            <a href="sitemap.html" class="dropdown-toggle no-arrow">
                                <span class="micon bi bi-boxes"></span
                                ><span class="mtext">Categorías</span>
                            </a>
                        </li>
                        <li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle" data-option="off">
								<span class="micon bi bi-collection-fill"></span><span class="mtext">Publicaciones</span>
							</a>
							<ul class="submenu">
								<li><a href="">Nueva Publicación</a></li>
								<li><a href="">Ver todas las publicaciones</a></li>
							</ul>
						</li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle" data-option="off">
								<span class="micon dw dw-settings2"></span><span class="mtext">configuraciones</span>
							</a>
							<ul class="submenu">
								<li><a href="">Generales</a></li>
							</ul>
						</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mobile-menu-overlay"></div>

        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                                       
                        @yield('content')
                    
                </div>
                
                @include('back.layouts.inc.footer')

            </div>
        </div>
        <!-- js -->
        <script src="/back/vendors/scripts/core.js"></script>
        <script src="/back/vendors/scripts/script.min.js"></script>
        <script src="/back/vendors/scripts/process.js"></script>
        <script src="/back/vendors/scripts/layout-settings.js"></script>

        @stack('scripts')
        @livewireScripts
    </body>
</html>