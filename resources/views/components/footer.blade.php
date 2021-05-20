<footer id="page-footer" class="bg-body-light">
    <div class="content py-0">
        <div class="row font-size-sm">
            <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-left">
                <span>{{ __('global.by_company') }} <a class="font-w600" href="https://www.marslia.com.eg" target="_blank">Marslia </a></span> -
                {{ __('global.made_by') }}
                <a class="font-w600" id="author" href="{{ __('global.author_link') }}" target="_blank">{{ __('global.author') }}</a>
            </div>
            <div class="col-sm-6 order-sm-1 text-center text-sm-right">
                <a class="font-w600" href="{{$site_web ??  url('/') }}" target="_blank">{{$site_name}}</a> &copy; <span data-toggle="year-copy"></span>
            </div>
        </div>
    </div>
</footer>
