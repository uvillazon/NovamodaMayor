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
    aplicarfiltrosAlmacen : function(idalmacen){
        var me =this;
        console.log(idalmacen);
        me.store_clientes.setExtraParams({idalmacen : idalmacen});
        me.store_vendedor.setExtraParams({idalmacen : idalmacen});
    },
    cargarComponentes: function () {
        var me = this;

        me.store_clientes = Ext.create("App.Store.Proformas.Clientes");
        me.cbx_cliente = Ext.create("App.Config.Componente.ComboAutoBase", {
            fieldLabel: 'Cliente',
            displayField: 'nombre',
            valueField: 'codigo',
            name: 'cliente',
            colspan: 2,
            width: 480,
            afterLabelTextTpl: Constantes.REQUERIDO,
            allowBlank: false,
            store: me.store_clientes,
            textoTpl: function () {
                return "{codigo} - {nombre} {apellido}"
            },
        });
        //App.Store.Proformas.Almacenes
        me.store_vendedor = Ext.create("App.Store.Proformas.Empleados");
        me.cbx_vendedor = Ext.create("App.Config.Componente.ComboAutoBase", {
            fieldLabel: 'Vendedor',
            displayField: 'nombres',
            valueField: 'codigo',
            name: 'vendedor',
            colspan: 2,
            width: 480,
            afterLabelTextTpl: Constantes.REQUERIDO,
            allowBlank: false,
            store: me.store_vendedor,
            textoTpl: function () {
                return "{codigo} - {nombres} {apellidos}"
            },
        });



        me.items = [

            me.cbx_cliente,
            me.cbx_vendedor,

        ];
    }
});
