'use strict';
var app = {};

app.core = {};

app.ui = {
    imageUpdload: function () {
        $("input:file").change(function () {
            var fileName = $(this).val();
            if (fileName.match(/fakepath/)) {
                fileName = fileName.replace(/C:\\fakepath\\/i, '');
            }
            $(this).parent('.upload-file').find('span').html(fileName);
        });
    },
    addSize: function () {
        $('.js-add-size').click(function () {
            $(this).before(`
                <div class="col-md-1">
                    <label class="btn btn-outline-primary">
                        <input name="new_size" class="form-control">
                    </label>
                </div>
            `);
        })
    },
    lcSwitch: function () {
        $('.js-visible-switch').lc_switch();
    },
    switchDesigners: function () {
        $(document.body).delegate('.js-switcher', 'lcs-on lcs-off', function (event) {
            var type = '';
            var url = $(this).data('route');
            var model = $(this).data('model');

            if (event.type === 'lcs-on')
                type = 1;
            else
                type = 0;

            app.ui.sendAjax(type, url, model);
        });
    },
    sendAjax: function (type, url, model) {
        var token = $('meta[name=csrf-token]').attr('content');

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: token,
                type: type,
                model: model
            }
        })
    }
};

app.content = {
    imageDelete: function() {
        $(document.body).delegate('.js-delete-image', 'submit', function () {
            var url = $(this).attr('action');
            var type = $(this).attr('method');
            var data = $(this).serialize();

            $(this).parents('.col-md-2').remove();

            $.ajax({
                url: url,
                type: type,
                data: data,
                success: function (data) {
                }
            });

            return false;
        })
    },
    searchDesigners: function() {
        $(document.body).delegate('#js-search', 'keyup', function () {
            var $form = $(this).parent('form');

            var data = $form.serialize();
            var url = $form.attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function (data) {
                    var table = $('.js-table');
                    table.empty();
                    table.html(data);
                    app.ui.lcSwitch();
                }
            });

            return false;
        })
    },
    addValue: function () {
        $(document.body).delegate('.js-add-value', 'click', function () {
            // var inputs = $('.js-put-values');
            var inputs = $(this).closest('.field__repeater').find('.js-put-values');
            var lang = $(this).data('lang');

            var $input = `
                <div class="form-group">
                    <div class="input-group mb-1">
                        <input class="form-control" name="values[` + lang + `][]">
                        <span class="js-remove-value">
                            <a href="javascript:;" class="btn btn-danger">
                                <i class="fas fa-times"></i>
                            </a>
                        </span>
                    </div>
                </div>
            `;

            inputs.append($input);
        });
    },
    removeValue: function () {
        $(document.body).delegate('.js-remove-value', 'click', function () {
            $(this).parent('.input-group').remove();
        });
    },
    metaKeywords: function () {
        $('.js-keywords').each(function (numb, el) {
            $(el).select2({
                tags: true,
                width: 'resolve',
                tokenSeparators: [','],
                dropdownCssClass: 'select2-hidden',
                containerCssClass: 'select2-keywords'
            });
            $(el).trigger('select2.inited');
        });

    },
    fields: function () {
        $('.js-select2-fields').each(function (numb, el) {
            $(el).select2();
        });

    }
};

$(function () {
    // Content
    app.content.addValue();
    app.content.removeValue();
    app.content.metaKeywords();
    app.content.fields();
    app.content.imageDelete();
    app.content.searchDesigners();

    // UI
    app.ui.imageUpdload();
    app.ui.addSize();
    app.ui.lcSwitch();
    app.ui.switchDesigners();
});

$(window).on('resize', function () {

});

$(window).on('orientationchange', function () {

});
