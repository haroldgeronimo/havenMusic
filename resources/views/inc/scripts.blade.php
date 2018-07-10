
<script src="{!! asset('js/app.js') !!}"></script>
<script>       
        $( function() {
            $( "#slider" ).slider({
                range: "min",
                max: 100,
                value: 40,
            });
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 500,
                values: [ 75, 300 ]
            });
        } );

</script>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
<script>
        $('#form_delete').on('click', function(e){
            e.preventDefault();
            var $form=$(this);
            $('#confirm').modal({ backdrop: 'static', keyboard: false })
                .on('click', '#delete-btn', function(){
                    $form.submit();
                });
        });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.5/js/standalone/selectize.min.js"></script>

<script>
    
$( document ).ready(function() {
    $('#tags').selectize({
        delimiter: ',',
        persist: false,
        valueField: 'tag',
        labelField: 'tag',
        searchField: 'tag',
        options: tags,
        create: function(input) {
            return {
                tag: input
            }
        }
    });
});

$( document ).ready(function() {
    $('#composers').selectize({
        delimiter: '%',
        persist: true,
        valueField: 'id',
        labelField: 'composer',
        searchField: 'composer',
        options: composers,
        preload:true,
        create: function(input) {
            return {
                id: input,
                composer: input
            }
        }
                @if(isset($song))
                @if(count($song->composers)>0)
                ,load: function(){    
                     @foreach($song->composers as $c)
                   this.addItem({{$c->id}});
                    @endforeach
                }  
                @endif
                @endif
    });
});

</script>
