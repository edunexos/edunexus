<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $selectedRole;
    public $password;
    public $password_confirmation;
    public $userId;
    public $search = '';
    public $isModalOpen = false;

    protected $queryString = ['search'];

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->userId,
            'selectedRole' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function searchAllPages()
    {
        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->search = '';
        $this->resetPage();
    }

    public function openModal($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->selectedRole = $user->role;
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->reset(['name', 'email', 'selectedRole', 'password', 'password_confirmation', 'userId']);
        $this->isModalOpen = false;
    }

    public function update()
    {
        $this->validate();

        $user = User::findOrFail($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->selectedRole,
            'password' => $this->password ? bcrypt($this->password) : $user->password,
        ]);

        session()->flash('message', 'User updated successfully.');

        $this->closeModal();
    }

    public function render()
    {
        $users = User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.users.user-management', [
            'users' => $users,
            'roles' => ['admin', 'teacher', 'student'],
        ]);
    }
}
