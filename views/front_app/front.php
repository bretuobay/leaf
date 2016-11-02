<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img alt="Brand" src="assets/images/logo.png">
        </a>

        <div class="navbar-header pull-right">
            <ul class="nav navbar-nav">
                <li><a class="navbar-right" id="register_link" href="#register">
                    Register
                </a></li>
                <li><a class="navbar-right" id="login_link" href="#login">
                    Login
                </a></li>

            </ul>

        </div>
    </div>
</nav>


<div class="container">

    <div class="row">

        <div class="col-sm-8">
            <h1>Kalories Tracker</h1>

            <div id="font-pic">
                <img alt="Calories Counter" src="assets/images/calories/food1.jpeg">
            </div>

        </div>
        <!-- end of 8 -->

        <div class="col-sm-4">
            <div id="register">
                <div class="wrapper">

                    <form class="form-register">
                        <h3>Register</h3>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="xxxxxxxxxx">
                            <small id="passwordHelp" class="form-text text-muted">Enter a secure pass word at least 8 characters long.</small>
                        </div>

                        <!-- <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm-password" aria-describedby="confirmPasswordHelp" placeholder="xxxxxxxxxx">
                        <small id="confirmPasswordHelp" class="form-text text-muted">Enter password again</small>
                    </div>

                    -->
                        <button type="submit" id="register-button" class="btn btn-default pull-right">Register</button>
                    </form>

                </div>
            </div>




            <div id="login">
                <div class="wrapper">

                    <form class="form-signin">
                        <h3>Login </h3>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="lemail" name="email" placeholder="Email Address" required="" autofocus="" />
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="lpassword" name="password" placeholder="Password" required="" />
                        </div>

                        <button type="submit" id="login-button" class="btn btn-default pull-right">Login</button>

                    </form>
                </div>
            </div>

        </div>
        <!-- end of 4 -->


    </div>
    <!-- end of row -->


    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="assets/js/front.js"></script>
