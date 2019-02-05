 <div class="header">
     <div class="container">
         <nav class="navbar navbar-inverse" role="navigation">
             <div class="navbar-header">
                 <button
                    class="navbar-toggle"
                    data-target="#main-nav"
                    data-toggle="collapse"
                    id="nav-toggle"
                    type="button"
                >
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>

                 <div class="logo"></div>
                 <a href="#" class="navbar-brand scroll-top">

                 </a>
             </div>

             <div id="main-nav" class="collapse navbar-collapse">
                 <ul class="nav navbar-nav top-menu">
                    @if(isActiveRoute('pages.index'))
                        <li><a href="#" class="scroll-link" data-id="about">{{ __('home.about') }}</a></li>
                        <li><a href="#" class="scroll-link" data-id="portfolio">{{ __('home.portfolio') }}</a></li>
                        <!-- <li><a href="#" class="scroll-link" data-id="blog">{{ __('home.blog') }}</a></li> -->
                        <li><a href="#" class="scroll-link" data-id="opening-hours">{{ __('home.opening-hours') }}</a></li>
                        <li><a href="#" class="scroll-link" data-id="price">{{ __('home.price') }}</a></li>
                        <li><a href="#" class="scroll-link" data-id="contact">{{ __('home.contact') }}</a></li>
                    @else
                        <li><a href="{{ route('pages.index') }}">{{ __('home.index') }}</a></li>
                    @endif

                    @auth
                        <li><a href="{{ route('dashboard.index') }}">{{ __('home.dashboard') }}</a></li>
                        <li><a href="#" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">{{ __('home.logout') }}</a></li>

                        <form
                            action="{{ route('logout') }}"
                            id="logout-form"
                            method="POST"
                            style="display: none;"
                        >
                            @csrf
                            @method('post')
                        </form>
                    @endauth
                 </ul>
             </div>
         </nav>
     </div>
 </div>
