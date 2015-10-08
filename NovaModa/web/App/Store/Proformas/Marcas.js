/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define('App.Store.Proformas.Marcas', {

    model: 'App.Model.Proformas.Marcas',
    //url: 'proformas/proformas',
    //url : 'Almacen.php?funcion=ListarAlmacen',
    sortProperty: 'id_marca',
    extend: 'App.Config.Abstract.Store'
});