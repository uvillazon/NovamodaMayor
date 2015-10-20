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
        var cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
            clicksToEdit: 1,
            pluginId: 'cellEditing',
            //onSpecialKey: this.onSpecialKey,

        });
        //me.selType = 'cellmodel';
        me.plugins = [cellEditing];
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
                xtype: 'numberfield',
                hideTrigger: true,
                keyNavEnabled: false,
                mouseWheelEnabled: false,
                completeOnEnter: false
            }
            },

        ];


    },
    onSpecialKey: function (ed, field, e) {
        var me = this;
        var activeRecord = me.grid.getStore().getAt(me.activeRecord.index);
        activeRecord.set(field.name , field.value);
        if (e.getKey() === e.DOWN) {
            console.dir(ed);
            ed.editingPlugin.startEditByPosition({
                //row: me.grid.ObtenerSiguienteIndexEditable(me.activeRecord.index),
                row: 3,
                column: 3
            });

        }
        else{
            return false;
        }
        //return false;
        //me.grid.nextEdit(ed, field, e, activeRecord);
    },
    ObtenerSiguienteIndexEditable: function (index) {
        var me = this;
        ind = 0;
        me.getStore().each(function (rec) {
            //console
            //console.log(rec.index + "   " + index);
            if (rec.index > index) {

                ind = rec.index;
                return false;
            }
        });
        console.log(ind);
        return ind;
    },
    //d.editingPlugin.startEditByPosition({ row: me.ObtenerSiguienteIndexEditable(rec.index), column: 11 });
});