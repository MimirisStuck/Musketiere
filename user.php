<?php
/*
Template Name: Nutzer Admin Page
*/
get_header();
?>
<?php
    if (!current_user_can('manage_options')) {
        wp_die('Du hast keine Berechtigung, diese Seite zu sehen.');
    }

    // Neue Benutzer erstellen
    if (isset($_POST['new_user_submit'])) {
        $username = sanitize_user($_POST['username']);
        $email = sanitize_email($_POST['email']);
        $password = $_POST['password'];
        $role = sanitize_text_field($_POST['role']);

        $errors = [];

        if (username_exists($username)) {
            $errors[] = 'Benutzername existiert bereits.';
        }

        if (email_exists($email)) {
            $errors[] = 'E-Mail existiert bereits.';
        }

        if (empty($password)) {
            $errors[] = 'Passwort darf nicht leer sein.';
        }

        if (empty($errors)) {
            $user_id = wp_create_user($username, $password, $email);
            wp_update_user(['ID' => $user_id, 'role' => $role]);
            echo '<div style="color:green;">Neuer Benutzer wurde erstellt!</div>';
        } else {
            foreach ($errors as $error) {
                echo '<div style="color:red;">' . esc_html($error) . '</div>';
            }
        }
    }

    // Alle Benutzer abrufen
    $users = get_users();
?>

<h1>Benutzerverwaltung</h1>

<h2>Neue Benutzer erstellen</h2>
<form method="POST">
    <label>Benutzername:<br>
        <input type="text" name="username" required>
    </label><br><br>
    <label>E-Mail:<br>
        <input type="email" name="email" required>
    </label><br><br>
    <label>Passwort:<br>
        <input type="password" name="password" required>
    </label><br><br>
    <label>Rolle:<br>
        <select name="role">
            <option value="subscriber">Abonnent</option>
            <option value="editor">Redakteur</option>
            <option value="author">Autor</option>
            <option value="administrator">Administrator</option>
        </select>
    </label><br><br>
    <input type="submit" name="new_user_submit" value="Benutzer erstellen">
</form>

<h2>Alle Benutzer</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Benutzername</th>
        <th>E-Mail</th>
        <th>Rolle</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user->ID; ?></td>
        <td><?php echo esc_html($user->user_login); ?></td>
        <td><?php echo esc_html($user->user_email); ?></td>
        <td><?php echo esc_html(implode(', ', $user->roles)); ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php get_footer(); ?>