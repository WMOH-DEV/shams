
@if( session()->has('message'))
    <div id="sessionMsg" wire:poll.5000ms
         x-data="{ show: true }" x-show="show"
         x-init="setTimeout(() => show = false, 5000)">
        <div class="alert alert-info alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="alert-heading font-size-sm my-2">
                <i class="fas fa-info-circle opacity-50 mr-1"></i>
                {{session()->get('message')}}</h4>
        </div>
    </div>
@elseif(session()->has('error'))
    <div id="sessionMsg" wire:poll.5000ms
         x-data="{ show: true }" x-show="show"
         x-init="setTimeout(() => show = false, 5000)">
        <div class="alert alert-danger alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="alert-heading font-size-sm my-2">
                <i class="fas fa-info-circle opacity-50 mr-1"></i>
                {{session()->get('error')}}</h4>
        </div>
    </div>
@endif


