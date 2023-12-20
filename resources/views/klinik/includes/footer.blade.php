<footer class="footer">
  <div class="container-fluid clearfix">
    <span class="float-right">
        <a href="#">Bantaeng Sehat</a> &copy; 
    </span>
  </div>
</footer>
@if (session('success'))
<script>
  $(document).ready(function() {
    $('#successModal').modal('show');
  });
</script>
@endif
