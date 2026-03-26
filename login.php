<?php
/*
Template Name: Login
*/
get_header();
?>

    <div class="login-container">
        <h2>Login</h2>
        <form>
            <input type="text" placeholder="Benutzername" required>
            <input type="password" placeholder="Passwort" required>
            <button type="submit">Anmelden</button>
            <a href="#" class="forgot">Passwort vergessen?</a>
        </form>
    </div>

<?php get_footer(); ?>