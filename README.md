Répondez
========

_Répondez uses Twilio to automatically handle RSVPs for your formal event via phone calls or SMS._
Each guest is assigned a phone number (printed on their invitation) that connects to Répondez.

This repository is in a basically unusable, heavy development, first-time-using-laravel type of state.

## Installation

1. Fork, clone
2. Make sure /storage is writeable by Apache (or whatever server you want to use)
3. Point Apache vhost to /public directory (use *.dev, *.test, or localhost to trigger local config)
4. Edit /applications/config/local/database.php to point to your MySQL
5. Create /applications/config/local/application.php with Twilio creds (see global application.php file for structure)
6. Run `php artisan migrate:install` from repondez directory
7. Run `php artisan migrate`
8. Cross fingers
9. Load up your vhost in a browser
