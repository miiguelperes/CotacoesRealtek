<?php

return [
    'app' => [
        'name' => 'Imperios Choperia',
        'tagline' => 'Zurück zum Wesentlichen',
    ],
    'directory' => [
        'create_fail' => "Konnte Verzeichnis: :name nicht erstellen",
    ],
    'file' => [
        'create_fail' => "Konnte Datei :name nicht erstellen",
    ],
    'combiner' => [
        'not_found' => "Die combiner Datei ':name' wurde nicht gefunden.",
    ],
    'system' => [
        'name' => 'System',
        'menu_label' => 'System',
        'categories' => [
            'cms' => 'CMS',
            'misc' => 'Verschiedenes',
            'logs' => 'Logs',
            'mail' => 'Mail',
            'shop' => 'Shop',
            'team' => 'Team',
            'users' => 'Benutzer',
            'system' => 'System',
            'social' => 'Social',
            'events' => 'Events',
            'customers' => 'Kunden',
            'my_settings' => 'Meine Einstellungen'
        ]
    ],
    'plugin' => [
        'unnamed' => 'Unbenanntes Plugin',
        'name' => [
            'label' => 'Plugin-Name',
            'help' => 'Benennen Sie das Plugin eindeutig, zum Beispiel RainLab.Blog',
        ],
    ],
    'project' => [
        'name' => 'Projekt',
        'owner_label' => 'Besitzer',
        'attach' => 'Projekt verbinden',
        'detach' => 'Projekt trennen',
        'none' => 'Keins',
        'id' => [
            'label' => 'Projekt-ID',
            'help' => 'Wie Sie Ihre Projekt-ID finden',
            'missing' => 'Bitte geben Sie eine Projekt-ID an.',
        ],
        'detach_confirm' => 'Möchtest du dieses Projekt wirklich trennen?',
        'unbind_success' => 'Projekt wurde erfolgreich getrennt (detached).',
    ],
    'settings' => [
        'menu_label' => 'Einstellungen',
        'not_found' => 'Die gesuchten Einstellungen können nicht gefunden werden.',
        'missing_model' => 'Der Einstellungsseite fehlt eine Model-Definition.',
        'update_success' => 'Einstellung für :name wurde erfolgreich aktualisiert.',
        'return' => 'Zurück zu den Einstellungen',
        'search' => 'Suche',
    ],
    'mail' => [
        'menu_label' => 'Mail-Einstellungen',
        'menu_description' => 'Mail-Einstellungen verwalten.',
        'general' => 'Allgemein',
        'method' => 'Mail-Methode',
        'sender_name' => 'Absender Name',
        'sender_email' => 'Absender-E-Mail',
        'php_mail' => 'PHP-Mail',
        'smtp' => 'SMTP',
        'smtp_address' => 'SMTP Adresse',
        'smtp_authorization' => 'SMTP Authorisation erforderlich',
        'smtp_authorization_comment' => 'Bitte auswählen, wenn der SMTP Server eine SMTP Authorisation erfordert.',
        'smtp_username' => 'Benutzername',
        'smtp_password' => 'Passwort',
        'smtp_port' => 'SMTP Port',
        'smtp_ssl' => 'SSL Verbindung erforderlich',
        'smtp_encryption' => 'SMTP-Verschlüsselungs-Protokoll',
        'smtp_encryption_none' => 'Keine Verschlüsselung',
        'smtp_encryption_tls' => 'TLS',
        'smtp_encryption_ssl' => 'SSL',
        'sendmail' => 'Sendmail',
        'sendmail_path' => 'Sendmail Pfad',
        'sendmail_path_comment' => 'Bitte gib den (absoluten) Pfad zum Sendmail Programm an.',
        'mailgun' => 'Mailgun',
        'mailgun_domain' => 'Mailgun-Domain',
        'mailgun_domain_comment' => 'Bitte gib die Mailgun-Domain an.',
        'mailgun_secret' => 'Mailgun-Schlüssel',
        'mailgun_secret_comment' => 'Gib Deinen Mailgun-API-Schlüssel an.',
        'mandrill' => 'Mandrill',
        'mandrill_secret' => 'Mandrill-Schlüssel',
        'mandrill_secret_comment' => 'Gib Deinen Mandrill-API-Schlüssel an.',
        'drivers_hint_header' => 'Treiber nicht installiert.',
        'drivers_hint_content' => 'Für diese Mail-Methode muss das Plugin ":plugin" installiert werden, bevor Du Mails verschicken kannst.'
    ],
    'mail_templates' => [
        'menu_label' => 'Mail-Vorlagen',
        'menu_description' => 'Verwalten die Mail-Vorlagen die für Mails an Benutzer und Administratoren verwendet werden und verwalte Mail-Layouts.',
        'new_template' => 'Neue Vorlage',
        'new_layout' => 'Neues Layout',
        'template' => 'Vorlage',
        'templates' => 'Vorlagen',
        'menu_layouts_label' => 'Mail-Layouts',
        'layout' => 'Layout',
        'layouts' => 'Layouts',
        'no_layout' => '-- Kein Layout --',
        'name' => 'Name',
        'name_comment' => 'Eindeutiger Name um diese Vorlage zu referenzieren',
        'code' => 'Code',
        'code_comment' => 'Eindeutiger Code um diese Vorlage zu referenzieren',
        'subject' => 'Betreff',
        'subject_comment' => 'E-Mail-Betreff',
        'description' => 'Beschreibung',
        'content_html' => 'HTML',
        'content_css' => 'CSS',
        'content_text' => 'Nur Text',
        'test_send' => 'Testnachricht senden',
        'test_success' => 'Die Testnachricht wurde erfolgreich versendet.',
        'test_confirm' => 'Eine Testnachricht wird an :email gesendet. Fortsetzen?',
        'creating' => 'Erstelle Vorlage...',
        'creating_layout' => 'Erstelle Layout...',
        'saving' => 'Speichere Vorlage...',
        'saving_layout' => 'Speichere Layout...',
        'delete_confirm' => 'Möchtest Du diese Vorlage wirklich löschen?',
        'delete_layout_confirm' => 'Möchtest Du dieses Layout wirklich löschen?',
        'deleting' => 'Lösche Vorlage...',
        'deleting_layout' => 'Lösche Layout...',
        'sending' => 'Sende Nachricht...',
        'return' => 'Zurück zur Vorlagen-Liste',
        'options' => 'Optionen',
        'disable_auto_inline_css' => 'Automtische inline CSS deaktivieren',
    ],
    'install' => [
        'project_label' => 'Mit Projekt verbinden',
        'plugin_label' => 'Plugin installieren',
        'missing_plugin_name' => 'Bitte geben Sie den Namen des zu installierenden Plugin an.',
        'install_completing' => 'Schließe Installationsprozess ab',
        'install_success' => 'Das Plugin wurde erfolgreich installiert.',
    ],
    'updates' => [
        'title' => 'Manage Updates',
        'name' => 'Software-Aktualisierung',
        'menu_label' => 'Aktualisierungen',
        'menu_description' => 'System aktualisieren, Plugins und Themes verwalten und installieren.',
        'check_label' => 'Auf Aktualisierungen überprüfen',
        'retry_label' => 'Erneut versuchen',
        'plugin_name' => 'Name',
        'plugin_description' => 'Beschreibung',
        'plugin_version' => 'Version',
        'plugin_author' => 'Autor',
        'plugin_not_found' => 'Plugin not found',
        'core_current_build' => 'Aktueller Build',
        'core_build' => 'Build :build',
        'core_build_help' => 'Aktuellster Build ist verfügbar.',
        'core_downloading' => 'Applikationsdaten werden heruntergeladen',
        'core_extracting' => 'Applikationsdaten werden entpackt',
        'plugin_downloading' => 'Lade Plugin herunter: :name',
        'plugin_extracting' => 'Entpacke Plugin: :name',
        'plugin_version_none' => 'Neues Plugin',
        'update_label' => 'Aktualisieren',
        'update_completing' => 'Schließe Aktualisierung ab',
        'update_loading' => 'Lade verfügbare Aktualisierungen...',
        'update_success' => 'Aktualisierungsvorgang erfolgreich.',
        'update_failed_label' => 'Aktualisierungsvorgang fehlgeschlagen',
        'force_label' => 'Aktualisierung erzwingen',
        'found' => [
            'label' => 'Neue Aktualisierungen gefunden!',
            'help' => '"Aktualisieren" wählen um Prozess zu starten ',
        ],
        'none' => [
            'label' => 'Keine Aktualisierungen',
            'help' => 'Es wurden keine Aktualisierungen gefunden.',
        ],
    ],
    'server' => [
        'connect_error' => 'Fehler beim Verbinden mit dem Server.',
        'response_not_found' => 'Der Aktualisierungs-Server kann nicht gefunden werden.',
        'response_invalid' => 'Ungültige Antwort vom Server.',
        'response_empty' => 'Ergebnislose Antwort vom Server.',
        'file_error' => 'Server konnte Paket nicht zur Verfügung stellen.',
        'file_corrupt' => 'Angelieferte Datei ist fehlerhaft.',
    ],
    'behavior' => [
        'missing_property' => 'Klasse :class muss Eingenschaft $:property besitzen, da sie von Verhalten (behaviour) :behavior benötigt wird.',
    ],
    'config' => [
        'not_found' => 'Konnte Konfigurationsdatei :file definiert für :location nicht finden.',
        'required' => 'Konfiguration, die in :location benutzt wird, muss den Wert :property zur Verfügung stellen.',
    ],
    'zip' => [
        'extract_failed' => "Konnte Core-Datei ':file' nicht entpacken.",
    ],
    'event_log' => [
        'hint' => 'Dieses Event-Log listet potentielle Fehler in der Anwendung, wie Exceptions und Debugging-Informationen.',
        'menu_label' => 'Event-Log',
        'menu_description' => 'Rufe ein Event-Log mit Zeitangaben und Fehlerdetails auf.',
        'empty_link' => 'Event-Log zurücksetzen',
        'empty_loading' => 'Event-Log wird zurückgesetzt...',
        'empty_success' => 'Event-Log erfolgreich zurückgesetzt.',
        'return_link' => 'Zurück zum Event-Log',
        'id' => 'ID',
        'id_label' => 'Event ID',
        'created_at' => 'Datum & Zeit',
        'message' => 'Nachricht',
        'level' => 'Level'
    ],
    'request_log' => [
        'hint' => 'Dieses Request-Log listet Browser-Anfragen, die Ihrer Aufmerksamkeit bedürfen könnten. Falls zum Beispiel ein Besucher eine nicht existierende CMS-Seite öffnet, wird ein Eintrag mit dem Fehler 404 angelegt.',
        'menu_label' => 'Request-Log',
        'menu_description' => 'Liste fehlerhafte Requests auf, z.B. Seite nicht gefunden (404).',
        'empty_link' => 'Request-Log zurücksetzen',
        'empty_loading' => 'Request-Log wird zurückgesetzt...',
        'empty_success' => 'Request-Log erfolgreich zurückgesetzt.',
        'return_link' => 'Zurück zum Request-Log',
        'id' => 'ID',
        'id_label' => 'Log ID',
        'count' => 'Zähler',
        'referer' => 'Referer',
        'url' => 'URL',
        'status_code' => 'Status'
    ],
    'permissions' => [
        'name' => 'System',
        'manage_system_settings' => 'Systemeinstellungen verwalten',
        'manage_software_updates' => 'Software-Updates verwalten',
        'access_logs' => 'Systemprotokolle einsehen',
        'manage_mail_templates' => 'Mail-Templates verwalten',
        'manage_mail_settings' => 'Mail-Einstellungen verwalten',
        'manage_other_administrators' => 'Andere Administratoren verwalten',
        'manage_preferences' => 'Backend-Einstellungen verwalten',
        'manage_editor' => 'Code-Editor-Einstellungen verwalten',
        'view_the_dashboard' => 'Dashboard einsehen',
        'manage_branding' => 'Backend individualisieren'
    ],
    'media' => [
        'invalid_path' => "Ungültiger Dateipfad: ':path'.",
        'folder_size_items' => 'Datei(en)',
    ],
];
