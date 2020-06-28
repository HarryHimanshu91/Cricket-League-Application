<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="{{ URL::to('/') }}">Cricket League</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('viewMatch') }}">Matches</a></li>
        <li><a href="{{ route('viewTeams') }}">Teams</a></li>
        <li><a href="{{ route('Points') }}">Points Table </a></li>

        <li><a class="adminpanelcss" href="{{ route('adminLogin') }}">Go To Admin Panel </a></li>
      </ul>
    </div>
  </div>
</nav>