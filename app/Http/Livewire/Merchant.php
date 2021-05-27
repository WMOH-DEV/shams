<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Merchant extends Component
{
    use WithPagination;

    public $pagination = 10;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $checked = [];
    public $selectPage = false;
    public $selectAll = false;
    public $selectedStatus;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->merchants->pluck('id')->map(fn($id) => (string)$id)->toArray();
        } else {
            $this->checked = [];
        }
    }

    public function updatedChecked()
    {
        $this->selectPage = false;
    }

    public function getMerchantsProperty()
    {
        return $this->merchantsQuery
            ->paginate($this->pagination);
    }

    public function deleteSelected()
    {
        \App\Models\admin\Merchant::query()
            ->whereIn('id', $this->checked)
            ->delete();

        $this->checked = [];
        $this->selectAll = false;
        $this->selectPage = false;
        session()->flash('message', 'تم بنجاح حذف التجار الذي تم تحديدهم');
    }

    public function deleteSingleRecord($id)
    {
        // dd($id);
        \App\Models\admin\Merchant::findOrFail($id)->delete();
        $this->checked = array_diff($this->checked, [$id]);
        session()->flash('message', 'تم بنجاح حذف التاجر من قاعدة البيانات');
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
        $this->checked = $this->merchantsQuery->pluck('id')->map(fn($id) => (string)$id)->toArray();
    }

    public function getMerchantsQueryProperty()
    {
        if ($this->selectedStatus == null) {
            $term = "%$this->search%";
            return \App\Models\admin\Merchant::where('role_id', '2')
                ->with('city')
                ->where(function ($query) use  ($term) {
                    $query->where('name', 'like', $term)
                        ->OrWhere('email', 'like', $term)
                        ->OrWhere('phone', 'like', $term)
                        ->orWhereHas('city', function ($q) use ($term) {
                            $q->where('name', 'like', $term);
                        });
                })->latest('id');
        }
        $term = "%$this->search%";
        return \App\Models\admin\Merchant::with('city')
            ->where('role_id', '2')
            ->where(function ($query) use  ($term) {
                $query->where('name', 'like', $term)
                    ->OrWhere('email', 'like', $term)
                    ->OrWhere('phone', 'like', $term)
                    ->orWhereHas('city', function ($q) use ($term) {
                        $q->where('name', 'like', $term);});
            })->where('certified', $this->selectedStatus)
            ->latest('id');
    }

    public function isChecked($id)
    {
        return in_array($id, $this->checked);
    }

    public function approveSelected()
    {
//        DB::table('users')
//            ->whereIn('id', $this->checked)
//            ->update(['certified' => 1]);

        foreach ($this->checked as $merchant_id){
            $merchant = \App\Models\admin\Merchant::findOrFail($merchant_id);
            if ($merchant->certified == 1) {
                $merchant->update(['certified' => 0]);
                $merchant->save();
            }else {
                $merchant->update(['certified' => 1]);
                $merchant->save();
            }
        }

        $this->checked = [];
        $this->selectAll = false;
        $this->selectPage = false;
        session()->flash('message', 'تم بنجاح تبديل حالة الإعتماد للتُجار الذي تم تحديدهم');
    }

    public function approveSingleRecord($id)
    {
        $merchant = \App\Models\admin\Merchant::findOrfail($id);

        if ($merchant->certified == 0) {
            DB::table('users')
                ->where('id', $id)
                ->update(['certified' => 1]);

            $this->checked = array_diff($this->checked, [$id]);
            session()->flash('message', 'تم بنجاح اعتماد التاجر على الموقع');
        }else {
            DB::table('users')
                ->where('id', $id)
                ->update(['certified' => 0]);

            $this->checked = array_diff($this->checked, [$id]);
            session()->flash('error', 'تم بنجاح إلغاء اعتماد التاجر على الموقع');
        }

    }

    public function render()
    {
        return view('livewire.merchant', ['merchants' => $this->merchants]);
    }

}
