
@section('css-links')
<link rel="stylesheet" href="{{asset('css/dataTables.dataTables.css')}}">
@endsection

@section('js')
<script src="{{asset('js/dataTables.js')}}"></script>
 
<script>
 
    let table = new DataTable('#mytable', {
    // config options...
});
</script>

@endsection