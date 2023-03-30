<aside class="adminpopular-sidebar">

        <div class="sidebar-user">

            <!-- <img class="sidebar-user-avatar" src="{{asset('assets/backend/images/pic.jpg')}}" alt="User Image"> -->

            <div>

                <p class="sidebar-user-name">{{Auth::user()->name}}</p>

                <!-- <p class="sidebar-user-designation">Frontend Developer</p> -->

            </div>

        </div>

        <ul class="adminpopular-menu">

            <li>

                <a class="nav-item" href="{{route('dashboard')}}">

                    <i class="nav-icon fa fa-home"></i>

                    <span class="nav-label">Dashboard</span>

                </a>

            </li>

            <li>

                <a class="nav-item" href="{{route('form.list')}}">

                    <i class="nav-icon fa fa-envelope"></i>

                    <span class="nav-label">Form List</span>

                </a>

            </li>

            <li>

                <a class="nav-item" href="{{route('profile')}}">

                    <i class="nav-icon fa fa-user"></i>

                    <span class="nav-label">profile</span>

                </a>

            </li>



            <li>

                <a class="nav-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                    <i class="nav-icon fa fa-sign-out"></i>

                    <span class="nav-label">Logout</span>

                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

										@csrf

									</form>

            </li>



        </ul>

    </aside>