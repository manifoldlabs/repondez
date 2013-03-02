<?php

// HTML macros for Repondez

HTML::macro('phone_number', function($number) {
	// returns formatted phone number (given +15555555555 format, etc.)
  return preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '($1) $2-$3', $number);
});