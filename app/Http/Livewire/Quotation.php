<?php

namespace App\Http\Livewire;

use App\Models\admin\Price;
use App\Models\admin\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Quotation extends Component
{

    use WithPagination;

    public $pagination = 10;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $checked = [];
    public $selectPage = false;
    public $selectAll = false;
    public $selectedUser = null;
    public $order;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->quotations->pluck('id')->map(fn($id) => (string)$id)->toArray();
        } else {
            $this->checked = [];
        }
    }

    public function updatedChecked()
    {
        $this->selectPage = false;
    }

    public function getQuotationsProperty()
    {
        return $this->quotationsQuery
            ->paginate($this->pagination);
    }

    public function deleteSelected()
    {
        Price::query()
            ->whereIn('id', $this->checked)
            ->delete();

        $this->checked = [];
        $this->selectAll = false;
        $this->selectPage = false;
        session()->flash('error', 'تم بنجاح حذف العرض الذي تم تحديده');
    }

    public function deleteSingleRecord($id)
    {
        // dd($id);
        Price::findOrFail($id)->delete();
        $this->checked = array_diff($this->checked, [$id]);
        session()->flash('error', 'تم بنجاح حذف العرض من قاعدة البيانات');
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
        $this->checked = $this->quotationsQuery->pluck('id')->map(fn($id) => (string)$id)->toArray();
    }

    public function getQuotationsQueryProperty(): Builder
    {
        //   dd($this->order);
        $term = "%$this->search%";
        return Price::with(['merchant', 'city', 'order'])
            ->where('order_id', $this->order->id)
            ->search(trim($term))
            ->latest('id');
    }

    public function isChecked($id)
    {
        return in_array($id, $this->checked);
    }


    public function render()
    {

        return view('livewire.quotation', ['quotations' => $this->quotations

        ]);
    }

}
