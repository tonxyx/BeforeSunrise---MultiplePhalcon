
{{ content() }}

        <div class="hero-unit" align="center">
                <h2>Log In</h2>
            {{ form('session/start', 'class': 'form-inline') }}
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="email">Username/Email</label>
                        <div class="controls">
                            {{ text_field('email', 'size': "30", 'class': "input-xlarge") }}
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="password">Password</label>
                        <div class="controls">
                            {{ password_field('password', 'size': "30", 'class': "input-xlarge") }}
                        </div>
                    </div>
                        {{ submit_button('Login', 'class': 'btn btn-primary btn-large') }}
                </fieldset>
            </form>

                <h2>Don't have an account yet?</h2>

            <p>Create an account offers the following advantages:</p>
            <ul>
                <li>Create, track and export your invoices online</li>
                <li>Gain critical insights into how your business is doing</li>
                <li>Stay informed about promotions and special packages</li>
            </ul>
                {{ link_to('session/register', 'Sign Up', 'class': 'btn btn-primary btn-large btn-success') }}
                </div>