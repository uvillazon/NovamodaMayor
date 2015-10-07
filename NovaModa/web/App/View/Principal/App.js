/* File Created: August 4, 2013 */

Ext.Loader.setConfig({ enabled: true });
Ext.Loader.setPath('App', 'App')
Ext.require([
    'App.*'
]);

Ext.application({
    name: 'App',
    appFolder: 'App',
    controllers: [],
    launch: function () {
        Ext.tip.QuickTipManager.init();
        var panel = Ext.create('App.View.Principal.Principal', {
            app : this
            //            renderTo: 'contenido'
        });
    }
});
