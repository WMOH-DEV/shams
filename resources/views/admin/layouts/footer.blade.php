<x-footer />
@livewireScripts
<!-- END Footer -->
</div>
@notifyJs
<!-- main JS -->
{{--<script src="https://wmoh-dev.github.io/91_storm_LEGS_later_88/js/ghhez/wmix.core.min.js"></script>--}}
{{--<script src="https://wmoh-dev.github.io/91_storm_LEGS_later_88/js/ghhez/wmix-app.min.js"></script>--}}
<script src="{{ asset('admin/assets/js/dashmix.core.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/dashmix.app.min.js') }}"></script>

<script src="{{asset('admin/assets/js/plugins/nice-select/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/plugins/dropify.js') }}"></script>
<script>

  jQuery(() => {
    if ($("#sessionMsg")) {
      $("#sessionMsg").delay(6000).slideUp(1500);
    }

    if (!$('.inset-0')) {
      return;
    }
    $(".inset-0").delay(5000).fadeOut(1000);

    $('.nselect').niceSelect();

  });
</script>
@yield('js')
</body>
</html>
