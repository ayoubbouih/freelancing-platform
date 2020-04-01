<div class="text-center text-light" data-toggle="modal" data-target="#modalLRForm">
        <i class="fa fa-user-plus"></i> <span>S'enregister</span>
         <i class="fa fa-sign-in"></i> <span>S'indentifier</span>
</div>
    
    <!--Modal: Login / Register Form-->
    <div class="modal fade" id="modalLRForm">
        <div class="modal-dialog cascading-modal">
          <!--Content-->
          <div class="modal-content">
      
            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                    Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                    Register</a>
                </li>
               </ul>
      
              <!-- Tab panels -->
              <div class="tab-content">
                <!--Panel 7-->
                <div class="tab-pane fade in show" id="panel7" role="tabpanel">
      
                  <!--Body-->
                  <div class="modal-body mb-1">
                        <!-- Welcome Text -->
                        <div>
                            <h3>Nous sommes ravis de vous revoir!</h3>
                            <span>Vous n'avez pas de compte? <a href="#" class="nav-link d-inline p-0">S'inscrire!</a></span>
                        </div>
                            
                        <!-- Form -->
                        <form method="post" action="">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user-o"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Email Address" required />
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" autocomplete="current-password" required />
                            </div>

                            <a href="#" class="nav-link">Mot de passe oublié?</a>
                            <button class="btn btn-primary btn-block">Log In</button>
                        </form>
                        
                        <!-- Social Login -->
                        <div class="text-center"><b>ou</b></div>
                        <div>
                            <button class="btn btn-outline" style="background: #dd4b39;color:#fff"> Log In via Google</button>
                        </div>
                  </div>
      
                </div>
                <!--/.Panel 7-->
      
                <!--Panel 8-->
            <div class="tab-pane fade show active" id="panel8" role="tabpanel">
      
                <!--Body-->
                <div class="modal-body">
                   <!-- Welcome Text -->
                <div class="">
                    <h3>Créons votre compte!</h3>
                </div>
            
                <!-- Form -->
                <form method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user-o"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Email Address" required />
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control" placeholder="password" required />
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control" placeholder="repeat password" required />
                    </div>
                </form>
                
                <!-- Button -->
                <button class="btn btn-success btn-block">Register</button>
                
               <!-- Social Login -->
               <div class="text-center"><b>ou</b></div>
               <div>
                   <button class="btn btn-outline" style="background: #dd4b39;color:#fff"> Log In via Google</button>
               </div>
                </div>
      
            </div>
          </div>
          <!--/.Content-->
        </div>
      </div>
      <!--Modal: Login / Register Form-->