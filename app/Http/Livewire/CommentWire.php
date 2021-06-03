<?php

namespace App\Http\Livewire;

use App\Models\admin\Opinion;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CommentWire extends Component
{
    use WithPagination;

    public int $pagination = 10;
    protected string $paginationTheme = 'bootstrap';
    public string $search = '';
    public array $checked = [];
    public bool $selectPage = false;
    public bool $selectAll = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->opinions->pluck('id')->map(fn($id) => (string)$id)->toArray();
        } else {
            $this->checked = [];
        }
    }

    public function updatedChecked()
    {
        $this->selectPage = false;
    }

    public function getOpinionsProperty()
    {
        return $this->opinionsQuery
            ->paginate($this->pagination);
    }

    public function deleteSelected()
    {
        Opinion::query()
            ->whereIn('id', $this->checked)
            ->delete();

        $this->checked = [];
        $this->selectAll = false;
        $this->selectPage = false;
        session()->flash('error', 'تم بنجاح حذف الآراء الذي تم تحديدهم');
    }

    public function approveSelected()
    {
            DB::table('opinions')
            ->whereIn('id', $this->checked)
            ->update(['active' => 1]);

        $this->checked = [];
        $this->selectAll = false;
        $this->selectPage = false;
        session()->flash('message', 'تم بنجاح الموافقة على عرض الآراء التي تم تحديدهم');
    }

    public function deleteSingleRecord($id)
    {
        // dd($id);
        Opinion::findOrFail($id)->delete();
        $this->checked = array_diff($this->checked, [$id]);
        session()->flash('error', 'تم بنجاح حذف الرأي من قاعدة البيانات');
    }

    public function approveSingleRecord($id)
    {
        $comment = Opinion::findOrfail($id);

        if ($comment->active == 0) {
            DB::table('opinions')
                ->where('id', $id)
                ->update(['active' => 1]);

            $this->checked = array_diff($this->checked, [$id]);
            session()->flash('message', 'تم بنجاح اعتماد الرأي على الموقع');
        }else{
            DB::table('opinions')
                ->where('id', $id)
                ->update(['active' => 0]);

            $this->checked = array_diff($this->checked, [$id]);
            session()->flash('error', 'تم بنجاح إلغاء إظهار الرأي على الموقع');
        }

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
        $this->checked = $this->OpinionsQuery->pluck('id')->map(fn($id) => (string)$id)->toArray();
    }

    public function getOpinionsQueryProperty()
    {
        return Opinion::with('user')
        ->where('desc', 'like', "%$this->search%")
            ->orWhereHas('user', function ($q){
                $q->where('name', 'like', "%$this->search%");
            })->latest('id');
    }

    public function isChecked($id)
    {
        return in_array($id, $this->checked);
    }


    public function render()
    {
        return view('livewire.comment-wire', ['comments' => $this->opinions]);
    }
}
