</div>
<div class="container">
  <nav class="navbar navbar-expand navbar-dark bg-info">
      <span class="text-light m-auto">
          copyright &copy; 2020
      </span>
  </nav>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script>
$('#menu').collapse({
  toggle: true
})

$('#menu').on('hidden.bs.collapse', function () {
  $('#content').addClass("col-lg-12")
})

$('#menu').on('show.bs.collapse', function () {
  $('#content').removeClass("col-lg-12")
})
</script>

</body>
</html>