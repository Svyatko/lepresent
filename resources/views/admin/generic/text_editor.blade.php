{{--<script src="{{ asset('/_admin/assets/dist/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>--}}
<script>
    var editor_config = {
        path_absolute: "{{ URL::to('/') }}/",
        selector: ".js-tinymce",
        height: 300,
        menu: {
            edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall | searchreplace'},
            insert: {title: 'Insert', items: 'link insertdatetime | hr image'},
            view: {title: 'View', items: 'visualblocks visualchars | fullscreen'},
            format: {title: 'Format', items: 'removeformat'},
            tools: {title: 'Tools', items: 'spellchecker code'}
        },
        plugins: [
            'advlist autolink lists link image charmap hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern media'
        ],
        toolbar: 'undo redo | styleselect | bold italic underline strikethrough superscript subscript | bullist numlist | link media',
        relative_urls: false,
        file_browser_callback : function (field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'filemanager?field_name='
                + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + '&type=Image';
            }
            else {
                cmsURL = cmsURL + '&type=Files';
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizeble: 'yes',
                close_previous: 'no'
            });
        }
    };

    tinymce.init(editor_config);
</script>
