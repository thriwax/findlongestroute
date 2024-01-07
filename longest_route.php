<?php

$flights = [
    [
        'from'    => 'VKO',
        'to'      => 'DME',
        'depart'  => '01.01.2020 12:44',
        'arrival' => '01.01.2020 13:44',
    ],
    [
        'from'    => 'DME',
        'to'      => 'JFK',
        'depart'  => '02.01.2020 23:00',
        'arrival' => '03.01.2020 11:44',
    ],
    [
        'from'    => 'DME',
        'to'      => 'HKT',
        'depart'  => '01.01.2020 13:40',
        'arrival' => '01.01.2020 22:22',
    ],
];

function findLongestRoute($flights) {
    $longestRoute = [];
    $currentRoute = [];

    foreach ($flights as $flight) {
        if (empty($currentRoute) || $flight['depart'] >= end($currentRoute)['arrival']) {
            $currentRoute[] = $flight;
        } else {
            $currentRoute = [$flight];
        }

        if (count($currentRoute) > count($longestRoute)) {
            $longestRoute = $currentRoute;
        }
    }

    return $longestRoute;
}

$longestRoute = findLongestRoute($flights);

echo "Самый продолжительный маршрут:\n";
foreach ($longestRoute as $index => $flight) {
    echo ($index + 1) . ") {$flight['from']} → {$flight['to']} {$flight['depart']} {$flight['arrival']}\n";
}

?>
