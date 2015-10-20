/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define("App.View.Proformas.GridModelos", {
    extend: "Ext.grid.Panel",
    title: 'Modelos',
    requires: ['App.Config.ux.Printer', 'App.Config.ux.Exporter'],
    criterios: true,
    paramsStore: null,
    noLimpiar: null,
    opcion: 'gridModelo1',
    width: 800,
    height: 450,
    tituloImpresion: 'MOLECA',
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
        me.viewConfig = {
            getRowClass: function (record, rowIndex, rowParams, store) {
                if (record.get("ESTADO") == 1) {
                    return "CVerde"
                }
                else {
                    return null
                }
            }
        };
        me.cargarComponentes();
        switch (me.opcion) {
            case "gridModelo1" :
                me.cargarGridMoleca();
                break;
            case "gridModelo2":
                me.cargarGridModelo2();
                break;
            case "gridModelo3":
                me.cargarGridModelo3();
                break;
            case "gridModelo4":
                me.cargarGridModelo4();
                break;
            case "gridModelo5":
                me.cargarGridModelo5();
                break;

        }
        this.callParent(arguments);

    },
    cargarComponentes: function () {
        var me = this;
        me.txt_busqueda_modelo = Ext.create("App.Config.Componente.TextFieldBase", {
            fieldLabel: "Modelo",
            width: 150,
            labelWidth: 70,
            itemId : 'txt_buscar_modelo'
        });
        me.txt_busqueda_color = Ext.create("App.Config.Componente.TextFieldBase", {
            fieldLabel: "Color",
            width: 150,
            labelWidth: 70,
            itemId : 'txt_buscar_color'
        });
        me.txt_busqueda_material = Ext.create("App.Config.Componente.TextFieldBase", {
            fieldLabel: "Material",
            width: 150,
            labelWidth: 70,
            itemId : 'txt_buscar_material'
        });
        //me.button = Ext.create('Ext.Button', {
        //    pressed: true,
        //    text: 'Buscar',
        //    itemId: 'btn_buscar_modelo',
        //    hidden: me.busqueda,
        //    iconCls: 'zoom',
        //    tooltip: 'Buscar por Nombre',
        //    enableToggle: true,
        //    scope: this
        //
        //});
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
                me.txt_busqueda_modelo,
                me.txt_busqueda_material,
                me.txt_busqueda_color,
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
        App.Config.ux.Printer.printNotLoad(me);

    },
    ExportarReporte: function () {
        var me = this;
        var filename = 'exportarDatos';
        var data = App.Config.ux.Exporter.exportGrid(me.getStore(), me, 'excel', filename);
        window.open('data:application/vnd.ms-excel,' + encodeURIComponent(data));
    },

    //Modelo del 14 al 38
    cargarGridModelo2: function () {
        var me = this;
        me.store = Ext.create("App.Store.Proformas.Modelos");
        //me.store.load();
        //me.CargarComponentes();
        me.columns = [
            {xtype: "rownumberer", width: 30, sortable: false},
            {
                header: "Modelo", width: 90, sortable: true, dataIndex: "MODELO", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Material", width: 90, sortable: true, dataIndex: "MATERIAL", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Color", width: 90, sortable: true, dataIndex: "COLOR", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Item", width: 90, sortable: true, dataIndex: "ITEM", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Vendedor", width: 90, sortable: true, dataIndex: "VENDEDOR"
            },
            {
                header: "Cliente", width: 90, sortable: true, dataIndex: "CLIENTE"
            },
            {
                header: "Cjs", width: 90, sortable: true, dataIndex: "CAJAS", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Precio Venta", width: 90, sortable: true, dataIndex: "PRECIO_VENTA", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Precio Unitario", width: 90, sortable: true, dataIndex: "PRECIO_UNITARIO", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "14", width: 25, sortable: false, dataIndex: "14", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "15", width: 25, sortable: false, dataIndex: "15", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "16", width: 25, sortable: false, dataIndex: "16", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "17", width: 25, sortable: false, dataIndex: "17", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "18", width: 25, sortable: false, dataIndex: "18", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "19", width: 25, sortable: false, dataIndex: "19", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "20", width: 25, sortable: false, dataIndex: "20", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "21", width: 25, sortable: false, dataIndex: "21", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "22", width: 25, sortable: false, dataIndex: "22", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "23", width: 25, sortable: false, dataIndex: "23", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "24", width: 25, sortable: false, dataIndex: "24", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "25", width: 25, sortable: false, dataIndex: "25", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "26", width: 25, sortable: false, dataIndex: "26", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "27", width: 25, sortable: false, dataIndex: "27", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "28", width: 25, sortable: false, dataIndex: "28", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "29", width: 25, sortable: false, dataIndex: "29", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "30", width: 25, sortable: false, dataIndex: "30", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "31", width: 25, sortable: false, dataIndex: "31", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "32", width: 25, sortable: false, dataIndex: "32", editor: {
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
                header: "Pares", width: 50, sortable: false, dataIndex: "PARES", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "$us", width: 60, sortable: false, dataIndex: "TOTAL", editor: {
                xtype: 'numberfield'
            }
            },
            {header: "Estado", width: 90, sortable: true, dataIndex: "ESTADO"}
        ];
    },

    //Modelo del 33 al 42
    cargarGridMoleca: function () {
        var me = this;
        me.store = Ext.create("App.Store.Proformas.Modelos");
        //me.store.load();
        //me.CargarComponentes();
        me.columns = [
            {xtype: "rownumberer", width: 30, sortable: false},
            {
                header: "Modelo", width: 90, sortable: true, dataIndex: "MODELO", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Material", width: 90, sortable: true, dataIndex: "MATERIAL", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Color", width: 90, sortable: true, dataIndex: "COLOR", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Item", width: 90, sortable: true, dataIndex: "ITEM", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Vendedor", width: 90, sortable: true, dataIndex: "VENDEDOR"
            },
            {
                header: "Cliente", width: 90, sortable: true, dataIndex: "CLIENTE"
            },
            {
                header: "Cjs", width: 90, sortable: true, dataIndex: "CAJAS", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Precio Venta", width: 90, sortable: true, dataIndex: "PRECIO_VENTA", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Precio Unitario", width: 90, sortable: true, dataIndex: "PRECIO_UNITARIO", editor: {
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
                header: "Pares", width: 50, sortable: false, dataIndex: "PARES", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "$us", width: 60, sortable: false, dataIndex: "TOTAL", editor: {
                xtype: 'numberfield'
            }
            },
            {header: "Estado", width: 90, sortable: true, dataIndex: "ESTADO"}
        ];
    },

    //Modelo del 33 al 45
    cargarGridModelo3: function () {
        var me = this;
        me.store = Ext.create("App.Store.Proformas.Modelos");
        //me.store.load();
        //me.CargarComponentes();
        me.columns = [
            {xtype: "rownumberer", width: 30, sortable: false},
            {
                header: "Modelo", width: 90, sortable: true, dataIndex: "MODELO", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Material", width: 90, sortable: true, dataIndex: "MATERIAL", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Color", width: 90, sortable: true, dataIndex: "COLOR", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Item", width: 90, sortable: true, dataIndex: "ITEM", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Vendedor", width: 90, sortable: true, dataIndex: "VENDEDOR"
            },
            {
                header: "Cliente", width: 90, sortable: true, dataIndex: "CLIENTE"
            },
            {
                header: "Cjs", width: 90, sortable: true, dataIndex: "CAJAS", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Precio Venta", width: 90, sortable: true, dataIndex: "PRECIO_VENTA", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Precio Unitario", width: 90, sortable: true, dataIndex: "PRECIO_UNITARIO", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Talla", width: 70, sortable: true, dataIndex: "TALLA", editor: {
                xtype: 'textfield'
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
                header: "43", width: 25, sortable: false, dataIndex: "43", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "44", width: 25, sortable: false, dataIndex: "44", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "45", width: 25, sortable: false, dataIndex: "45", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Pares", width: 50, sortable: false, dataIndex: "PARES", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "$us", width: 60, sortable: false, dataIndex: "TOTAL", editor: {
                xtype: 'numberfield'
            }
            },
            {header: "Estado", width: 90, sortable: true, dataIndex: "ESTADO"}
        ];
    },

    //Modelo del 26 al 38
    cargarGridModelo4: function () {
        var me = this;
        me.store = Ext.create("App.Store.Proformas.Modelos");
        //me.store.load();
        //me.CargarComponentes();
        me.columns = [
            {xtype: "rownumberer", width: 30, sortable: false},
            {
                header: "Modelo", width: 90, sortable: true, dataIndex: "MODELO", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Material", width: 90, sortable: true, dataIndex: "MATERIAL", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Color", width: 90, sortable: true, dataIndex: "COLOR", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Item", width: 90, sortable: true, dataIndex: "ITEM", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Vendedor", width: 90, sortable: true, dataIndex: "VENDEDOR"
            },
            {
                header: "Cliente", width: 90, sortable: true, dataIndex: "CLIENTE"
            },
            {
                header: "Cjs", width: 90, sortable: true, dataIndex: "CAJAS", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Precio Venta", width: 90, sortable: true, dataIndex: "PRECIO_VENTA", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Precio Unitario", width: 90, sortable: true, dataIndex: "PRECIO_UNITARIO", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "26", width: 25, sortable: false, dataIndex: "26", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "27", width: 25, sortable: false, dataIndex: "27", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "28", width: 25, sortable: false, dataIndex: "28", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "29", width: 25, sortable: false, dataIndex: "29", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "30", width: 25, sortable: false, dataIndex: "30", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "31", width: 25, sortable: false, dataIndex: "31", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "32", width: 25, sortable: false, dataIndex: "32", editor: {
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
                header: "Pares", width: 50, sortable: false, dataIndex: "PARES", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "$us", width: 60, sortable: false, dataIndex: "TOTAL", editor: {
                xtype: 'numberfield'
            }
            },
            {header: "Estado", width: 90, sortable: true, dataIndex: "ESTADO"}
        ];
    },

    //Modelo del 1 al 14
    cargarGridModelo5: function (){
        var me = this;
        me.store = Ext.create("App.Store.Proformas.Modelos");
        me.columns = [
            {xtype: "rownumberer", width: 30, sortable: false},
            {
                header: "Modelo", width: 90, sortable: true, dataIndex: "MODELO", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Material", width: 90, sortable: true, dataIndex: "MATERIAL", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Color", width: 90, sortable: true, dataIndex: "COLOR", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Item", width: 90, sortable: true, dataIndex: "ITEM", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "Vendedor", width: 90, sortable: true, dataIndex: "VENDEDOR"
            },
            {
                header: "Cliente", width: 90, sortable: true, dataIndex: "CLIENTE"
            },
            {
                header: "Cjs", width: 90, sortable: true, dataIndex: "CAJAS", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Precio Venta", width: 90, sortable: true, dataIndex: "PRECIO_VENTA", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Precio Unitario", width: 90, sortable: true, dataIndex: "PRECIO_UNITARIO", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Talla", width: 70, sortable: true, dataIndex: "TALLA", editor: {
                xtype: 'textfield'
            }
            },
            {
                header: "1", width: 25, sortable: false, dataIndex: "1", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "1m", width: 25, sortable: false, dataIndex: "1m", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "2", width: 25, sortable: false, dataIndex: "2", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "2m", width: 25, sortable: false, dataIndex: "2m", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "3", width: 25, sortable: false, dataIndex: "3", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "3m", width: 25, sortable: false, dataIndex: "3m", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "4", width: 25, sortable: false, dataIndex: "4", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "4m", width: 25, sortable: false, dataIndex: "4m", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "5", width: 25, sortable: false, dataIndex: "5", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "5m", width: 25, sortable: false, dataIndex: "5m", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "6", width: 25, sortable: false, dataIndex: "6", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "6m", width: 25, sortable: false, dataIndex: "6m", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "7", width: 25, sortable: false, dataIndex: "7", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "7m", width: 25, sortable: false, dataIndex: "7m", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "8", width: 25, sortable: false, dataIndex: "8", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "8m", width: 25, sortable: false, dataIndex: "8m", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "9", width: 25, sortable: false, dataIndex: "9", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "9m", width: 25, sortable: false, dataIndex: "9m", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "10", width: 25, sortable: false, dataIndex: "10", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "10m", width: 25, sortable: false, dataIndex: "10m", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "11", width: 25, sortable: false, dataIndex: "11", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "11m", width: 25, sortable: false, dataIndex: "11m", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "12", width: 25, sortable: false, dataIndex: "12", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "12m", width: 25, sortable: false, dataIndex: "12m", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "13", width: 25, sortable: false, dataIndex: "13", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "13m", width: 25, sortable: false, dataIndex: "13m", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "14", width: 25, sortable: false, dataIndex: "14", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "Pares", width: 50, sortable: false, dataIndex: "PARES", editor: {
                xtype: 'numberfield'
            }
            },
            {
                header: "$us", width: 60, sortable: false, dataIndex: "TOTAL", editor: {
                xtype: 'numberfield'
            }
            },
            {header: "Estado", width: 90, sortable: true, dataIndex: "ESTADO"}
        ];
    }
});