<?php
// Get the current year and month
$currentYear = date('Y');
$currentMonth = date('m');
$daysInMonth = date('t'); // Number of days in the current month

// Generate the HTML for the empty calendar
$html = '<!DOCTYPE html>
<html>
<head>
    <title>Empty Calendar</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
        th {
            background-color: #ccc;
        }
        .highlight {
            background-color: #ffcc00;
        }
    </style>
</head>
<body>
    <h2>Empty Calendar - ' . date('F Y') . '</h2>
    <table>
        <tr>
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
        </tr>
        <tr>';

// Calculate the day of the week for the first day of the month
$firstDayOfWeek = date('w', mktime(0, 0, 0, $currentMonth, 1, $currentYear));

// Fill in empty cells for days before the first day of the month
$html .= str_repeat('<td></td>', $firstDayOfWeek);

// Loop through the days in the month
for ($day = 1; $day <= $daysInMonth; $day++) {
    // Highlight the current date
    $class = '';
    if ($day == date('j')) {
        $class = 'highlight';
    }
    
    // Add the day cell to the calendar
    $html .= '<td class="' . $class . '">' . $day . '</td>';
    
    // Start a new row at the beginning of the week
    if (date('w', mktime(0, 0, 0, $currentMonth, $day, $currentYear)) == 6) {
        $html .= '</tr><tr>';
    }
}

// Fill in empty cells for days after the last day of the month
$html .= str_repeat('<td></td>', (6 - date('w', mktime(0, 0, 0, $currentMonth, $daysInMonth, $currentYear))) % 7);

$html .= '</tr>
    </table>
</body>
</html>';

// Output the HTML
echo $html;
?>