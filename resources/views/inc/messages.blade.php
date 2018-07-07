
@if(count($errors)>0)
    @foreach($errors->all() as $error)
    <script>
        $(function(){
            let errorinst = new NotificationHandler();
            errorinst.notifyUserError('{{$error}}','Error!','top','center','','');
        })
    </script>
    @endforeach
@endif

@if(session('success'))
<script>    
    $(function(){
        let successinst = new NotificationHandler();
        successinst.notifyUserSuccess("{{session('success')}}","Success!",'bottom','right','','');
    })
</script>
@endif