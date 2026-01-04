$('.daterange').daterangepicker({
  alwaysShowCalendars: true,
  showDropdowns: true,
  opens: "right",
  locale: { format: "YYYY-MM-DD" },
  autoApply: true
}, function (start, end) {
  $('.daterange-span').text(start.format("YYYY-MM-DD") + " - " + end.format("YYYY-MM-DD"));
});
