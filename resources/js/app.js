require('./bootstrap');

function setDatePicker(){
    $(".datepicker").datetimepicker({
      format: "YYYY-MM-DD",
      useCurrent: false
    })
  }
  function setDateRangePicker(input1, input2){
    $(input1).datetimepicker({
      format: "YYYY-MM-DD",
      useCurrent: false
    })
    $(input1).on("change.datetimepicker", function (e) {
      $(input2).val("")
          $(input2).datetimepicker('minDate', e.date);
      })
    $(input2).datetimepicker({
      format: "YYYY-MM-DD",
      useCurrent: false
    })
  }
  function setMonthPicker(){
    $(".monthpicker").datetimepicker({
      format: "MM",
      useCurrent: false,
      viewMode: "months"
    })
  }
  function setYearPicker(){
    $(".yearpicker").datetimepicker({
      format: "YYYY",
      useCurrent: false,
      viewMode: "years"
    })
  }
  function setYearRangePicker(input1, input2){
    $(input1).datetimepicker({
      format: "YYYY",
      useCurrent: false,
      viewMode: "years"
    })
    $(input1).on("change.datetimepicker", function (e) {
      $(input2).val("")
          $(input2).datetimepicker('minDate', e.date);
      })
    $(input2).datetimepicker({
      format: "YYYY",
      useCurrent: false,
      viewMode: "years"
    })
  }function setDatePicker(){
  $(".datepicker").datetimepicker({
    format: "YYYY-MM-DD",
    useCurrent: false
  })
}
function setDateRangePicker(input1, input2){
  $(input1).datetimepicker({
    format: "YYYY-MM-DD",
    useCurrent: false
  })
  $(input1).on("change.datetimepicker", function (e) {
    $(input2).val("")
        $(input2).datetimepicker('minDate', e.date);
    })
  $(input2).datetimepicker({
    format: "YYYY-MM-DD",
    useCurrent: false
  })
}
function setMonthPicker(){
  $(".monthpicker").datetimepicker({
    format: "MM",
    useCurrent: false,
    viewMode: "months"
  })
}
function setYearPicker(){
  $(".yearpicker").datetimepicker({
    format: "YYYY",
    useCurrent: false,
    viewMode: "years"
  })
}
function setYearRangePicker(input1, input2){
  $(input1).datetimepicker({
    format: "YYYY",
    useCurrent: false,
    viewMode: "years"
  })
  $(input1).on("change.datetimepicker", function (e) {
    $(input2).val("")
        $(input2).datetimepicker('minDate', e.date);
    })
  $(input2).datetimepicker({
    format: "YYYY",
    useCurrent: false,
    viewMode: "years"
  })
}