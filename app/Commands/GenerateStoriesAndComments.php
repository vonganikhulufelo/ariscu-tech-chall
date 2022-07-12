<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\Item;

class GenerateStoriesAndComments extends BaseCommand
{

    protected $item;
 
    function __construct()
    {
        $this->item = new Item();
    }
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'CodeIgniter';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'command:GenerateStoriesAndComments';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'command:GenerateStoriesAndComments [arguments] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {

        foreach(['newstories','topstories','beststories'] as $story) {

            $url = 'https://hacker-news.firebaseio.com/v0/'.$story.'.json?print=pretty';
            
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //If SSL Certificate Not Available, for example, I am calling from http://localhost URL
                
            $result = curl_exec($curl);
    
            curl_close($curl);
            $arr = json_decode($result, true);
            
    
           $this->createStory($arr);
        }
        // var_dump($arr);
    }

    public function createStory($arr){
        foreach($arr as $story) {

            $url = 'https://hacker-news.firebaseio.com/v0/item/' . $story . '.json?print=pretty';
        
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //If SSL Certificate Not Available, for example, I am calling from http://localhost URL
                
            $result = curl_exec($curl);

            curl_close($curl);
            $arr = json_decode($result, true);

            
            if($arr['type'] == 'story'){
                $this->item->insert([
                    'by' => $arr['by'],
                    'id' => $arr['id'],
                    'descendants' => $arr['descendants'],
                    'score' => $arr['score'],
                    'time' => date('c',$arr['time']),
                    'title' => $arr['title'],
                    'type' => $arr['type'],
                    'url' => $arr['url'],
                ]);
    
                $this->createComment($arr['kids']);
            }

        }
    }
    public function createComment($arr){
        if($arr){
            foreach($arr as $comment) {
    
                $url = 'https://hacker-news.firebaseio.com/v0/item/'.$comment.'.json?print=pretty';
            
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //If SSL Certificate Not Available, for example, I am calling from http://localhost URL
                    
                $result = curl_exec($curl);
    
                curl_close($curl);
                $arr = json_decode($result, true);
    
                $this->item->insert([
                    'by' => $arr['by'],
                    'id' => $arr['id'],
                    'parent' => $arr['parent'],
                    'time' => date('c',$arr['time']),
                    'text' => $arr['text'],
                    'type' => $arr['type'],
                ]);
            }
        }
    }


}
