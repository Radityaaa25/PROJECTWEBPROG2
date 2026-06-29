<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('image/icon_univ_bsi.png')}}">
    <title>Toko Online</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/extra-libs/multicheck/multicheck.css') }}">
    <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
    /* Dark Mode Styles */
    body.dark-mode, 
    body.dark-mode #main-wrapper {
        background-color: #121212 !important;
        color: #e0e0e0 !important;
    }
    body.dark-mode .page-wrapper,
    body.dark-mode .container-fluid,
    body.dark-mode .card,
    body.dark-mode .footer {
        background-color: #1e1e1e !important;
        color: #e0e0e0 !important;
        border-color: #333 !important;
    }
    body.dark-mode .left-sidebar,
    body.dark-mode .sidebar-nav {
        background-color: #1a1a1a !important;
    }
    body.dark-mode .topbar {
        background-color: #000000 !important;
    }
    body.dark-mode .table, 
    body.dark-mode .table td, 
    body.dark-mode .table th {
        color: #e0e0e0 !important;
        border-color: #444 !important;
    }
    body.dark-mode input, 
    body.dark-mode select, 
    body.dark-mode textarea {
        background-color: #333 !important;
        color: #fff !important;
        border-color: #555 !important;
    }
    body.dark-mode .text-muted {
        color: #aaa !important;
    }
</style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="{{ route('backend.beranda') }}">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('image/icon_univ_bsi.png') }}" alt="homepage" class="light-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{ asset('image/logo_text.png') }}" alt="homepage" class="light-logo" />

                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a
                                class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Dark Mode Toggle -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)" id="theme-toggle" title="Toggle Dark/Light Mode">
                                <i class="mdi mdi-weather-night font-24" id="theme-icon"></i>
                            </a>
                        </li>
                        <!-- Comment -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect
waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" ariaexpanded="false">
                                @if (Auth::user()->foto)
                                    <img src="{{ asset('storage/img-user/' . Auth::user()->foto) }}" alt="user"
                                        class="rounded-circle" width="31" onerror="this.src='{{ asset('image/img-default.jpg') }}'">
                                @else
                                    <img src="{{ asset('image/img-default.jpg') }}" alt="user"
                                        class="rounded-circle" width="31">
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd
animated">
                                <a class="dropdown-item" href="{{
    route('backend.user.edit', Auth::user()->id) }}"><i class="ti-user m-r-5 m-l-5"></i> Profil
                                    Saya</a>
                                <a class="dropdown-item" href=""
                                    onclick="event.preventDefault(); document.getElementById('keluar-app').submit();"><i
                                        class="fa fa-power-off m-r-5 m-l-5"></i> Keluar</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect
                waves-dark sidebar-link" href="{{ route('backend.beranda') }}" aria-expanded="false"><i
                                    class="mdi mdi-view-dashboard"></i><span class="hide-menu">Beranda</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect
                waves-dark sidebar-link" href="{{ route('backend.user.index') }}" aria-expanded="false"><i
                                    class="mdi mdi-account"></i><span class="hide-menu">User</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href=" {{ route('backend.transaksi.index') }} "
                                aria-expanded="false">
                                <i class="mdi mdi-cart"></i><span class="hide-menu">Transaksi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href=" {{ route('backend.laporan_penjualan.index') }} "
                                aria-expanded="false">
                                <i class="mdi mdi-chart-line"></i><span class="hide-menu">Laporan Penjualan</span>
                            </a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waveseffect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="mdi mdishopping"></i><span
                                    class="hide-menu">Data Produk </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="{{ route('backend.kategori.index') }}" class="sidebar-link"><i
                                            class="mdi mdi-chevron-right"></i><span class="hidemenu"> Kategori </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{ route('backend.produk.index') }}" class="sidebar-link"><i
                                            class="mdi mdi-chevron-right"></i><span class="hidemenu"> Produk </span></a>
                                </li>

                                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                        aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Laporan </span></a>
                                    <ul aria-expanded="false" class="collapse first-level">
                                        <li class="sidebar-item"><a href="{{ route('backend.laporan.formuser') }}" class="sidebar-link"><i class="mdi mdi-chevronright"></i><span class="hide-menu">
                                                    User </span></a></li>
                                        <li class="sidebar-item"><a href="{{ route('backend.laporan.formproduk') }}" class="sidebar-link"><i class="mdi mdi-chevronright"></i><span
                                                    class="hide-menu"> Produk </span></a></li>
                                    </ul>
                                </li>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                {{-- @yieldAwal --}}
                @yield('content')
                {{-- @yieldAkhir --}}

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Web Programming. Studi Kasus Toko Online <a href="https://bsi.ac.id/">Kuliah..? BSI Aja !!!</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('backend/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('backend/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('backend/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('backend/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('backend/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('backend/dist/js/custom.min.js') }}"></script>
    <!-- this page js -->
    <script src="{{ asset('backend/assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('backend/assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('backend/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
    <!-- form keluar app -->
    <form id="keluar-app" action="{{ route('backend.logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <!-- sweetalert -->
    <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>
    <!-- sweetalert End -->
    <!-- konfirmasi success-->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}"
            });
        </script>
    @endif
    <!-- konfirmasi success End-->
    <script type="text/javascript">
        //Konfirmasi delete
        $(document).on('click', '.show_confirm', function (event) {
            var form = $(this).closest("form");
            var konfdelete = $(this).data("konf-delete");
            event.preventDefault();
            Swal.fire({
                title: 'Konfirmasi Hapus Data?',
                html: "Data yang dihapus <strong>" + konfdelete + "</strong> tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, dihapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
    <script>
        function previewFoto() {
            const foto = document.querySelector('input[name="foto"]');
            const fotoPreview = document.querySelector('.foto-preview');
            fotoPreview.style.display = 'block';
            const fotoReader = new FileReader();
            fotoReader.readAsDataURL(foto.files[0]);
            fotoReader.onload = function (fotoEvent) {
                fotoPreview.src = fotoEvent.target.result;
                fotoPreview.style.width = '100%';
            }
        }
    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <!-- <script
    src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script> -->
    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        // Dark Mode Logic
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        const body = document.body;
        
        // Cek localStorage
        const currentTheme = localStorage.getItem('theme');
        if (currentTheme === 'dark') {
            body.classList.add('dark-mode');
            themeIcon.classList.remove('mdi-weather-night');
            themeIcon.classList.add('mdi-weather-sunny');
        }

        themeToggleBtn.addEventListener('click', function() {
            body.classList.toggle('dark-mode');
            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('theme', 'dark');
                themeIcon.classList.remove('mdi-weather-night');
                themeIcon.classList.add('mdi-weather-sunny');
            } else {
                localStorage.setItem('theme', 'light');
                themeIcon.classList.remove('mdi-weather-sunny');
                themeIcon.classList.add('mdi-weather-night');
            }
        });
    </script>
    
    <!-- Chatbot Floating Bubble -->
    <div id="chatbot-bubble" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999; cursor: pointer; width: 60px; height: 60px; background-color: #2962FF; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <i class="mdi mdi-robot font-24"></i>
    </div>

    <!-- Chatbot Window -->
    <div id="chatbot-window" style="display: none; position: fixed; bottom: 90px; right: 20px; z-index: 9998; width: 350px; background: white; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); overflow: hidden; border: 1px solid #ddd;">
        <div style="background: #2962FF; color: white; padding: 15px; display: flex; justify-content: space-between; align-items: center;">
            <h5 class="m-0 text-white">Asisten AI Admin</h5>
            <i class="mdi mdi-close" id="chatbot-close" style="cursor: pointer; font-size: 18px;"></i>
        </div>
        <div id="chatbot-messages" style="height: 300px; overflow-y: auto; padding: 15px; background: #f8f9fa;">
            <div class="d-flex mb-3">
                <div class="p-2 bg-info text-white rounded" style="max-width: 80%;">
                    Halo Admin! Saya asisten AI Anda. Ada yang bisa saya bantu terkait pengelolaan toko hari ini?
                </div>
            </div>
        </div>
        <div style="padding: 10px; border-top: 1px solid #ddd; background: white; display: flex;">
            <input type="text" id="chatbot-input" class="form-control mr-2" placeholder="Ketik pesan..." style="border-radius: 20px; background: #fff !important; color: #333 !important; border: 1px solid #ccc !important;">
            <button id="chatbot-send" class="btn btn-primary" style="border-radius: 20px;"><i class="mdi mdi-send"></i></button>
        </div>
    </div>

    <script>
        // Chatbot Bubble Draggable Logic
        const bubble = document.getElementById('chatbot-bubble');
        const chatWindow = document.getElementById('chatbot-window');
        const chatClose = document.getElementById('chatbot-close');
        let isDragging = false;
        let startX, startY, initialX, initialY;

        bubble.addEventListener('mousedown', function(e) {
            isDragging = false; // reset
            startX = e.clientX;
            startY = e.clientY;
            initialX = bubble.offsetLeft;
            initialY = bubble.offsetTop;
            bubble.style.transition = 'none';
        });

        document.addEventListener('mousemove', function(e) {
            if (startX !== undefined && startY !== undefined) {
                const dx = e.clientX - startX;
                const dy = e.clientY - startY;
                if (Math.abs(dx) > 5 || Math.abs(dy) > 5) {
                    isDragging = true;
                    bubble.style.left = initialX + dx + 'px';
                    bubble.style.top = initialY + dy + 'px';
                    bubble.style.right = 'auto'; // Disable right/bottom positioning when dragged
                    bubble.style.bottom = 'auto';
                }
            }
        });

        document.addEventListener('mouseup', function(e) {
            startX = undefined;
            startY = undefined;
        });

        // Toggle Chat Window
        bubble.addEventListener('click', function(e) {
            if (isDragging) return; // Prevent opening if it was a drag
            chatWindow.style.display = chatWindow.style.display === 'none' ? 'block' : 'none';
        });

        chatClose.addEventListener('click', function() {
            chatWindow.style.display = 'none';
        });

        // Chat Logic
        const chatInput = document.getElementById('chatbot-input');
        const chatSend = document.getElementById('chatbot-send');
        const chatMessages = document.getElementById('chatbot-messages');

        function appendChat(sender, text, isUser = false) {
            const msgDiv = document.createElement('div');
            msgDiv.className = `d-flex mb-3 ${isUser ? 'justify-content-end' : ''}`;
            
            // Format line breaks and basic markdown-like syntax
            let formattedText = text.replace(/\n/g, '<br>');
            formattedText = formattedText.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            
            msgDiv.innerHTML = `
                <div class="p-2 rounded ${isUser ? 'bg-primary text-white' : 'bg-info text-white'}" style="max-width: 80%;">
                    ${formattedText}
                </div>
            `;
            chatMessages.appendChild(msgDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        async function sendChatMessage() {
            const text = chatInput.value.trim();
            if (!text) return;

            appendChat('Anda', text, true);
            chatInput.value = '';
            
            const loadingId = 'loading-' + Date.now();
            const loadingDiv = document.createElement('div');
            loadingDiv.className = 'd-flex mb-3';
            loadingDiv.id = loadingId;
            loadingDiv.innerHTML = `<div class="p-2 bg-secondary text-white rounded">Sedang mengetik...</div>`;
            chatMessages.appendChild(loadingDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;

            try {
                const response = await fetch('{{ route("backend.chatbot.chat") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message: text })
                });

                const data = await response.json();
                document.getElementById(loadingId).remove();

                if (response.ok) {
                    appendChat('AI', data.reply);
                } else {
                    appendChat('System', 'Error: ' + data.reply);
                }
            } catch (error) {
                document.getElementById(loadingId).remove();
                appendChat('System', 'Gagal terhubung ke server.');
            }
        }

        chatSend.addEventListener('click', sendChatMessage);
        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') sendChatMessage();
        });
    </script>
    <!-- form keluar app end -->
</body>

</html>