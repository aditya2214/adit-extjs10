/**
 * This class is the controller for the main view for the application. It is specified as
 * the "controller" of the Main view class.
 *
 * TODO - Replace this content of this view to suite the needs of your application.
 */
Ext.define('MyApp.view.main.MainController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.main',

    onItemSelected: function (sender, record) {
      
      var button= Ext.ComponentQuery.query('button#hapus')[0];

    //   console.log(button);
    //   return;
      button.enable(true)
    },

    onRemoveClick:function(button,grid,rowIndex,colIndex) {
        // console.log({
        //     grid,
        //     rowIndex,
        //     colIndex
        // })

        if(grid){
            var grid = button.up('mainlist');
            var model =grid.getStore().getAt(rowIndex);

            if(!model){
                Ext.Msg.alert('info','no record selected');
            }
            // console.log({model})

            Ext.Msg.confirm('Remove record','are you sure want to delete?',
            function(button){
                if(button=='yes'){
                    var mamang = grid.getSelectionModel().getSelection();
                    grid.store.remove(mamang);
                    grid.store.sync()
                }
            })
        }
    }, 

    onConfirm: function (choice) {
        if (choice === 'yes') {
            //
        }
    },

    onAddClick:function(button,event) {
        var list = button.up('mainlist');
        let store = list.getStore();
        // location.reload();
        let rowediting=list.getPlugin();
        
        store.setAutoSync(false);
        for (i=1;i<=10;i++);

        var record = {
            
            nama:"",
            birthplace:"",
            birthday:"",
        }

        // console.log(store)e
        var model = store.getModel();
        record = new model(record);
        store.insert(0, record);
        rowediting.startEdit(record);
        store.setAutoSync(true);

    },

    
});
