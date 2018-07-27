<?php namespace Nemerki\Instagram\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Cache;
use InstagramScraper\Instagram;

class Tags extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Tags Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'username' => [
                'title' => 'Username',
                'description' => 'Instagram usename',
                'type' => 'string',
                'validationPattern' => '^(?=\s*\S).*$',
                'validationMessage' => 'The usename property is required'
            ],
            'password' => [
                'title' => 'Password',
                'description' => 'Instagram Password',
                'type' => 'string',
                'validationPattern' => '^(?=\s*\S).*$',
                'validationMessage' => 'The Password property is required'
            ],
            'tag' => [
                'title' => 'Tag',
                'description' => 'The tag on which to retrieve media.',
                'type' => 'string',
                'validationPattern' => '^(?=\s*\S).*$',
                'validationMessage' => 'The Tag property is required'
            ],
            'limit' => [
                'title' => 'Limit',
                'description' => 'The number of media to be displayed (20 maximum).',
                'default' => 10,
                'type' => 'string',
                'validationPattern' => '^[0-9]*$',
                'validationMessage' => 'The Limit property should be numeric'
            ],
            'cache' => [
                'title' => 'Cache',
                'description' => 'The number of minutes to cache the media.',
                'default' => 10,
                'type' => 'string',
                'validationPattern' => '^[0-9]*$',
                'validationMessage' => 'The Cache property should be numeric'
            ]
        ];
    }

    public function onRun()
    {

        $this->page['items'] = $this->getItems();


    }

    protected function getItems()
    {
        $tag = ltrim($this->property('tag'), '#');
        $limit = $this->property('limit');
        $username = $this->property('username');
        $password = $this->property('password');
        $cache = $this->property('cache');


        if (Cache::has('nemerki')) {

            return Cache::get('nemerki');
        }
        /* postaddictme/instagram-php-scraper bunu composerla kurman lazım */

        $instagram = Instagram::withCredentials($username, $password, '/path/to/cache/folder');
        $instagram->login();
        $medias = $instagram->getMediasByTag($tag, $limit);
        Cache::add('nemerki', $medias, $cache);
        return $medias;


    }
}
