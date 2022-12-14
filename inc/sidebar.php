<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand navbar-brand-autodark">
      <a href=".">
        <img src="<?php echo SITE_URL ?>/static/logo.png" width="192" height="192" alt="Logo" class="navbar-brand-image">
      </a>
    </h1>
    
    <?php 
    //User Information and Menu for Mobile
    require_once("template-parts/_user-menu-sm.php");
    ?>

    <div class="collapse navbar-collapse" id="navbar-menu">
      <ul class="navbar-nav pt-lg-3 flex-grow-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_URL ?>" >
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Icon home -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
            </span>
            <span class="nav-link-title">
              Home
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_URL . "/chat" ?>" >
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-messages" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10"></path> <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2"></path> </svg>
            </span>
            <span class="nav-link-title">
              Chat
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#navbar-important" >
            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Icon star -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
            </span>
            <span class="nav-link-title">
              Important
            </span>
          </a>
        </li>
      </ul>

      <div class="dropdown-divider"></div>

      <!-- Display Personal and Project List -->
      <div class="task-project-list"></div>
      <!-- END -->
      
      <div class="dropdown-divider"></div>
      <?php if ( is_admin() ) {?>
        <div class="collapse navbar-collapse" id="navbar-menu">
          <ul class="navbar-nav pt-lg-3 p-3">
            <li class="nav-item mt-auto">
              <a href="#" class="btn btn-primary d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-add-club">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Create New Club
              </a>
            </li>
          </ul>
        </div>
      <?php } ?>

    </div>
  </div>
</aside>