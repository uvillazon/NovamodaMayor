/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define("App.View.Proformas.GridProformas", {
    extend: "App.Config.Abstract.Grid",
    title: 'Proformas',
    //imprimir: true,
    criterios: true,
    opcion: '',
    paramsStore: null,
    noLimpiar: null,
    //parametros obligados para mostrar reporte de historico de estados por tabla
    initComponent: function () {
        var me = this;

        me.store = Ext.create("App.Store.Proformas.Proformas");
        me.CargarComponentes();
        me.columns = [
            { xtype: "rownumberer", width: 30, sortable: false },
            { header: "Nombre", width: 90, sortable: true, dataIndex: "nombre" },
            { header: "Nro Factura", width: 90, sortable: true, dataIndex: "nro_factura" },
            { header: "Marca", width: 150, sortable: true, dataIndex: "marca" },
            { header: "Almacen", width: 150, sortable: true, dataIndex: "almacen" },
            { header: "Fecha", width: 90, sortable: true, dataIndex: "fecha", renderer: Ext.util.Format.dateRenderer('d/m/Y') },
            { header: "Responsable", width: 90, sortable: true, dataIndex: "responsable" },
            { header: "Nombre<br>Archivo", width: 90, sortable: true, dataIndex: "nombre_archivo" },
            { header: "Tipo<br>Archivo", width: 90, sortable: true, dataIndex: "tipo_archivo" },
            { header: "Url<br>Archivo", width: 90, sortable: true, dataIndex: "url_archivo" },
            { header: "Estado", width: 90, sortable: true, dataIndex: "estado" }
        ];

        this.callParent(arguments);

    }
});