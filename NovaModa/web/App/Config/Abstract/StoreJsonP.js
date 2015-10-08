/**
 * @class App.Config.Abstract.Store
 * @extends Ext.data.Store
 * requires
 * @autor Ubaldo Villazon
 * @date 07/11/2013
 *
 * Description
 *
 *
 **/

Ext.define("App.Config.Abstract.StoreJsonP", {
    extend: "Ext.data.Store",
    remoteSort: true,
    autoLoad: false,
    sortProperty: '',
    sortDirection: 'DESC',
    //pageSize :75,
    constructor: function (options) {
        var me = this;

        Ext.apply(me, options || {});
        me.proxy = {
            type: 'jsonp',
            url:  me.url,
            reader: {
                type: "json",
                root: "resultado",
                successProperty: "success",
                totalProperty: "Total"
            },
            simpleSortMode: true

        };
        me.sorters = [{
            property: me.sortProperty,
            direction: me.sortDirection
        }];
        me.callParent(arguments);
    }
});