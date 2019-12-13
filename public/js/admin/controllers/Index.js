Sys.controller('Index', {
    error: function () {

    },
    init: function () {
        this.initSidebar();
        this.initModals();
        this.initClickableObjext();
        this.initEditableCells();
        this.initCheckboxCells();
        this.initSelectableCells();
        Sys.registerNoAccessEvent(this.ajaxNoAccess);        
    },
    initClickableObjext: function () {
        $("body").on("click", ".f_objext", function () {
            var controller = $(this).data('controller');
            var objectId = $(this).data('id');
            Sys.requestController(controller, {'id':objectId }, 'rightSideContent');
        });
        
    },
    ajaxNoAccess: function () {
        window.location.reload();
    },
    initCheckboxCells: function () {
        $("body").on("dblclick", ".f_checkbox_cell", function () {
            var checkboxElement = $('<input type="checkbox"/>');
            var value = $(this).data('value');
            var displayValue = $(this).text();
            var cellFieldName = $(this).data('field-name');
            var id = $(this).parent('ul').data('id');
            if (value == 1) {
                $(checkboxElement).prop('checked', true);
            }
            $(this).html(checkboxElement);
            var cellElement = $(this);
            checkboxElement.focus();
            checkboxElement.blur(function () {
                checkboxElement.remove();
                cellElement.html(displayValue);
            });
            checkboxElement.change(function () {
                var value = $(this).is(":checked") ? 1 : 0;
                cellElement.data('value', value);
                $(this).off();
                Sys.action('actions.users.UpdateField', {
                    'id': id,
                    'field_name': cellFieldName,
                    "field_value": value
                }, function (ret) {
                    cellElement.data('value', ret.value);
                    checkboxElement.remove();
                    if (typeof ret.display_value === 'undefined') {
                        ret.display_value = ret.value;
                    }
                    cellElement.html(ret.display_value);
                });
            });
        });
    },
    initSelectableCells: function () {
        $("body").on("dblclick", ".f_selectable_cell", function () {
            var templateSelectId = $(this).data('template-select-id');
            var selectElement = $('#' + templateSelectId).clone();
            var value = $(this).data('value');
            var displayValue = $(this).text();
            var cellFieldName = $(this).data('field-name');
            var data_service = $(this).closest('.f_row').data('service');
            var id = $(this).closest('.f_row').data('id');
            if (value >= 0 || value.length>0) {
                $(selectElement).val(value);
            }
            selectElement.removeAttr('id');
            selectElement.removeClass('is_hidden');
            $(this).html(selectElement);
            var cellElement = $(this);
            selectElement.focus();
            selectElement.blur(function () {
                selectElement.remove();
                cellElement.html(displayValue);
            });
            selectElement.change(function () {
                var value = $(this).val();
                cellElement.data('value',value);
                $(this).off();
                Sys.action('actions.UpdateField', 
                    {'id': id,
                     'data_service': data_service,
                     'field_name': cellFieldName,
                     "field_value": value}, function (ret) {
                    cellElement.data('value',ret.value);
                    selectElement.remove();
                    cellElement.html(ret.display_value);
                });
            });
        });
    },
    initEditableCells: function () {
        $("body").on("dblclick", ".f_editable_cell", function (event) {
            var editableCell = event.target;
            var cellValue = $(editableCell).text().trim();
            var cellFieldName = $(editableCell).data('field-name');
            var type = $(editableCell).data('type');
            var data_service = $(editableCell).closest('.f_row').data('service');
            var id = $(editableCell).closest('.f_row').data('id');
            if (type === 'richtext') {
                var input = $('<textarea ondblclick="event.preventDefault();event.stopPropagation();" style="width:100%;height:100%" data-id="' + id + '" data-field-name="' + cellFieldName + '">' + cellValue.htmlEncode() + '</textarea>')
            } else {
                var input = $('<input ondblclick="event.preventDefault();event.stopPropagation();" style="width:100%;height:100%" data-id="' + id + '" data-field-name="' + cellFieldName + '" type="text" value="' + cellValue.htmlEncode() + '"/>')
            }

            $(editableCell).html(input);
            $(input).select();
            var cellElement = $(editableCell);
            input.focus();
            input.blur(function () {
                var id = $(this).data('id');
                var fielldName = $(this).data('field-name');
                var value = $(this).val().trim();
                cellElement.html(value);
                $(this).off();
                Sys.action('actions.UpdateField',
                        {'id': id, 'data_service': data_service,
                            'field_name': fielldName,
                            "field_value": value},
                        function (ret) {
                            cellElement.html(ret.value);
                        });
            });
            input.keyup(function (evt) {
                if (evt.keyCode == 27) {
                    cellElement.html(cellValue);
                }
            });
        });
    },
    initModals: function () {
        $('body').on('click', '.modal .f_modal-close', function () {
            $(this).closest('.modal').removeClass('is_active');
        });        
        $('body').on('click', '.modal .f_modal-remove', function () {
            $(this).closest('.modal').remove();
        });        
    },
    initSidebar: function () {
        $('.sidebar-nav a').click(function () {
            var controller = $(this).attr('controller');
            $('#rightSideContent').html('<img src="/img/loading.gif" />');
            Sys.requestController(controller, {}, 'rightSideContent');
            return false;

        });
    }
});
