<?php
/*
Template Name: Nutzer Admin Page
*/
get_header();
?>

    <table>
    <tr>
        <th>ID</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Email</th>
        <th>Rolle</th>
    </tr>

    <?php
    $users = get_musketier_user();

    foreach ($users as $user){
        echo "<tr>";
        echo "<td>{$user->id}</td>";
        echo "<td>{$user->first_name}</td>";
        echo "<td>{$user->last_name}</td>";
        echo "<td>{$user->email}</td>";
        echo "<td>{$user->role_id}</td>";
        echo "</tr>";
    }
    ?>

    </table>

    <div class="special-section">
        <p>Hier kommt dein individuelles Design hin!</p>
    </div>

<?php get_footer(); ?>