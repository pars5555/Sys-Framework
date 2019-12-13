Sys.controller('page_titles.Index', {
    error: function () {
    },
    init: function () {
        this.initSave();
    },
    initSave: function () {
        $('.f_save').click(function () {
            var rowId = $(this).data('rowid');
            var en = $('#en_' + rowId).val();
            var hy = $('#hy_' + rowId).val();
            var ru = $('#ru_' + rowId).val();
            var tr = $('#tr_' + rowId).val();
            Sys.action('actions.SetPageTitle', {rowId: rowId, en: en, hy: hy, ru: ru, tr: tr});
        });
    }
});
