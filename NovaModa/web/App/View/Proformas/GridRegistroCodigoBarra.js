/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define("App.View.Proformas.GridRegistroCodigoBarra", {
    extend: "Ext.grid.Panel",
    title: 'Asignar Codigo de Barra',
    width: 350,
    height: 400,
    //parametros obligados para mostrar reporte de historico de estados por tabla
    initComponent: function () {
        var me = this;
        me.selType = 'rowmodel';
        me.plugins = [
            Ext.create('Ext.grid.plugin.CellEditing', {
                clicksToEdit: 1
            })
        ];
        me.cargarComponentes();
        this.callParent(arguments);

    },
    cargarComponentes: function () {
        var me = this;
        me.store = Ext.create("App.Store.Proformas.CodigosBarra");
        me.columns = [
            {xtype: "rownumberer", width: 30, sortable: false},
            {header: "Cant", width: 50, sortable: true, dataIndex: "cantidad"},
            {header: "Talla", width: 50, sortable: true, dataIndex: "talla"},
            {
                header: "Codigo <br>Barra", width: 200, sortable: true, dataIndex: "codigobarra", editor: {
                xtype: 'numberfield'
            }
            },

        ];


    }

});