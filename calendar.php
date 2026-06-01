<?php
/*
Template Name: Kalender Template
*/

get_header();

// Monat aus URL holen (YYYY-MM)
$month_param = $_GET['month'] ?? date('Y-m');

$date_obj = DateTime::createFromFormat('Y-m', $month_param);

if (!$date_obj) {
    $date_obj = new DateTime();
}

// Jahr & Monat setzen
$year  = $date_obj->format('Y');
$month = $date_obj->format('m');

// Navigation vorbereiten
$prev = (clone $date_obj)->modify('-1 month')->format('Y-m');
$next = (clone $date_obj)->modify('+1 month')->format('Y-m');

// event laden
$event = new WP_Query([
    'post_type' => 'event',
    'posts_per_page' => -1,
]);

$event_map = [];

if ($event->have_posts()) {
    while ($event->have_posts()) {
        $event->the_post();

        $datetime = get_field('event_date'); // YYYY-MM-DD HH:MM:SS

        if ($datetime) {
            $date_only = date('Y-m-d', strtotime($datetime));

            $event_map[$date_only][] = [
                'title'    => get_the_title(),
                'date' => $datetime,
                'time'     => date('H:i', strtotime($datetime)),
                'location' => get_field('event_location'),
                'group'    => get_field('event_groups')
            ];
        }
    }
}
wp_reset_postdata();

// Tage im Monat
$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
?>

<div class="calendar-wrapper">
    <h1>Kalender</h1>

    <div class="calendar-nav">
        <a href="?month=<?= $prev ?>">⬅ Vorheriger Monat</a>
        <h2><?= $date_obj->format('F Y') ?></h2>
        <a href="?month=<?= $next ?>">Nächster Monat ➡</a>
    </div>

    <div class="calendar">

        <?php for ($d = 1; $d <= $days; $d++): ?>

            <?php
            $date = sprintf('%04d-%02d-%02d', $year, $month, $d);
            ?>

            <div class="calendar-day">
                <strong><?= $d ?></strong>

                <?php if (isset($event_map[$date])): ?>
                    <?php foreach ($event_map[$date] as $event): ?>

                        <div class="calendar-event">
                            <strong><?= esc_html($event['title']) ?></strong><br>
                            Uhrzeit: <?= esc_html($event['time']) ?><br>
                            Ort: <?= esc_html($event['location']) ?>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>

            </div>

        <?php endfor; ?>

    </div>
</div>

<?php get_footer(); ?>