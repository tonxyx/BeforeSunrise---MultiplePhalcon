<?php echo $this->getContent(); ?>

<?php /** @var bool $loggedIn */
if (!$loggedIn) : ?>
<!--
    <div class="well span5 signForm">
        <form action="users/register" method="post">
            <h3>Register an Account</h3>

            <label for="email">Email</label>
            <input id="email" required="required" type="email" name="email" class="span4">

            <label for="email_confirm">Confirm Email</label>
            <input required="required" id="email_confirm" type="email" name="email_confirm" class="span4">

            <label for="username">Username</label>
            <input required="required" id="username" type="text" name="username" class="span4">

            <label for="firstname">First Name</label>
            <input required="required" id="firstname" type="text" name="firstname" class="span4">

            <label for="lastname">Last Name</label>
            <input required="required" id="lastname" type="text" name="lastname" class="span4">

            <label for="password">Password</label>
            <input required="required" id="password" type="password" name="password" class="span4">

            <label for="password_confirm">Confirm Password</label>
            <input required="required" id="password_confirm" type="password" name="password_confirm" class="span4">

            <br>

            <input type="submit" value="Sign Up »" class="btn btn-primary">
        </form>
    </div>
-->

    <div class="well span4 signForm">
        <form id="sign-in-form" action="login" method="post">
            <h3>Sign In</h3>

            <label for="username">Username</label>
            <input required="required" id="username" name="username" type="text">

            <label for="password">Password</label>
            <input required="required" id="password" type="password" name="password">

            <label class="checkbox">
                <input type="checkbox" value="1" name="remember_me"> Remember me
            </label>

            <br>

            <input type="submit" value="Sign In »" class="btn btn-primary">
            <br/>
            <br/>
        </form>

 <!--       <div class="ng-cloak" ng-controller="ForgotPasswordModal">
            <a ng-click="open()" title="Forgot password?">Forgot password?</a>

            <div modal="shouldBeOpen" close="close()" options="opts">
                <div class="modal-header">
                    <h4>Forgot your password?</h4>
                </div>
                <div class="modal-body">
                    <p>Enter your email address below and we'll send you instructions on how to reset your password.</p>

                    <form method="post">
                        <label>
                            <input type="email" ng-model="forgot_pass_email" placeholder="mymail@myisp.com"
                                   required="required" id="forgot_pass_email"/>
                        </label>
                    </form>
                    <div class="ng-cloak alert alert-error" ng-show="success == false"><?php echo $message; ?></div>
                    <div class="ng-cloak alert alert-success" ng-show="success == true"><?php echo $message; ?></div>
                </div>
                <div class="modal-footer">
                    <button class="btn" ng-click="send()">Send</button>
                    <button class="btn" ng-click="close()">Cancel</button>
                </div>
            </div>
        </div>
    </div>
-->
<?php else : ?>

    <h3 class="alert alert-info">You are already logged in. <a href="users/logout" title="Log out">Log out</a>?</h3>

<?php endif; ?>