/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define('App.Store.Proformas.CodigosBarra', {

    model: 'App.Model.Proformas.CodigosBarra',
    url: 'proformas/codigos/barras',
    //url : 'Almacen.php?funcion=ListarAlmacen',
    sortProperty: 'talla',
    extend: 'App.Config.Abstract.Store'
    //extend: 'App.Config.Abstract.StoreJsonP'
});