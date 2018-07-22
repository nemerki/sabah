<?php namespace Nemerki\Form\Components;

use Cms\Classes\ComponentBase;
use ValidationException;
use Illuminate\Support\Facades\Mail;
use Validator;
use Illuminate\Support\Facades\Input;

class FormSave extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Form Save',
            'description' => 'Kullanıcıdan alınan formu seçilen tabloya kaydeder'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onContact()
    {
//        $this->onSend();
        $this->onSave();
    }

    protected function onSave()
    {
        $data = post();
        dd($data);
        $rules = [
            'name' => 'required',
            'email' => 'required|email',

        ];

        $validation = Validator::make($data, $rules);


        if ($validation->fails()) {
            throw new ValidationException($validation);

        } else {
            $model = new \Sabah\Form\Models\Contact();

            $model->create($data);


        }

    }

    protected function onSend()
    {
        $data = post();

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ];

        $validation = Validator::make($data, $rules);


        if ($validation->fails()) {
            throw new ValidationException($validation);

        } else {

            $vars = ['name' => Input::get('name'), 'email' => Input::get('email'), 'subject' => Input::get('subject'), 'content' => Input::get('content')];


            Mail::send('nemerki.form::mail.message', $vars, function ($message) {

                $message->to('mehemmedntl85@gmail.com', 'Admin ');
                $message->subject('Əlaqə bölümündən yeni mesajınız var');

            });

        }
    }
}
