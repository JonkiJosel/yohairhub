<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;

class UsersList extends Component
{
    use WithPagination;
    #[Url('r')]
    public $filterRole = '';
    public $perPage = 10;
    public $search = '';
    public function render()
    {
        return view('livewire.users-list', [
            'users' =>User::search($this->search)-> when($this->filterRole !== '', function ($query) {
                return $query->whereHas('roles', function ($query)  {
                    $query->where('name', $this->filterRole);
                });
            })->paginate($this->perPage),
            'allRoles' => Role::select('name')->get(),
        ]);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
     public function deleteUser($id){
      $u =  User::findOrfail($id);
      if($u->id === Auth::user()->id){
          $this->dispatch('alert', ['type' => 'error', 'title'  => 'error','text' => 'You cannot delete yourself']);
          return;
      }
      if($u->hasRole('admin')){
        if(Auth::user()->hasRole('super-admin')){
            $u->delete();
           $this->dispatch('alert', ['type' => 'success', 'title'  => 'success','text' => 'User deleted successfully']);
          return;
          }
            $this->dispatch('alert', ['type' => 'error', 'title'  => 'error','text' => 'You cannot delete an admin']);
        return;
    }
      if(Auth::user()->hasRole('admin')){
          $u->delete();
            $this->dispatch('alert', ['type' => 'success', 'title'  => 'success','text' => 'User deleted successfully']);
        return;
        }
abort(403, 'You don\'t have the sanction to delete a user');
    }

}

