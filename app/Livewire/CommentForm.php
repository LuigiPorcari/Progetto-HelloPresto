<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CommentForm extends Component
{
    public $body;
    public $foodboxId;
    public $updateCheck = false;

    public function mount($foodboxId)
    {
        $this->foodboxId = $foodboxId;
    }

    public function updateCheck()
    {
        $this->updateCheck = true;
    }

    public function save()
    {
        Auth::user()->comments()->create([
            'body' => $this->body,
            'foodbox_id' => $this->foodboxId
        ]);
        // $this->reset();
        $this->body = "";
        $this->render();
    }

    public function deleteComment($id)
    {
        Comment::findOrFail($id)->delete();
    }
    public function render()
    {
        return view('livewire.comment-form', [
            'comments' => Comment::where('foodbox_id' , $this->foodboxId)->orderBy('created_at' , 'desc')->paginate(4),
            'foodboxID' => $this->foodboxId,
            'updateCheck' => $this->updateCheck,
        ]);
    }
}
