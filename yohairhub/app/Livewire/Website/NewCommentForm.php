<?php

namespace App\Livewire\Website;

use App\Models\SalonComment;
use Livewire\Component;

class NewCommentForm extends Component
{
    public $salon;
    public $name;
    public $email;
    public $comment;

    public function mount($salon)
    {
        $this->salon = $salon;
    }
    public function render()
    {
        return view('livewire.website.new-comment-form');
    }

    public function postComment()
    {
        $this->validate([
            'name' => "required|string",
            'email' => "required|email",
            'comment' => "required|string"
        ]);

        SalonComment::create([
            'name' => $this->name,
            'email' => $this->email,
            'comment' => $this->comment,
            'salon_id' => $this->salon->id,
        ]);

        noty()->addSuccess('Posted');

        $this->reset('name', 'email', 'comment');
    }
}
