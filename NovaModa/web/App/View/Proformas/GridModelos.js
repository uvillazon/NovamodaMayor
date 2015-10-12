/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define("App.View.Proformas.GridModelos", {
    extend: "App.Config.Abstract.Grid",
    title: 'Modelos',
    //imprimir: true,
    criterios: true,
    opcion: '',
    paramsStore: null,
    noLimpiar: null,
    opcion: 'gridMoleca',

    //parametros obligados para mostrar reporte de historico de estados por tabla
    initComponent: function () {
        var me = this;
        me.selType = 'cellmodel';
        me.plugins = [
            Ext.create('Ext.grid.plugin.CellEditing', {
                clicksToEdit: 1
            })
        ];
        switch (me.opcion) {
            case "gridMoleca" :
                me.cargarGridMoleca();

        }
        this.callParent(arguments);

    },
    cargarGridMoleca: function () {
        var me = this;
        //me.store = Ext.create("App.Store.Proformas.Proformas");
        me.CargarComponentes();
        me.columns = [
            {xtype: "rownumberer", width: 30, sortable: false},
            {
                header: "Modelo", width: 90, sortable: true, dataIndex: "modelo", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Material", width: 90, sortable: true, dataIndex: "material", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Color", width: 90, sortable: true, dataIndex: "color", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Item", width: 90, sortable: true, dataIndex: "item", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Vendedor", width: 90, sortable: true, dataIndex: "vendedor", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Cjs", width: 90, sortable: true, dataIndex: "cajas", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Precio Venta", width: 90, sortable: true, dataIndex: "precio_venta", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Precio Unitario", width: 90, sortable: true, dataIndex: "precio_unitario", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "33", width: 25, sortable: false, dataIndex: "33", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "34", width: 25, sortable: false, dataIndex: "34", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "35", width: 25, sortable: false, dataIndex: "35", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "36", width: 25, sortable: false, dataIndex: "36", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "37", width: 25, sortable: false, dataIndex: "37", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "38", width: 25, sortable: false, dataIndex: "38", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "39", width: 25, sortable: false, dataIndex: "39", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "40", width: 25, sortable: false, dataIndex: "40", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "41", width: 25, sortable: false, dataIndex: "41", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "42", width: 25, sortable: false, dataIndex: "42", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Pares", width: 50, sortable: false, dataIndex: "pares", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "$us", width: 60, sortable: false, dataIndex: "total", editor: {
                xtype: 'numberfield'
            }
            },
            {header: "Estado", width: 90, sortable: true, dataIndex: "estado"}
        ];
    }


});