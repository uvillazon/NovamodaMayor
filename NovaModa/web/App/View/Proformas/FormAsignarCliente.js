/**
 * Created by uvillazon on 04/09/2015.
 */
Ext.define("App.View.Proformas.FormAsignarCliente", {
    extend: "App.Config.Abstract.Form",
    title: "Asignar Cliente Vendedor",
    cargarStores: true,
    //Observar el ultimo comentario de la transicion de ESTADO
    verObservacion: true,
    initComponent: function () {
        var me = this;
        me.cargarComponentes();
        this.callParent(arguments);
    },
    cargarComponentes: function () {
        var me = this;

        me.store_marca = Ext.create("App.Store.Proformas.Marcas");
        me.cbx_marca = Ext.create("App.Config.Componente.ComboBase", {
            fieldLabel: 'Cliente',
            displayField: 'nombre',
            valueField: 'nombre',
            name: 'marca',
            colspan: 2,
            width: 480,
            afterLabelTextTpl: Constantes.REQUERIDO,
            allowBlank: false,
            store: me.store_marca
        });
        //App.Store.Proformas.Almacenes
        me.store_almacen = Ext.create("App.Store.Proformas.Almacenes");
        me.cbx_almacen = Ext.create("App.Config.Componente.ComboBase", {
            fieldLabel: 'Vendedor',
            displayField: 'nombre',
            valueField: 'nombre',
            name: 'almacen',
            colspan: 2,
            width: 480,
            afterLabelTextTpl: Constantes.REQUERIDO,
            allowBlank: false,
            store: me.store_almacen.load()
        });



        me.items = [

            me.cbx_marca,
            me.cbx_almacen,

        ];
    }
});
