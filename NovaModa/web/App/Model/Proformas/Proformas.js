/**
 * Created by uvillazon on 04/09/2015.
 */
Ext.define('App.Model.Proformas.Proformas', {
    extend: 'Ext.data.Model',
    fields: [
        { type: "int", name: "id_proforma" },
        { type: "string", name: "nombre" },
        { type: "date", name: "fecha"},
        { type: "string", name: "fecha_string" },
        { type: "string", name: "responsable" },
        { type: "string", name: "almacen" },
        { type: "string", name: "id_almacen" },
        { type: "string", name: "marca" },
        { type: "string", name: "nombre_archivo" },
        { type: "string", name: "tipo_archivo" },
        { type: "string", name: "url_archivo" },
        { type: "string", name: "nro_factura" },
        { type: "string", name: "estado" }
    ]
});