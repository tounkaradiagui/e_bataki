<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #0E4C92;" >
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('secretaire/dashboard')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiii-basic" aria-expanded="false" aria-controls="uii-basic">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Courriers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="uiii-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('mescourriers') }}">Courriers entrants</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('courriersSortants')}}">Couriers sortants</a></li>
              </ul>
            </div>
          </li>

        </ul>
      </nav>
