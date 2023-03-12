<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\ContactFormMailable;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;
    public $successMessage;

    public function submitForm()
    {
        $contact['name'] = $this->name;
        $contact['email'] = $this->email;
        $contact['phone'] = $this->phone;
        $contact['message'] = $this->message;

        Mail::to('test@test.com')->send(new ContactFormMailable($contact));

        // Need $this to call resetForm in an instance
        $this->resetForm();

        $this->successMessage = 'Message received';
    }


    public function render()
    {
        return view('livewire.contact-form');
    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
    }
}