<?php

namespace App\View\Composers;

use App\Models\Contact;
use Illuminate\View\View;

class ContactsComposer
{
	public function compose(View $view) {
		$contact = Contact::first();

		$view->with('contact', $contact);
	}
}
