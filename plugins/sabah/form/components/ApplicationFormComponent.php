<?php namespace Sabah\Form\Components;

use Cms\Classes\ComponentBase;
use Sabah\Form\Models\ApplicationForms;
use Sabah\Student\Models\University;
use Illuminate\Support\Facades\Input;

class ApplicationFormComponent extends ComponentBase
{
    public $universities;

    public $ixtisaslar;

    public function componentDetails()
    {
        return [
            'name' => 'Application Form',
            'description' => 'Tecrübe proqramına müraciet formu seyfesi üçün component'
        ];
    }

    public function defineProperties()
    {
        return [];
    }


    public function onRun()
    {

        $this->universities = $this->page['universities'] = $this->listUniversity();
    }

    protected function listUniversity()
    {
        $model = University::all();
        return $model;
    }

    public function onIxtisas()
    {
        $university_id = post('university_id');

        $university = University::where('name', $university_id)->first();

        $ixtisaslar = $university->ixtisas;

        $this->ixtisaslar = $this->page['ixtisaslar'] = $ixtisaslar;
    }

    public function onPracticlePrograms()
    {
        $data = Input::except('language');
        $lang = Input::get('language');

        $i = 0;

        foreach ($lang as $key => $value) {
            $i++;
            $da['language']['language_name'] = $value[0];
            $da['language']['language_level'] = $value[1];
            $data['language'][$i] = $da['language'];
        }

        ApplicationForms::create($data);

    }

    public function onContact()
    {

    }

}
