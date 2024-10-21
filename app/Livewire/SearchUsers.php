<?php

namespace App\Livewire;

use App\Models\Type;
use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
  /**
   * The component's attributes.
   *
   * @var array
   */
  public $type;
  public $users;

  /**
   * Prepare the component.
   *
   * @return void
   */
  public function mount(Type $type=null)
  {
    $this->type = $type;
    $this->users = User::where('type_id', $type->id)->orWhereNull('type_id')->orderBy('firstname', 'ASC')->get();
  }

  public function render()
  {
    return view('livewire.search-users');
  }
}
