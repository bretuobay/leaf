<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img alt="Brand" src="assets/images/logo.png">
        </a>

        <div class="navbar-header pull-right">

            <ul class="nav navbar-nav">
                <li>
                    <a class="navbar-right" href="#">
                    <?php
                    session_start();
                    echo "Welcome : ". $_SESSION['curr_user'];
                    ?>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a class="navbar-right" id="logout_link" href="#logout">
                    Logout
                </a></li>
            </ul>

        </div>
    </div>
</nav>


<div class="container">

    <div class="row">

        <ul class="nav nav-tabs dash-menu">
            <li class="active"><a href="#dashboard" id="dashboard-page" data-toggle="tab">Settings</a></li>
            <li><a href="#manage" id="management-page" data-toggle="tab">Manage Calorie Entries</a></li>
            <li><a href="#setting" id="setting-page" data-toggle="tab">Check Calories</a></li>
        </ul>
    </div>



    <div class="row">

        <div class="col-sm-8">

            <div id="dashboard">

                <div class="form-group">

                    <h2>Your current expected calories per day : <span id="current_daily_calories">  <?php echo $_SESSION['daily_cal']; ?>  </span> </h2>

                    <div class="form-group">
                        <label for="daily_cal">Set New Expected  Daily Calories</label>
                        <input type="text" class="form-control" id="daily_cal" aria-describedby="dailyHelp" placeholder="450">
                        <small id="dailyHelp" class="form-text text-muted"></small>
                    </div>

                    <button type="submit" id="daily-cal-button" class="btn btn-default pull-right">Save</button>

                </div>

            </div>

            <div id="setting">
                <div class="form-group">

                    <h1>Filter to find calories consumed in period : </h1>

                    <div class="form-group">
                        <label for="begin">Begin</label>
                        <input type="date" class="form-control" id="begin" aria-describedby="beginHelp" placeholder="18/09/2016">
                        <small id="beginHelp" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label for="end">End</label>
                        <input type="date" class="form-control" id="end" aria-describedby="endHelp" placeholder="19/09/2016">
                        <small id="endHelp" class="form-text text-muted"></small>
                    </div>

                    <h2> Totale Calories in period :: <span class="badge" id="total_calories"></span></h2>

                    <button type="submit" id="filter-button" class="btn btn-default pull-right">Filter</button>


                </div>
            </div>

            <div id="manage">

                <div class="form-group">

                    <h3> Select Calorie entry :</h3>

                    <section class="container select-area">
                        <select id="calorieslist" class="selectpicker">
                            <option value="default">----</option>
                        </select>
                        <input type="submit" class="btn btn-default pull-right" id="delete-entry" value="Delete">
                        <input type="submit" class="btn btn-default pull-right" id="fill-form" value="Edit">
                    </section>


                    <label for="id">ID</label>
                    <input type="text" disabled class="form-control" id="id" aria-describedby="idHelp" placeholder="">
                    <small id="idHelp" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" aria-describedby="descriptionHelp" placeholder="Enter description">
                    <small id="descriptionHelp" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="num_calories">Number of Calories</label>
                    <input type="text" class="form-control" id="num_calories" aria-describedby="caloriesHelp" placeholder="Enter calories">
                    <small id="caloriesHelp" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" aria-describedby="dateHelp" placeholder="18/09/2016">
                    <small id="dateHelp" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="email">Time</label>
                    <input type="time" class="form-control" id="time" aria-describedby="timeHelp" placeholder="Enter time">
                    <small id="timeHelp" class="form-text text-muted"></small>
                </div>

                <button type="submit" id="calories-button" class="btn btn-default pull-right">Save</button>


            </div>
        </div>

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
    </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="assets/js/app.js"></script>
