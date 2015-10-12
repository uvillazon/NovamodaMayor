/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define("App.View.Proformas.GridModelos", {
    extend: "Ext.grid.Panel",
    title: 'Modelos',
    requires: ['App.Config.ux.Printer', 'App.Config.ux.Exporter'],
    criterios: true,
    opcion: '',
    paramsStore: null,
    noLimpiar: null,
    opcion: 'gridMoleca',
    width: 800,
    height : 450,
    tituloImpresion : 'MOLECA',
    //parametros obligados para mostrar reporte de historico de estados por tabla
    initComponent: function () {
        var me = this;
        me.selType = 'cellmodel';
        me.plugins = [
            Ext.create('Ext.grid.plugin.CellEditing', {
                clicksToEdit: 1
            })
        ];
        sm = new Ext.selection.CheckboxModel({
            showHeaderCheckbox: false,
            checkOnly: true,
            headerWidth: 40

        });
        me.selModel = sm;
        me.cargarComponentes();
        switch (me.opcion) {
            case "gridMoleca" :
                me.cargarGridMoleca();

        }
        this.callParent(arguments);

    },
    cargarComponentes : function(){
        var me = this;
        me.txt_busqueda = Ext.create("App.Config.Componente.TextFieldBase", { fieldLabel: "Buscar", width: 240, labelWidth:90 })
        me.button = Ext.create('Ext.Button', {
            pressed: true,
            text: 'Buscar',
            itemId : 'btn_buscar_modelo',
            hidden: me.busqueda,
            iconCls: 'zoom',
            tooltip: 'Buscar por Nombre',
            enableToggle: true,
            scope: this

        });
        //////////
        me.btn_imprimir = Ext.create('Ext.Button', {
            pressed: true,
            iconCls: 'printer',
            tooltip: 'Imprimir Datos',
            //enableToggle: true,
            scope: this,
            hidden: me.imprimir,
            tooltipType: 'qtip',
            handler: me.ImprimirReporte


        });
        me.btn_exportExcel = Ext.create('Ext.Button', {
            pressed: true,
            iconCls: 'page_excel',
            tooltip: 'Exportar Datos',
            //enableToggle: true,
            scope: this,
            hidden: me.excel,
            tooltipType: 'qtip',
            handler: me.ExportarReporte


        });
        ///////////
        me.toolBar = Ext.create('Ext.toolbar.Toolbar', {
            items: [
                me.txt_busqueda,
                me.button,
                me.btn_imprimir,
                me.btn_exportExcel
            ]
        });
        this.dockedItems = me.toolBar;
        me.dock = this.dockedItems;
    },
    ImprimirReporte: function () {
        var me = this;
        App.Config.ux.Printer.filtros = me.tituloImpresion;
        App.Config.ux.Printer.print(me);

    },
    ExportarReporte: function () {
        var me = this;
        var store2 = new Ext.data.Store({
            proxy: me.store.proxy,
            reader: me.store.reader,
            sortInfo: me.store.sortInfo,
            model: me.store.model
        });

        store2.proxy.timeout = 120000;
        store2.on('beforeload', function (s, a, c) {
            me.getEl().mask();
        });
        store2.load({ limit: me.store.getTotalCount(), start: 0, page: 1 });
        var me = this;
        store2.on('load', function (store, records, options) {
            me.getEl().unmask();
            var filename = 'exportarDatos';
            var data = App.Config.ux.Exporter.exportGrid(store2, me, 'excel', filename);
            window.open('data:application/vnd.ms-excel,' + encodeURIComponent(data));
        });
    },
    cargarGridMoleca: function () {
        var me = this;
        me.store = Ext.create("App.Store.Proformas.Modelos");
        me.store.load();
        //me.CargarComponentes();
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