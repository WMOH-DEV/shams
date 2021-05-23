<?php

namespace App\Http\Livewire;

use App\Models\admin\User;
use Livewire\Component;
use Livewire\WithPagination;

class Client extends Component
{
    use WithPagination;

    public $pagination = 10;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $checked = [];
    public $selectPage = false;
    public $selectAll = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->clients->pluck('id')->map(fn($id) => (string)$id)->toArray();
        } else {
            $this->checked = [];
        }
    }

    public function updatedChecked()
    {
        $this->selectPage = false;
    }

    public function getClientsProperty()
    {
        return $this->clientsQuery
            ->paginate($this->pagination);
    }

    public function deleteSelected()
    {
        User::query()
            ->whereIn('id', $this->checked)
            ->delete();

        $this->checked = [];
        $this->selectAll = false;
        $this->selectPage = false;
        // notify()->success('حذف الاعضاء الذي تم تحديدهم','تم بنجاح');
        session()->flash('message', 'تم بنجاح حذف الاعضاء الذي تم تحديدهم');
    }

    public function deleteSingleRecord($id)
    {
        // dd($id);
        User::findOrFail($id)->delete();
        $this->checked = array_diff($this->checked, [$id]);
        session()->flash('message', 'تم بنجاح حذف العضو من قاعدة البيانات');
    }

    public function cancelSelectAll()
    {
        $this->selectAll = false;
        $this->selectPage = false;
        $this->checked = [];
    }

    public function selectAll()
    {
        $this->selectAll = true;
        $this->checked = $this->clientsQuery->pluck('id')->map(fn($id) => (string)$id)->toArray();
    }

    public function getClientsQueryProperty()
    {
        $term = "%$this->search%";
        return User::where('role_id', '1')
            ->with('city')
            ->where(function ($query) use ($term) {
                $query->where('name', 'like', $term)
                    ->OrWhere('email', 'like', $term)
                    ->OrWhere('phone', 'like', $term)
                    ->orWhereHas('city', function ($q) use ($term) {
                        $q->where('name', 'like', $term);
                    });
            })->latest('id');
    }

    public function isChecked($id)
    {
        return in_array($id, $this->checked);
    }


    public function render()
    {
        return view('livewire.client', ['clients' => $this->clients]);
    }
}
