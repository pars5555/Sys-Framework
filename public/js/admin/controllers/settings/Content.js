Sys.controller('settings.Content', {
    error: function () {
    },
    init: function () {
        this.initSave();
    },
    initSave: function () {
        $('.f_save').click(function () {
            var rowId = $(this).data('row_id');
            var description = $('#description_' + rowId).val();
            var value = $('#value_' + rowId).val();
            Sys.action('actions.SetSetting', {id: rowId, value: value, description: description},function(){
                alert('successfully saved');
            });
        });
    }
});
