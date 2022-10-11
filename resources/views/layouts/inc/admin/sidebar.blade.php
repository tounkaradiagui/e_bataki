  <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #0E4C92;" >
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/dashboard')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiii-basic" aria-expanded="false" aria-controls="uiii-basic">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Courriers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="uiii-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/courrierentrandd') }}">Courriers entrants</a></li>
                <li class="nav-item"> <a class="nav-link" href="">Couriers sortants</a></li>
              </ul>
            </div>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Ventes</span>
            </a>
          </li> -->


          <li class="nav-item">
            <a class="nav-link" href="{{ url ('/departements')}}">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Gérer départements</span>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="" aria-expanded="false" aria-controls="uii-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Gérer départements</span>
              <i class="menu-arrow"></i>
            </a>
          </li> --}}



          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#gerer" aria-expanded="false" aria-controls="gerer">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Gérer utilisateurs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="gerer">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="">Admins</a>

              </li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/secretaire') }}">Secrétaires</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/utilisateursadd') }}">Simple utilisateurs</a></li>


              </ul>
            </div>
          </li>


        </ul>
      </nav>

