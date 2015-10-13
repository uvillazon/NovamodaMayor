/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define('App.Store.Proformas.Marcas', {

    model: 'App.Model.Proformas.Marcas',
    url: 'marcas/marcas',
    //url : 'Almacen.php?funcion=ListarAlmacen',
    sortProperty: 'idmarca',
    extend: 'App.Config.Abstract.Store'
});