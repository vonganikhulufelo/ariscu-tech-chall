<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Item;
use CodeIgniter\I18n\Time;

class ItemController extends BaseController
{
    protected $item;
 
    function __construct()
    {
        $this->item = new Item();

    }


    public function index()
    {
        $data['items'] = $this->item->where('type =', 'story')->paginate(10);
        $data['pager'] = $this->item->pager;

        return view('items/index', $data);
    }
    public function show($id)
    {
        $data['story'] = $this->item->find($id);
        $data['comments'] = $this->item->where('type =', 'comment')->where('parent =', $data['story']['id'])->findAll();
        $time = Time::parse($data['story']['time']);
        // var_dump($time);
        return view('items/show', $data);
    }
}
