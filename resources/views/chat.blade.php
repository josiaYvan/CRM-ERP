<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themepixels.me/demo/bracketplus1.4/app/template/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Sep 2021 12:46:55 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>CRM ENTREPRISE</title>

    <!-- vendor css -->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css/ionicons.min.css') }}" rel="stylesheet">

    {{-- tailwind --}}
    <link rel="stylesheet" href=" {{ mix('css/app.css') }} ">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('css/bracket.css') }}">

</head>

<body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo">
        <a href="#">
            <span>
                [
            </span>ERP <i>ENTREPRISE</i><span>
                ]
            </span>
        </a>
    </div>
    <div class="br-sideleft sideleft-scrollbar">
        <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
        <ul class="br-sideleft-menu">
            <li class="br-menu-item">
                <a href=" {{ route('dashboard') }} " class="br-menu-link">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                    <span class="menu-item-label">TABLEAU DE BORD</span>
                </a><!-- br-menu-link -->
            </li><!-- br-menu-item -->

            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">PERSONNEL</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    @if (auth()->user()->role === 1)
                        <li class="sub-item"><a href=" {{ route('personnels.create') }} " class="sub-link">Nouveau
                                personnel</a></li>
                    @endif
                    <li class="sub-item"><a href=" {{ route('personnels.index') }} " class="sub-link">Liste
                            personnel</a></li>
                </ul>
            </li>
            @if (auth()->user()->role !== 0)
                <li class="br-menu-item">
                    <a href="#" class="br-menu-link with-sub">
                        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                        <span class="menu-item-label">CLIENTS</span>
                    </a><!-- br-menu-link -->
                    <ul class="br-menu-sub">
                        @if (auth()->user()->role === 1)
                            <li class="sub-item"><a href="{{ route('clients.create') }}" class="sub-link">Nouveau
                                    client</a>
                            </li>
                        @endif
                        <li class="sub-item"><a href="{{ route('clients.index') }}" class="sub-link">Liste client</a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">TACHES</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    @if (auth()->user()->role === 1)
                        <li class="sub-item"><a href=" {{ route('taches.create') }} " class="sub-link">Nouvelle
                                tâche</a>
                        </li>
                    @endif

                    <li class="sub-item"><a href=" {{ route('taches.index') }} " class="sub-link">Liste des tâches</a>
                    </li>
                </ul>
            </li>

            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">POSTES</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    @if (auth()->user()->role === 1)
                        <li class="sub-item"><a href=" {{ route('postes.create') }} " class="sub-link">Nouveau
                                poste</a>
                        </li>
                    @endif

                    <li class="sub-item"><a href=" {{ route('postes.index') }} " class="sub-link">Liste poste</a></li>
                </ul>
            </li>

            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">CONGES</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    @if (auth()->user()->role !== 3)
                        <li class="sub-item"><a href=" {{ route('conges.create') }} " class="sub-link">Demander
                                congé</a>
                        </li>
                    @endif
                    <li class="sub-item"><a href=" {{ route('conges.index') }} " class="sub-link">Liste congé</a>
                    </li>
                </ul>
            </li>
            <li class="br-menu-item">
                <a href=" {{ route('chatify') }} " class="br-menu-link">
                    <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                    <span class="menu-item-label">MESSAGES</span>
                </a><!-- br-menu-link -->
            </li><!-- br-menu-item -->

            @if (Auth::user()->role === 1)
                <li class="br-menu-item">
                    <a href=" {{ route('users.index') }} " class="br-menu-link">
                        <span class="menu-item-label">UTILISATEUR</span>
                    </a><!-- br-menu-link -->
                </li><!-- br-menu-item -->
            @endif

        </ul><!-- br-sideleft-menu -->



        <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
        <div class="br-header-left">
            <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href="#"><i
                        class="icon ion-navicon-round"></i></a></div>
            <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href="#"><i
                        class="icon ion-navicon-round"></i></a></div>
            <div class="input-group hidden-xs-down wd-170 transition">
                <input id="searchbox" type="text" class="form-control d-none" placeholder="Search">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
                </span>
            </div><!-- input-group -->
        </div><!-- br-header-left -->
        <div class="br-header-right">
            <nav class="nav">
                <div class="dropdown">
                    <a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                        <i class="icon ion-ios-email-outline tx-24"></i>
                        <!-- start: if statement -->
                        <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
                        <!-- end: if statement -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-header">
                        <div class="dropdown-menu-label">
                            <label>Messages</label>
                            <a href="#">+ Add New Message</a>
                        </div><!-- d-flex -->

                        <div class="media-list">
                            <!-- loop starts here -->
                            <a href="#" class="media-list-link">
                                <div class="media">
                                    <img src="../img/img3.jpg" alt="">
                                    <div class="media-body">
                                        <div>
                                            <p>Donna Seay</p>
                                            <span>2 minutes ago</span>
                                        </div><!-- d-flex -->
                                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet
                                            mornings of spring.</p>
                                    </div>
                                </div><!-- media -->
                            </a>
                            <!-- loop ends here -->
                            <a href="#" class="media-list-link read">
                                <div class="media">
                                    <img src="../img/img4.jpg" alt="">
                                    <div class="media-body">
                                        <div>
                                            <p>Samantha Francis</p>
                                            <span>3 hours ago</span>
                                        </div><!-- d-flex -->
                                        <p>My entire soul, like these sweet mornings of spring.</p>
                                    </div>
                                </div><!-- media -->
                            </a>
                            <a href="#" class="media-list-link read">
                                <div class="media">
                                    <img src="../img/img7.jpg" alt="">
                                    <div class="media-body">
                                        <div>
                                            <p>Robert Walker</p>
                                            <span>5 hours ago</span>
                                        </div><!-- d-flex -->
                                        <p>I should be incapable of drawing a single stroke at the present moment...</p>
                                    </div>
                                </div><!-- media -->
                            </a>
                            <a href="#" class="media-list-link read">
                                <div class="media">
                                    <img src="../img/img5.jpg" alt="">
                                    <div class="media-body">
                                        <div>
                                            <p>Larry Smith</p>
                                            <span>Yesterday</span>
                                        </div><!-- d-flex -->
                                        <p>When, while the lovely valley teems with vapour around me, and the meridian
                                            sun strikes...</p>
                                    </div>
                                </div><!-- media -->
                            </a>
                            <div class="dropdown-footer">
                                <a href="#"><i class="fa fa-angle-down"></i> Show All Messages</a>
                            </div>
                        </div><!-- media-list -->
                    </div><!-- dropdown-menu -->
                </div><!-- dropdown -->
                <div class="dropdown">
                    <a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                        <i class="icon ion-ios-bell-outline tx-24"></i>
                        <!-- start: if statement -->
                        <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
                        <!-- end: if statement -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-header">
                        <div class="dropdown-menu-label">
                            <label>Notifications</label>
                            <a href="#">Mark All as Read</a>
                        </div><!-- d-flex -->

                        <div class="media-list">
                            <!-- loop starts here -->
                            <a href="#" class="media-list-link read">
                                <div class="media">
                                    <img src="../img/img8.jpg" alt="">
                                    <div class="media-body">
                                        <p class="noti-text"><strong>Suzzeth Bungaos</strong> tagged you and 18 others
                                            in a post.</p>
                                        <span>October 03, 2017 8:45am</span>
                                    </div>
                                </div><!-- media -->
                            </a>
                            <!-- loop ends here -->
                            <a href="#" class="media-list-link read">
                                <div class="media">
                                    <img src="../img/img9.jpg" alt="">
                                    <div class="media-body">
                                        <p class="noti-text"><strong>Mellisa Brown</strong> appreciated your work
                                            <strong>The Social Network</strong>
                                        </p>
                                        <span>October 02, 2017 12:44am</span>
                                    </div>
                                </div><!-- media -->
                            </a>
                            <a href="#" class="media-list-link read">
                                <div class="media">
                                    <img src="../img/img10.jpg" alt="">
                                    <div class="media-body">
                                        <p class="noti-text">20+ new items added are for sale in your <strong>Sale
                                                Group</strong></p>
                                        <span>October 01, 2017 10:20pm</span>
                                    </div>
                                </div><!-- media -->
                            </a>
                            <a href="#" class="media-list-link read">
                                <div class="media">
                                    <img src="../img/img5.jpg" alt="">
                                    <div class="media-body">
                                        <p class="noti-text"><strong>Julius Erving</strong> wants to connect with you
                                            on your conversation with <strong>Ronnie Mara</strong></p>
                                        <span>October 01, 2017 6:08pm</span>
                                    </div>
                                </div><!-- media -->
                            </a>
                            <div class="dropdown-footer">
                                <a href="#"><i class="fa fa-angle-down"></i> Show All Notifications</a>
                            </div>
                        </div><!-- media-list -->
                    </div><!-- dropdown-menu -->
                </div><!-- dropdown -->
                <div class="dropdown">
                    <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown">
                        <span class="logged-name hidden-md-down"> {{ Auth::user()->name }} </span>
                        <img src="../img/img1.jpg" class="wd-32 rounded-circle" alt="">
                        <span class="square-10 bg-success"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-header wd-250">
                        <div class="tx-center">
                            <a href=" {{ route('profils.index') }} "><img src="../img/img1.jpg"
                                    class="wd-80 rounded-circle" alt="">
                                @if (Auth::user()->image)
                                    <img src="/storage/image_profil/{{ Auth::user()->image }}" alt="image de profil"
                                        style="max-width: 20%; position:absolute; top: 20px;" class="rounded-circle">
                                @endif
                                <h6 class="logged-fullname"> {{ Str::ucfirst(Auth::user()->name) }} </h6>
                                <p>{{ Auth::user()->email }}</p>
                            </a>
                        </div>
                        <hr>

                        <ul class="list-unstyled user-profile-nav">
                            <li>

                                <a href=" {{ route('profils.edit', Auth::user()->id) }} "><i
                                        class="icon ion-ios-person"></i> Edit
                                    Profile</a>
                            </li>
                            <li><a href="#"><i class="icon ion-ios-gear"></i> Settings</a></li>
                            <li><a href="#"><i class="icon ion-ios-download"></i> Downloads</a></li>
                            <li><a href="#"><i class="icon ion-ios-star"></i> Favorites</a></li>
                            <li><a href="#"><i class="icon ion-ios-folder"></i> Collections</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        <i class="icon ion-power"></i>
                                        Sign Out
                                    </a>
                                </form>
                            </li>

                        </ul>
                    </div><!-- dropdown-menu -->
                </div><!-- dropdown -->
            </nav>
        </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pagebody" style="position: relative;">

            @yield('main-message')
        </div>
    </div>

    <!-- ########## END: MAIN PANEL ########## -->


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/jquery.peity.min.js') }}"></script>

    <script src="{{ asset('js/bracket.js') }}"></script>


</body>

</html>
