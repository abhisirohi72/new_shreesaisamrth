<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

    function getSponsor(sponsor_id) {
        // alert(sponsor_id);
        $.ajax({
            type: "POST",
            url: '{{ route('user.get_sponsor') }}',
            data: {
                sponsor_id: sponsor_id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $("#sponsor_email").html(data);
            },
            error: function(xhr) {
                console.error('CSRF or server error:', xhr.responseText);
            }
        });
    }
</script>