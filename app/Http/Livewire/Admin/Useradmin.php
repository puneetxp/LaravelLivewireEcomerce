<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class Useradmin extends Component {

  public $users = array();
  public $name;
  public $email;
  public $role;
  public $query;
  public $sre = array();
  public $perpage = 35;
  protected $listeners = [
      'load-more' => 'loadMore'
  ];

  public function updates($x, $y) {
    User::find($x)->update(['role' => $y,]);
  }

  public function status($x, $y) {
    User::find($x)->udpate(['satus' => $y]);
  }

  public function loadMore() {
    $this->perpage += 15;
  }

  public function render() {
    $this->users = array();
    $this->users = User::latest()->where('email', 'like', '%' . $this->query . '%')->orwhere('name', 'like', '%' . $this->query . '%')->limit(25)->get();
//        foreach($users as $user)
//        {
//            array_push($this->users, $user);
//        }
    $this->emit('userStore');
    return view('livewire.admin.useradmin');
  }

}
