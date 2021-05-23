<?php

namespace App\Http\Livewire;

use App\Models\admin\Comment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CommentWire extends Component
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
            $this->checked = $this->comments->pluck('id')->map(fn($id) => (string)$id)->toArray();
        } else {
            $this->checked = [];
        }
    }

    public function updatedChecked()
    {
        $this->selectPage = false;
    }

    public function getCommentsProperty()
    {
        return $this->commentsQuery
            ->paginate($this->pagination);
    }

    public function deleteSelected()
    {
        Comment::query()
            ->whereIn('id', $this->checked)
            ->delete();

        $this->checked = [];
        $this->selectAll = false;
        $this->selectPage = false;
        session()->flash('message', 'تم بنجاح حذف التعليقات الذي تم تحديدهم');
    }

    public function approveSelected()
    {
            DB::table('comments')
            ->whereIn('id', $this->checked)
            ->update(['active' => 1]);

        $this->checked = [];
        $this->selectAll = false;
        $this->selectPage = false;
        session()->flash('message', 'تم بنجاح الموافقة على التعليقات الذي تم تحديدهم');
    }

    public function deleteSingleRecord($id)
    {
        // dd($id);
        Comment::findOrFail($id)->delete();
        $this->checked = array_diff($this->checked, [$id]);
        session()->flash('message', 'تم بنجاح حذف التعليق من قاعدة البيانات');
    }

    public function approveSingleRecord($id)
    {
        $comment = Comment::findOrfail($id);

        if ($comment->active == 0) {
            DB::table('comments')
                ->where('id', $id)
                ->update(['active' => 1]);

            $this->checked = array_diff($this->checked, [$id]);
            session()->flash('message', 'تم بنجاح اعتماد التعليق على الموقع');
        }else{
            DB::table('comments')
                ->where('id', $id)
                ->update(['active' => 0]);

            $this->checked = array_diff($this->checked, [$id]);
            session()->flash('message', 'تم بنجاح إلغاء اعتماد التعليق على الموقع');
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
        $this->checked = $this->CommentsQuery->pluck('id')->map(fn($id) => (string)$id)->toArray();
    }

    public function getCommentsQueryProperty()
    {
        return Comment::with('user')
        ->where('comment', 'like', "%$this->search%")
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
        return view('livewire.comment-wire', ['comments' => $this->comments]);
    }
}
