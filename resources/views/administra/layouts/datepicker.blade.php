    <div class="input-group input-daterange">
        <input  name="de" id="de" type="text" class="form-control" value="{{isset($editdata) ? $editdata->descompte_de : ''}} {{isset($editdata) ? $editdata->sessio_de : ''}} {{isset($editdata) ? $editdata->entrada_de : ''}}">
        <div class="input-group-addon">fins</div>
        <input  name="fins_a" id="fins_a" type="text" class="form-control" value="{{isset($editdata) ? $editdata->descompte_a : ''}} {{isset($editdata) ? $editdata->sessio_a : ''}} {{isset($editdata) ? $editdata->entrada_a : ''}}">
    </div>
    <!-- Javascripts datepicker-->
    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.ca.min.js')}}"></script>
    <!-- Styles datepiker-->
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <script>
    $('.input-daterange').datepicker({
        format: "yyyy-mm-dd",
        todayBtn: "linked",
        clearBtn: true,
        language: "ca",
        daysOfWeekHighlighted: "0,6",
        orientation: "auto",
        autoclose: false,
        todayHighlight: true,
    });
    </script>