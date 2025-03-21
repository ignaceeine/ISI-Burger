<header class="top-header">
    <nav class="navbar navbar-expand align-items-center gap-4">
        <div class="btn-toggle">
            <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
        </div>
        <div class="search-bar flex-grow-1">
            <div class="position-relative">
                <input class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text" placeholder="Search">
                <span class="material-icons-outlined position-absolute d-lg-block d-none ms-3 translate-middle-y start-0 top-50">search</span>
                <span class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 search-close">close</span>
                <div class="search-popup p-3">
                    <div class="card rounded-4 overflow-hidden">
                        <div class="card-header d-lg-none">
                            <div class="position-relative">
                                <input class="form-control rounded-5 px-5 mobile-search-control" type="text" placeholder="Search">
                                <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                                <span class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 mobile-search-close">close</span>
                            </div>
                        </div>
                        <div class="card-body search-content">
                            <p class="search-title">Recent Searches</p>
                            <div class="d-flex align-items-start flex-wrap gap-2 kewords-wrapper">
                                <a href="javascript:;" class="kewords"><span>Angular Template</span><i
                                        class="material-icons-outlined fs-6">search</i></a>
                                <a href="javascript:;" class="kewords"><span>Dashboard</span><i
                                        class="material-icons-outlined fs-6">search</i></a>
                                <a href="javascript:;" class="kewords"><span>Admin Template</span><i
                                        class="material-icons-outlined fs-6">search</i></a>
                                <a href="javascript:;" class="kewords"><span>Bootstrap 5 Admin</span><i
                                        class="material-icons-outlined fs-6">search</i></a>
                                <a href="javascript:;" class="kewords"><span>Html eCommerce</span><i
                                        class="material-icons-outlined fs-6">search</i></a>
                                <a href="javascript:;" class="kewords"><span>Sass</span><i
                                        class="material-icons-outlined fs-6">search</i></a>
                                <a href="javascript:;" class="kewords"><span>laravel 9</span><i
                                        class="material-icons-outlined fs-6">search</i></a>
                            </div>
                            <hr>
                            <p class="search-title">Tutorials</p>
                            <div class="search-list d-flex flex-column gap-2">
                                <div class="search-list-item d-flex align-items-center gap-3">
                                    <div class="list-icon">
                                        <i class="material-icons-outlined fs-5">play_circle</i>
                                    </div>
                                    <div class="">
                                        <h5 class="mb-0 search-list-title ">Wordpress Tutorials</h5>
                                    </div>
                                </div>
                                <div class="search-list-item d-flex align-items-center gap-3">
                                    <div class="list-icon">
                                        <i class="material-icons-outlined fs-5">shopping_basket</i>
                                    </div>
                                    <div class="">
                                        <h5 class="mb-0 search-list-title">eCommerce Website Tutorials</h5>
                                    </div>
                                </div>

                                <div class="search-list-item d-flex align-items-center gap-3">
                                    <div class="list-icon">
                                        <i class="material-icons-outlined fs-5">laptop</i>
                                    </div>
                                    <div class="">
                                        <h5 class="mb-0 search-list-title">Responsive Design</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center bg-transparent">
                            <a href="javascript:;" class="btn w-100">See All Search Results</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="navbar-nav gap-1 nav-right-links align-items-center">
            <li class="nav-item d-lg-none mobile-search-btn">
                <a class="nav-link" href="javascript:;"><i class="material-icons-outlined">search</i></a>
            </li>
            <div class="notify-list">

            </div>
            <li class="nav-item dropdown">
                <a href="javascript:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                    <img src="{{ URL::asset('img/profile.jpg') }}" class="rounded-circle p-1 border bg-primary" width="40" height="40">
                </a>
                <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                    <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                        <div class="text-center">
                            <p class="mb-0 fs-6" style="max-width: 250px; white-space: normal; word-break: break-word">{{ Auth::user()->name}}</p>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                            class="material-icons-outlined">person_outline</i>Mon Profil</a>
                    <hr class="dropdown-divider">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2">
                            <i data-lucide="log-out" class="material-icons-outlined">logout</i>
                            {{ __('Se déconnecter') }}
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
</header>
