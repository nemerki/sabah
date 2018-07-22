<?php namespace Sabah\Form\Components;

use Cms\Classes\ComponentBase;
use Sabah\Form\Models\FagCategory;
use ValidationException;
use Illuminate\Support\Facades\Mail;
use Validator;
use Illuminate\Support\Facades\Input;

class Faq extends ComponentBase
{



    public $faqCategories;

    public function componentDetails()
    {
        return [
            'name' => 'Faq',
            'description' => 'faq seyfesi üçün component'
        ];
    }

    public function defineProperties()
    {

        return [];
    }

    public function onRun()
    {

        $this->faqCategories = $this->page['faqCategories'] = $this->listRecords();
    }


    protected function listRecords()
    {


        $model = FagCategory::all();

        return $model;
    }


    public function onContact()
    {
        $this->onSave();
        $this->onSend();

    }

    protected function onSave()
    {
        $data = post();
        $data['short']='Mütəmadi verilən suallar';
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
            $model = \Sabah\Form\Models\Faq::create($data);

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

            $vars = ['name' => Input::get('name'), 'email' => Input::get('email'), 'subject' => Input::get('subject'), 'message' => Input::get('message')];


            Mail::send('nemerki.form::mail.message', $vars, function ($message) {

                $message->to('mehemmedntl85@gmail.com', 'Admin ');
                $message->subject('Mütemadı verilen suallar bölümündən yeni mesajınız var');

            });

        }
    }

}
