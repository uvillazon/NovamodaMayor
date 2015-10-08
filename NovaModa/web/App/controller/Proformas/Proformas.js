/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define('App.controller.Proformas.Proformas', {
    extend: "Ext.app.Controller",
    //refs: [{
    //    ref: 'gridUser',
    //    selector: '#gridAppUsr'
    //}],
    init: function () {
        var me = this;
        me.control({
            '#btn_crearProforma': {
                click: me.winCrearProforma
            }
            ,
            '#btn_editarProforma': {
                click: me.winCrearApp
            }
        });

        this.callParent();
        //me.cargarEventos();
    },
    winCrearProforma: function () {
        var me = this;

        var win = Ext.create("App.Config.Abstract.Window", {botones: true, destruirWin: true});
        var form = Ext.create("App.View.Proformas.FormProforma", {botones: false});
        win.add(form);
        win.show();

        win.btn_guardar.on('click', function () {
            Funciones.AjaxRequestWinFn('proformas', 'proformas', win, form, null,null, null, win,function(str){
                console.log(str.success);
                if(str.success){
                    Ext.MessageBox.alert('Exito', str.msg,function(){
                        me.cargarVentanaGrid();
                    });
                }
                else{
                    Ext.MessageBox.alert('Error', str.msg);
                }

            });
        });
        //Funciones.AjaxRequestCargarStore( "Marca.php?funcion=BuscarMarca", win, form.cbx_marca, "marcaM", null);
        //alert("sasda");
        //App.View.Proformas.FormProformas
    },
    cargarVentanaGrid : function(){
        var me = this;
        var win = Ext.create("App.Config.Abstract.Window", {botones: true, destruirWin: true});
        var form = Ext.create("App.View.Proformas.GridProformas", {botones: false});
        win.add(form);
        win.show();
    },

    //cargarEventos: function () {
    //    var me = this;
    //    me.cmpPrincipal.grid.getSelectionModel().on('selectionchange', me.cargarDatosGrid, this);
    //
    //
    //},
    //cargarDatosGrid: function (selModel, selections) {
    //    var me = this;
    //    console.dir(selections);
    //    disabled = selections.length === 0;
    //    me.record = !disabled ? selections[0] : null;
    //    //Funciones.DisabledButton('btn_editarApp', me.cmpPrincipal, disabled);
    //    if (!disabled) {
    //        me.cmpPrincipal.form.CargarDatos(me.record);
    //        me.getGridUser().getStore().setExtraParams({id_aplic: me.record.get("id_aplic")});
    //        me.getGridUser().getStore().load();
    //    }
    //    else {
    //        me.cmpPrincipal.form.getForm().reset();
    //        me.getGridUser().getStore().setExtraParams({id_aplic: 0});
    //        me.getGridUser().getStore().load();
    //    }
    //},
    //winCrearApp: function (btn) {
    //    var me = this;
    //    var win = Ext.create("App.Config.Abstract.Window", { botones: true, destruirWin: true });
    //    var form = Ext.create("App.View.Aplicaciones.FormAplicacion",{botones : false});
    //    win.add(form);
    //    win.show();
    //    if(btn.getItemId() === "btn_editarApp"){
    //        form.getForm().loadRecord(me.record);
    //    }
    //    win.btn_guardar.on('click', function () {
    //        Funciones.AjaxRequestWin('aplicaciones', 'aplicaciones', win, form, me.cmpPrincipal.grid, 'Esta Seguro de guardar?', null, win);
    //    });
    //}
})
;