<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\User;

class DeleteUser extends ModalComponent
{
    /** @var User|array */
    public $users;

    public function mount($users) {
        $this->users = is_array($users) ? $users : [$users];
    }

    public function delete()
    {
        if (is_array($this->users)) {
            foreach ($this->users as $user) {
                $user = User::find($user);
                $user->delete();
            }
        } else {
            $this->users->id->delete();
        }

        $this->closeModal();
        
        session()->flash('message', 'User deleted successfully.');

        return redirect()->route('user-management');
    }

    public function render()
    {
        return view('livewire.delete-user');
    }
}
