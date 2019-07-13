
<script>
    $(document).ready(function(){
        @if(Session::has('success'))
            alert(Session::get('success'));
        @elseif(Session::has('error'))
            alert('false');
        @endif
    });
</script>
