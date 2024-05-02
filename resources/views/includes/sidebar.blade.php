 <div class="flapt-sidemenu-wrapper">
     <!-- Desktop Logo -->
     <div class="flapt-logo">
         <a href="index.html"><img class="desktop-logo" src="img/core-img/logo.png" alt="Desktop Logo"> <img
                 class="small-logo" src="img/core-img/small-logo.png" alt="Mobile Logo"></a>
     </div>

     <!-- Side Nav -->
     <div class="flapt-sidenav" id="flaptSideNav">
         <!-- Side Menu Area -->
         <div class="side-menu-area">
             <!-- Sidebar Menu -->
             <nav>
                 <ul class="sidebar-menu" data-widget="tree">
                    <li class="menu-header-title">Dashboard</li>
                     {{-- <li class="active">
                         <a href="#">
                             <i class='bx bx-home-heart'></i>
                             <span>Dashboard</span>
                         </a>
                     </li> --}}
                    <li class="px-0 py-1
                        {{ request()->is('/') ? 'active' : '' }}">
                         <a href="{{ route('dashboard') }}">
                             <div class="d-flex justify-content-center w-100">
                                 <i class='bx bx-home'></i>
                                 <span >Dashboard</span>
                             </div>
                         </a>
                    </li>

                    <li class="px-0 py-1
                        {{ request()->is('recipient') || request()->is('recipient/*') ? 'active' : '' }}">
                         <a href="{{ route('recipient') }}">
                             <div class="d-flex justify-content-center w-100">
                                 <i class='bx bx-group'></i>
                                 <span >Recipient</span>
                             </div>
                         </a>
                    </li>
                 </ul>
             </nav>
         </div>
     </div>
 </div>
