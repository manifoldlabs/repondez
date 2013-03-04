<?php

class Number extends Rbase  {

	// relationships
	public function event() {
		return $this->has_one('Revent','event_id');
	}

	public function invitation() {
		return $this->has_one('Invitation','invitation_id');
	}

  // use the Twilio API to purchase a number in given area code and
  // assign it to this models' access_number field
  public function provision($areacode=614) {
  	if (!$this->id) $this->save();
  	
    $this->twilio_init();

    $numbers = $this->twilio->account->available_phone_numbers->getList('US', 'Local', array(
        "AreaCode" => (string)$areacode
    ));

    if (count($numbers->available_phone_numbers)<1) {
      Log::twilio('No numbers available for area code '.$areacode);
      return false;
    }
  
    $to_provision = $numbers->available_phone_numbers[0]->phone_number;
    
    Log::twilio('Attempting to provision number '.$to_provision);
    // buy number!

    try {
	    $provisioned = $this->twilio->account->incoming_phone_numbers->create(array(
	    		"PhoneNumber" => $to_provision,
	        "FriendlyName" => "Repondez Number ID ".$this->id,
	        "VoiceUrl" => "http://demo.twilio.com/docs/voice.xml",
	        "VoiceApplicationSid" => Config::get('application.twilio.app_sid'),
	        "SmsApplicationSid" => Config::get('application.twilio.app_sid')
	    ));
    } catch(Exception $e) {
    	Log::error('TWILIO - Error provisioning number: ('.$e->getStatus().') '.$e->getMessage());
    	return false;
    }

		$this->sid = $provisioned->sid;
		$this->number = $to_provision;

    return true;
  }

}