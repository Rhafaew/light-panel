<script>

    tinymce.init({
        selector: '#editor-full',
        inline: false,
        height: 600,
        language: 'pt_BR',
        theme: 'modern',
        skin: 'whiteblue',
        toolbar_items_size: 'small',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak spellchecker codesample',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: "insertfile newdocument print undo redo cut copy paste pastetext | searchreplace spellchecker template visualblocks ltr rtl | table styleselect removeformat anchor pagebreak | hr nonbreaking inserttime code preview fullscreen",
        toolbar2: "bold italic underline strikethrough forecolor backcolor superscript subscript | fontsizeselect fontselect | alignleft aligncenter alignright alignjustify outdent indent bullist numlist | blockquote codesample image media link unlink charmap emoticons",
        image_advtab: true,
        image_caption: true,
        media_live_embeds: true,
        imagetools_cors_hosts: ['tinymce.com', 'codepen.io'],
        style_formats: [
            {title: 'H1', block: 'h1'},
            {title: 'H2', block: 'h2'},
            {title: 'H3', block: 'h3'},
            {title: 'H4', block: 'h4'},
            {title: 'H5', block: 'h5'},
            {title: 'H6', block: 'h6'},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Texto Vermelho', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Cabeçalho Vermelho', block: 'h1', styles: {color: '#ff0000'}},
            {title: '---------------------------'},

            {title: '≡ FORMATAÇÃO DE TEXTO'},
            {title: 'Pequeno <small>', inline: 'small'},
            {title: 'Negrito <b>', inline: 'b'},
            {title: 'Italico <i>', inline: 'i'},

            {title: '≡ FORMATAÇÃO DE IMAGENS'},
            {title: 'Imagem Responsiva', selector: 'img', classes: 'responsive-img'},
            {title: 'Alinhar à Direta', selector: 'img', styles: {float: 'right', margin: '5px 0 5px 10px'}},
            {title: 'Alinhar à Esquerda', selector: 'img', styles: {float: 'left', margin: '5px 10px 5px 0'}},

            {title: '≡ FORMATAÇÃO DE TABELAS'},
            {title: 'Cabeçalho Azul', selector: 'thead', classes: 'blue'},
            {title: 'Cabeçalho Verde', selector: 'thead', classes: 'green'},
            {title: 'Cabeçalho Laranja', selector: 'thead', classes: 'orange'},
            {title: 'Cabeçalho Vermelho', selector: 'thead', classes: 'red'},
            {title: 'Mouse Hover', selector: 'table', classes: 'highlight'},
            {title: 'Bordas', selector: 'table', classes: 'bordered'},
            {title: 'Tabela Responsiva', selector: 'table', classes: 'responsive-table'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],
        templates: [
            {title: 'Test template 1', content: '\
        <h4>Titulo Principal <small>Sub Titulo</small></h4>\n\
Sed tristique nisl ex. In sed elementum nulla, nec consectetur est. Donec rhoncus nibh mi, ac elementum ex euismod nec. Vestibulum in augue ac purus pulvinar aliquam ut sit amet enim. Sed rutrum leo erat, eget luctus ipsum pulvinar nec. \n\
<img src="http://cmsbasic.com/assets/upload/imagens/3aea382983595068ecd838063201d040.png" width="320" height="177" />Nam viverra faucibus ultrices. Curabitur elementum congue risus. Nullam at laoreet leo, quis congue elit. Quisque volutpat purus tortor, vitae elementum enim auctor sed. Aliquam mattis, risus non porttitor lobortis, lorem lacus sodales est, in maximus felis felis ac justo. Aliquam porttitor neque facilisis pellentesque sodales. Proin eu lectus in dolor finibus convallis in non felis. Nam tristique laoreet dui, nec facilisis lorem tempor id. Donec lacinia ante eu sodales egestas. In blandit volutpat ex nec faucibus.\n\
Sed tristique nisl ex. In sed elementum nulla, nec consectetur est. Donec rhoncus nibh mi, ac elementum ex euismod nec. Vestibulum in augue ac purus pulvinar aliquam ut sit amet enim. Sed rutrum leo erat, eget luctus ipsum pulvinar nec. Nam viverra faucibus ultrices. Curabitur elementum congue risus. Nullam at laoreet leo, quis congue elit. Quisque volutpat purus tortor, vitae elementum enim auctor sed. Aliquam mattis, risus non porttitor lobortis, lorem lacus sodales est, in maximus felis felis ac justo. Aliquam porttitor neque facilisis pellentesque sodales. Proin eu lectus in dolor finibus convallis in non felis. Nam tristique laoreet dui, nec facilisis lorem tempor id. Donec lacinia ante eu sodales egestas. In blandit volutpat ex nec faucibus. '},
            {title: 'Test template 2', content: 'Test 2'}
        ],
        content_css: [
            '../../../assets/css/materialize.min.css',
            '../../../assets/css/css.admin.css'
        ],

        file_browser_callback: function (field, url, type, win) {
            tinyMCE.activeEditor.windowManager.open({
                file: '/assets/js/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
                title: 'ARQUIVOS',
                width: 800,
                height: 600,
                inline: true,
                close_previous: false
            },
                    {
                        window: win,
                        input: field
                    });
            return false;
        }

    });

    tinymce.init({
        selector: ".editor_txt",
        inline: false,
        width: 'auto',
        height: 240,
        menubar: false,
        language: 'pt_BR',
        theme: 'modern',
        skin: 'whiteblue',
        toolbar_items_size: 'small',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak spellchecker codesample',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: "undo | redo | removeformat | bold | italic | underline | alignleft | aligncenter | alignright | alignjustify | forecolor | backcolor | hr | styleselect | image | media | link | unlink | code",
        image_advtab: true,
        image_caption: true,
        media_live_embeds: true,
        imagetools_cors_hosts: ['tinymce.com', 'codepen.io'],
        content_css: [
            '../../../assets/css/materialize.min.css',
            '../../../assets/css/css.admin.css'
        ],

        file_browser_callback: function (field, url, type, win) {
            tinyMCE.activeEditor.windowManager.open({
                file: '/assets/js/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
                title: 'ARQUIVOS',
                width: 800,
                height: 600,
                inline: true,
                close_previous: false
            },
                    {
                        window: win,
                        input: field
                    });
            return false;
        }
    });


    tinymce.init({
        selector: ".editor_txt",
        inline: false,
        width: 'auto',
        height: 240,
        menubar: false,
        language: 'pt_BR',
        theme: 'modern',
        skin: 'whiteblue',
        toolbar_items_size: 'small',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak spellchecker codesample',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: "undo redo removeformat bold italic underline | alignleft aligncenter alignright alignjustify hr image media link unlink | code",
        image_advtab: true,
        image_caption: true,
        media_live_embeds: true,
        imagetools_cors_hosts: ['tinymce.com', 'codepen.io'],
        content_css: [
            '../../../assets/css/materialize.min.css',
            '../../../assets/css/css.admin.css'
        ],

        file_browser_callback: function (field, url, type, win) {
            tinyMCE.activeEditor.windowManager.open({
                file: '/assets/js/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
                title: 'ARQUIVOS',
                width: 800,
                height: 600,
                inline: true,
                close_previous: false
            },
                    {
                        window: win,
                        input: field
                    });
            return false;
        }
    });

    tinymce.init({
        selector: ".editor_code",
        inline: false,
        width: 'auto',
        height: 240,
        menubar: false,
        language: 'pt_BR',
        theme: 'modern',
        skin: 'whiteblue',
        toolbar_items_size: 'small',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak spellchecker codesample',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: "undo redo removeformat | alignleft aligncenter alignright | image media code",
        image_advtab: true,
        image_caption: true,
        media_live_embeds: true,
        imagetools_cors_hosts: ['tinymce.com', 'codepen.io'],
        content_css: [
            '../../../assets/css/materialize.min.css',
            '../../../assets/css/css.admin.css'
        ]
    });

</script>