<?php

namespace App\Http\Livewire;

use App\Models\admin\City;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Ticket extends Component
{
    use WithPagination;

    public $pagination = 10;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $checked = [];
    public $selectPage = false;
    public $selectAll = false;
    public $selectedCity = null;
    public $selectedMerchant = null;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->tickets->pluck('id')->map(fn($id) => (string)$id)->toArray();
        } else {
            $this->checked = [];
        }
    }

    public function updatedChecked()
    {
        $this->selectPage = false;
    }

    public function getTicketsProperty()
    {
        return $this->ticketsQuery
            ->paginate($this->pagination);
    }

    public function deleteSelected()
    {
        \App\Models\admin\Ticket::query()
            ->whereIn('id', $this->checked)
            ->delete();

        $this->checked = [];
        $this->selectAll = false;
        $this->selectPage = false;
        session()->flash('message', 'تم بنجاح حذف التذكرة الذي تم تحديدهم');
    }

    public function deleteSingleRecord($id)
    {
        // dd($id);
        \App\Models\admin\Ticket::findOrFail($id)->delete();
        $this->checked = array_diff($this->checked, [$id]);
        session()->flash('message', 'تم بنجاح حذف التذكرة من قاعدة البيانات');
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
        $this->checked = $this->ticketsQuery->pluck('id')->map(fn($id) => (string)$id)->toArray();
    }

    public function getTicketsQueryProperty(): Builder
    {
        return \App\Models\admin\Ticket::with(['city', 'category', 'user'])
            ->when($this->selectedCity, function ($query){
                $query->where('city_id',$this->selectedCity);
            })->when($this->selectedMerchant, function ($query){
                $query->where('user_id',$this->selectedMerchant);
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
        $merchants = \App\Models\admin\Merchant::where('role_id','2')->latest('id')->get();
        $cities = City::has('tickets')->get();
        $merchants = \App\Models\admin\Merchant::whereHas('tickets', function($q){
        $q->where('role_id','2');})->get();
        return view('livewire.ticket', ['tickets' => $this->tickets ,
            'merchants' => $merchants,
            'cities' => $cities]);
    }

}
