String.prototype.ucfirst = function ()
{
    return this.charAt(0).toUpperCase() + this.substr(1);
};
String.prototype.htmlEncode = function () {
    return this.replace(/\"/g, '&quot;');
};
if (window.jQuery) {
    $.fn.serializeObject = function () {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
}