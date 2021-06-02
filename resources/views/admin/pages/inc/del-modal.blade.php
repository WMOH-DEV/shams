<div class="modal fade show text-right"
     id="modal-delete{{$page->id}}"
     tabindex="-1"
     aria-labelledby="modal-block-slideup"
     aria-modal="true"
     role="dialog"
     style="display: none; padding-right: 15px;">
    <div class="modal-dialog modal-dialog-slideup" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">
                        <i class="fa fa-fw fa-exclamation-triangle opacity-50 mr-1"></i>
                        تحذير سيتم حذف
                        {{ $page->name }}
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form action="{{route('pages.destroy', $page->id)}}" method="post" class="m-0">
                    <div class="block-content">
                        <p class="text-center" style="font-size: 1.1rem">هل أنت متأكد من حذف هذه الصفحة ؟</p>
                    </div>
                    <div class="block-content block-content-full text-left bg-light py-2">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                            <i class="fa fa-fw fa-times mr-1"></i>
                            إلغاء
                        </button>
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-fw fa-check"></i>
                            تأكيد
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
