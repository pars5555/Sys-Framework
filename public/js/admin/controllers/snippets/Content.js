Sys.controller('snippets.Content', {
    error: function () {
    },
    init: function () {
        this.initSave();
    },
    initSave: function () {
        $('.f_save').click(function () {
            var rowId = $(this).data('rowid');
            var en = $('#phrase_en_' + rowId).val();
            var hy = $('#phrase_hy_' + rowId).val();
            var ru = $('#phrase_ru_' + rowId).val();
            var tr = $('#phrase_tr_' + rowId).val();
            Sys.action('actions.SetSnippet', {rowId: rowId, phrase_en: en, phrase_hy: hy, phrase_ru: ru, phrase_tr: tr});
        });
    }
});
