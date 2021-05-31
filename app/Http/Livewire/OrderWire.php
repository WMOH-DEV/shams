<?php

namespace App\Http\Livewire;

use App\Models\admin\Order;
use App\Models\admin\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class OrderWire extends Component
{
    use WithPagination;

    public $pagination = 10;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $checked = [];
    public $selectPage = false;
    public $selectAll = false;
    public $selectedUser = null;
   // public $selectedTicket = null;
    public $select2User = '';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->orders->pluck('id')->map(fn($id) => (string)$id)->toArray();
        } else {
            $this->checked = [];
        }
    }

    public function updatedChecked()
    {
        $this->selectPage = false;
    }

    public function getOrdersProperty()
    {
        return $this->ordersQuery
            ->paginate($this->pagination);
    }

    public function deleteSelected()
    {
        Order::query()
            ->whereIn('id', $this->checked)
            ->delete();

        $this->checked = [];
        $this->selectAll = false;
        $this->selectPage = false;
        session()->flash('error', 'تم بنجاح حذف الطلب الذي تم تحديده');
    }

    public function deleteSingleRecord($id)
    {
        // dd($id);
        Order::findOrFail($id)->delete();
        $this->checked = array_diff($this->checked, [$id]);
        session()->flash('error', 'تم بنجاح حذف الطلب من قاعدة البيانات');
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
        $this->checked = $this->ordersQuery->pluck('id')->map(fn($id) => (string)$id)->toArray();
    }

    public function getOrdersQueryProperty(): Builder
    {
        return Order::with(['user'])
            ->when($this->selectedUser, function ($query){
                $query->where('user_id',$this->selectedUser);
            })
            ->search(trim($this->search))
            ->latest('id');
    }

    public function isChecked($id)
    {
        return in_array($id, $this->checked);
    }


    public function render()
    {
        $users = User::whereHas('orders')->get();
       // dd($users);
        return view('livewire.order-wire', ['orders' => $this->orders,
            'users' => $users
            ]);
    }

}
