@if ($errors->any())
  <div class="content" id="sessionMsg">
    <div class="alert alert-danger alert-dismissable" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <h3 class="alert-heading font-size-h4 my-2">
        <i class="fa fa-fw fa-exclamation-triangle opacity-50 mr-1"></i>
        خطأ</h3>
      <ul>
        @foreach ($errors->all() as $error)
          <li> {{ $error }}</li>
        @endforeach
      </ul>

    </div>
  </div>
@endif
