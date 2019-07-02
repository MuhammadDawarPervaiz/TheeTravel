<script type="text/javascript" src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.noconflict.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/modernizr.2.7.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.placeholder.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery-ui.1.10.4.min.js') }}"></script>

    <!-- Begin SCRIPTS -->

      <!-- BEGIN CORE PLUGINS -->
          <script src="{{ URL::asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
          <script src="{{ URL::asset('assets/layouts/layout/scripts/awesomplete.min.js') }}" type="text/javascript"></script>
          <script src="{{ URL::asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
          <script src="{{ URL::asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
          <script src="{{ URL::asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
          <script src="{{ URL::asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
          <script src="{{ URL::asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
      <!-- END CORE PLUGINS -->

          <script src="{{ URL::asset('assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}" type="text/javascript"></script>
          <script src="{{ URL::asset('assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js') }}" type="text/javascript"></script>

      <!-- Datatables -->

          <script type="text/javascript" src="{{ URL::asset('assets/global/scripts/datatable.js') }}"></script>
          <script type="text/javascript" src="{{ URL::asset('assets/global/plugins/datatables/datatables.min.js') }}"></script>
          <script type="text/javascript" src="{{ URL::asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
          <script type="text/javascript" src="{{ URL::asset('assets/pages/scripts/table-datatables-editable.min.js') }}"></script>

      <!-- BEGIN THEME GLOBAL SCRIPTS -->
          <script src="{{ URL::asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
      <!-- END THEME GLOBAL SCRIPTS -->

      <!-- BEGIN THEME LAYOUT SCRIPTS -->
          <script src="{{ URL::asset('assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
          <script src="{{ URL::asset('assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
          <script src="{{ URL::asset('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
          <script src="{{ URL::asset('assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
      <!-- END THEME LAYOUT SCRIPTS -->

    <!-- END SCRIPTS -->

<!-- Twitter Bootstrap -->
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.js') }}"></script>

<!-- Flex Slider -->
<script type="text/javascript" src="{{ URL::asset('components/flexslider/jquery.flexslider-min.js') }}"></script>

<!-- parallax -->
<script type="text/javascript" src="{{ URL::asset('js/jquery.stellar.min.js') }}"></script>

<!-- waypoint -->
<script type="text/javascript" src="{{ URL::asset('js/waypoints.min.js') }}"></script>

<!-- load page Javascript -->
<script type="text/javascript" src="{{ URL::asset('js/theme-scripts.js') }}"></script>

<script type="text/javascript">
    tjq(document).ready(function() {
        tjq("#profile .edit-profile-btn").click(function(e) {
            e.preventDefault();
            tjq(".view-profile").fadeOut();
            tjq(".edit-profile").fadeIn();
        });

        setTimeout(function() {
            tjq(".notification-area").append('<div class="info-box block"><span class="close"></span><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ab quis a dolorem, placeat eos doloribus esse repellendus quasi libero illum dolore. Esse minima voluptas magni impedit, iusto, obcaecati dignissimos.</p></div>');
        }, 10000);
    });
    tjq('a[href="#profile"]').on('shown.bs.tab', function (e) {
        tjq(".view-profile").show();
        tjq(".edit-profile").hide();
    });
</script>

<script>
    function myFunction() {

      document.querySelector('input[list]').addEventListener('input', function(e) {
          var input = e.target,
              list = input.getAttribute('list'),
              options = document.querySelectorAll('#' + list + ' option'),
              hiddenInput = document.getElementById(input.id + '-hidden'),
              inputValue = input.value;

          hiddenInput.value = inputValue;

          for(var i = 0; i < options.length; i++) {
              var option = options[i];

              if(option.innerText === inputValue) {
                  hiddenInput.value = option.getAttribute('data-value');
                  break;
              }
          }
        });
//        var shownVal= document.getElementById("select_continent").value;
  //      var value2send=document.querySelector("#continents_list option[value='"+shownVal+"']").dataset.value;
        alert("You pressed " + hiddenInput);
    }
</script>

<script>
    $(function()
    {
        $('#flash').delay(200).fadeIn(10000).delay(2000).fadeOut(1000);
    });
</script>

<script>
/*/ AJAX For Class_category

    $('#add_class_category').click(function(e)
    {
        //e.preventDefault();
        id = $('#select_class option:last-child').val();
        id++;
        class_name = $('input[name=class_category]').val();
        $.ajax(
        {
            type: 'post',
            url: 'add_class',
            data:
            {
                //'_token': $('input[name=_token]').val(),
                'class_name': class_name
            },
            success: function(data)
            {
                $('#select_class').append("<option value='" + id + "'>" + data.class_name + "</option>");
            }
        });
        $('input[name=class_category]').val('');
    });/**/

</script>

<script type="text/javascript">
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
// AJAX For Confirm Booking

    $('input[name^=confirm_booking]').click(function(e)
    {
        id = $(this).val();
        $.ajax(
        {
            type: 'post',
            url: 'confirm_booking',
            data:
            {
                'id': id
            },
            success: function(data)
            {
                console.log();
            }
        });
    });
</script>
