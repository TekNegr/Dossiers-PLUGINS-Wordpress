<?php

class Google_API{
    private $google_agenda_key;
    private $google_calendar = array(); // To store events

    public function __construct($google_agenda_key, $credentialsPath) {
        $this->client = new Google_Client();
        $this->client->setAuthConfig($credentialsPath);
        $this->client->addScope(Google_Service_Calendar::CALENDAR_EVENTS);
        $this->google_agenda_key = $google_agenda_key;
        $this->init();
    }

    private function init() {
        if (!empty($this->google_agenda_key)) {
            $this->fetch_google_calendar($this->google_agenda_key);
        } else {
            // for chat gpt: I want a message to appear as well for the client to understand
            add_action('admin_init', array($this, 'redirect_to_settings'));
        }
    }

    public function createAndInsertEvent($agendaId, $eventDetails) {
        $service = new Google_Service_Calendar($this->client);

        $event = new Google_Service_Calendar_Event($eventDetails);

        return $service->events->insert($agendaId, $event);
    }

    private function fetch_google_events($service) {
        try {
            // Fetch events from the Google Calendar
            $events = $service->events->listEvents($this->google_agenda_key);

            // Process the fetched events
            foreach ($events->getItems() as $event) {
                $this->google_calendar[] = array(
                    'summary' => $event->getSummary(),
                    'start' => $event->start->dateTime ?? $event->start->date,
                    'end' => $event->end->dateTime ?? $event->end->date,
                );
            }
        } catch (Google_Service_Exception $e) {
            // Handle API errors
        }
    }


    public function redirect_to_settings() {
        wp_redirect(admin_url('options-general.php?page=theme_options')); // Change the page slug accordingly
        exit();
    }

}