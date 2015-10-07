/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define("App.View.Proformas.Proformas", {
    extend: "App.Config.Abstract.PanelPrincipal",
    initComponent: function () {
        var me = this;
        me.CargarComponentes();
        this.callParent(arguments);
    },
    CargarComponentes: function () {
        var me = this;

        me.toolbar = Funciones.CrearMenuBar();
        Funciones.CrearMenu('btn_crearProforma', "Crear Proforma", 'application_form_add', null, me.toolbar, this, null, null, null, false);
        Funciones.CrearMenu('btn_editarProforma', "Editar Proforma", "application_form_edit", null, me.toolbar, this, null, null, null, true);
        Funciones.CrearMenu('btn_eliminarProforma', "Eliminar Proforma.", "application_form_delete", null, me.toolbar, this, null, null, null, true);

        me.grid = Ext.create('App.View.Proformas.GridProformas', {
            width: '100%',
            region: 'center',
            borrarParametros: true,
            fbarmenu: me.toolbar,
            fbarmenuArray: ["btn_editarProforma","btn_eliminarProforma"]
        });


        me.items = [me.grid];
    }
})
;
