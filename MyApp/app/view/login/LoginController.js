Ext.define('MyApp.view.login.LoginController', {
    extend: 'Ext.app.ViewController',
    alias: 'controller.login',

    onLoginClick: function() {

        
        localStorage.setItem("TutorialLoggedIn", true);

        this.getView().destroy();

        Ext.create({
            xtype: 'app-main'
        });

    }
});