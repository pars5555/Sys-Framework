Sys.controller('Index', {
    error: function () {
    },
    init: function () {
       
        Sys.registerNoAccessEvent(this.ajaxNoAccess);
    },
    ajaxNoAccess: function () {
       alert('No Access');
    }


});