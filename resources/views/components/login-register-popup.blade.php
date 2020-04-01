<div>
    <a href="#" data-toggle="modal" data-target="#sign-in-dialog"><span>Log In / Register</span></a>
</div>

    <div id="sign-in-dialog" class="d-none sign-in-dialog" style="position:absolute;right:0;margin:auto;z-index:2;min-width:auto">
        <!--Tabs -->
        <div class="" style="background:skyblue">
            <ul class="nav nav-tabs nav-stacked">
                <li class="nav-item">
                    <a href="#login" class="nav-link active" data-toggle="tab">Log In</a>
                </li>
                <li class="nav-item">
                    <a href="#register" class="nav-link" data-toggle="tab">Register</a>
                </li>
            </ul>
            <div class="tab-content">

                <!-- Login -->
                <div class="tab-pane fade active show" id="login">
                    
                    <!-- Welcome Text -->
                    <div>
                        <h3>Nous sommes ravis de vous revoir!</h3>
                        <span>Vous n'avez pas de compte? <a href="#">S'inscrire!</a></span>
                    </div>
                        
                    <!-- Form -->
                    <form method="post" action="">
                        <div>
                            <input type="text" placeholder="Email Address" autocomplete="username" required/>
                        </div>

                        <div>
                            <input type="password" placeholder="Password" autocomplete="current-password" required/>
                        </div>
                        <a href="#">Mot de passe oublié?</a>
                    </form>
                    
                    <!-- Button -->
                    <button type="submit">Log In</button>
                    
                    <!-- Social Login -->
                    <div><span>ou</span></div>
                    <div>
                        <button> Log In via Facebook</button>
                        <button> Log In via Google+</button>
                    </div>

                </div>

                <!-- Register -->
                <div class="tab-pane fade" id="register">
                    
                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3>Créons votre compte!</h3>
                    </div>
                
                    <!-- Form -->
                    <form method="post" id="register-account-form">
                        <div>
                            <input type="text" placeholder="Email Address"autocomplete="off"  required/>
                        </div>

                        <div>
                            <input type="password" placeholder="Password" autocomplete="new-password" required/>
                        </div>

                        <div>
                            <input type="password" placeholder="Repeat Password" autocomplete="new-password" required/>
                        </div>
                    </form>
                    
                    <!-- Button -->
                    <button type="submit">Register</button>
                    
                    <!-- Social Login -->
                    <div><span>ou</span></div>
                    <div>
                        <button> Register via Facebook</button>
                        <button> Register via Google+</button>
                    </div>

                </div>

            </div>
        </div>
    </div>