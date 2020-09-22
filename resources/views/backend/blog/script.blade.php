@section('script')
    <script type="text/javascript">
        //pagination
        // $ul.('ul.pagination').addClass('no-margin pagination-sm');

        //slug otomatis dari judul
        $('#title').on('input', function(){
            var theTitle = this.value.toLowerCase().trim(),
                slugInput = $('#slug'),
                theSlug = theTitle.replace(/&/g, '-and-').replace(/[^a-z0-9-]+/g, '-').replace(/\-\-+/g, '-').replace(/^-+|-+$/g, '');
            slugInput.val(theSlug);
        });

        var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] });

        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            showClear: true
        });

        $(function () {

            var konten = document.getElementById("konten");
            CKEDITOR.replace(konten,{
                language:'en-gb'
            });
            CKEDITOR.config.allowedContent = true;
        })

    </script>
    <script src={{ asset("public/ckeditor/ckeditor.js") }}></script>
@endsection
