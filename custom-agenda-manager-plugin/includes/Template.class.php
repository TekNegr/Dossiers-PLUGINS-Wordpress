<?php 

class TemplateCalendar{
    private $actual_date;
    private $selected_date;

    public function __construct() {
        $this->actual_date = new DateTime();
        $this->empty_calendar_html = $this->get_empty_calendar_html();
    }

    public function get_empty_calendar_html() {
        // Read and return the HTML from the template file
        ob_start();
        include './templates/google-calendar-template.php'; // Adjust the path as needed
        $html = ob_get_clean();
        return $html;
    }

    private function generate_calendar_header() {
        // Generate the calendar header HTML
        $header = '<table>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>';

        return $header;
    }

    private function generate_day_cell($day, $class = '') {
        // Generate a day cell with optional class
        return '<td class="' . $class . '">' . $day . '</td>';
    }

    private function generate_calendar_footer() {
        // Generate the calendar footer HTML
        $footer = '</table>';

        return $footer;
    }

    public function generate_calendar_html($selected_date, $events = []) {
        $timestamp = strtotime($selected_date);
        $currentYear = date('Y', $timestamp);
        $currentMonth = date('m', $timestamp);
        $daysInMonth = date('t', $timestamp); // Number of days in the selected month

        // Calculate the day of the week for the first day of the month
        $firstDayOfWeek = date('w', mktime(0, 0, 0, $currentMonth, 1, $currentYear));

        $html = $this->generate_calendar_header();

        // Fill in empty cells for days before the first day of the month
        $html .= str_repeat('<td></td>', $firstDayOfWeek);

        // Loop through the days in the month
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $class = '';

            // Check if there's an event for this day
            if (isset($events[$day])) {
                $class = 'event';
            }

            // Generate the day cell
            $html .= '<tr>';
            $html .= $this->generate_day_cell($day, $class);
            $html .= '</tr>';
            
            // Start a new row at the beginning of the week
            if (date('w', mktime(0, 0, 0, $currentMonth, $day, $currentYear)) == 6) {
                $html .= '</tr><tr>';
            }
        }

        // Fill in empty cells for days after the last day of the month
        $html .= str_repeat('<td></td>', (6 - date('w', mktime(0, 0, 0, $currentMonth, $daysInMonth, $currentYear))) % 7);

        $html .= $this->generate_calendar_footer();

        return $html;
    }

    public function display_empty_calendar() {
        // Get the empty calendar HTML
        $empty_calendar_html = $this->get_empty_calendar_html();
        
        // Display the HTML
        echo $empty_calendar_html;
    }
}

class Appointment_Event {
    public $title;
    public $start;
    public $end;
    public $apt_type;
    public $client_fullname; 
    // for chat-gpt : I want to fetch from 
}