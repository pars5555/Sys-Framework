Sys.controller('snippets.Index', {
    error: function () {
    },
    init: function () {
        $('#namespace_select').change(function () {
            var namespace = $('#namespace_select').val();
            Sys.requestController('snippets.Content', {'namespace': namespace}, 'selectedPageContent');
        }.bind(this));
    }

});
